using System;
using Gtk;
using System.Collections;
using System.Text;

public partial class MainWindow : Gtk.Window
{
    public MainWindow() : base(Gtk.WindowType.Toplevel)
    {
        Build();
        OnPress();
    }

    protected void OnDeleteEvent(object sender, DeleteEventArgs a)
    {
        Application.Quit();
        a.RetVal = true;
    }

    private bool Precedence(char op1, char op2)
    {
        if (op2 == '(' || op2 == ')')
        {
            return false;
        }
        if ((op1 == '*' || op1 == '/') &&
               (op2 == '+' || op2 == '-'))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    private int DoOperation(char op, int num1, int num2)
    {
        switch (op)
        {
            case '+':
                return num1 + num2;
            case '-':
                return num1 - num2;
            case '*':
                return num1 * num2;
            case '/':
                if (num2 == 0)
                {
                    throw new
                    System.NotSupportedException(
                           "Cannot divide by zero");
                }
                return num1 / num2;
        }
        return 0;
    }

    public int Calculate()
    {
        Stack values = new Stack();
        Stack operators = new Stack();

        String currentBuffer = display.Buffer.Text;
        char[] tokens = currentBuffer.ToCharArray();

        for (int i=0; i< tokens.Length; i++)
        {
            // if current token is a whitespace, skip it
            if (tokens[i] == ' ')
            {
                continue;
            }
            // if current token is number, push it to stack number
            if (tokens[i] >= '0' && tokens[i] <= '9')
            {
                StringBuilder sbuffer = new StringBuilder();
                while (i < tokens.Length && tokens[i] >= '0' && tokens[i] <= '9')
                {
                    sbuffer.Append(tokens[i]);
                    i++;
                }
                values.Push(int.Parse(sbuffer.ToString()));
                // right now i is point character after digit, we need to turn back 1
                i--;
            }
            else if (tokens[i] == '(')
            {
                operators.Push(tokens[i]);
            }
            else if (tokens[i] == ')')
            {
                while ((char)operators.Peek() != '(')
                {
                    values.Push(DoOperation(
                    (char)operators.Pop(), (int)values.Pop(), (int)values.Pop()));
                }
                operators.Pop();
            }
            else if (tokens[i] == '+' ||
                     tokens[i] == '-' ||
                     tokens[i] == '*' ||
                     tokens[i] == '/')
            {
                while (operators.Count > 0 && Precedence(tokens[i], (char)operators.Peek()))
                {
                    values.Push(DoOperation((char)operators.Pop(), (int)values.Pop(), (int)values.Pop()));
                }
                operators.Push(tokens[i]);
            }
        }

        while (operators.Count > 0)
        {
            values.Push(DoOperation((char)operators.Pop(), (int)values.Pop(), (int)values.Pop()));
        }

        return (int)values.Pop();
    }

    public void Clear()
    {
        display.Buffer.Text = "";
    }

    public void SetText(String value)
    {
        String currentBuffer = display.Buffer.Text;
        currentBuffer += value;
        display.Buffer.Text = currentBuffer;
    }

    public void OnPress()
    {
        one.Clicked += (object obj, EventArgs args) => {
            SetText("1");
        };
        two.Clicked += (object obj, EventArgs args) => {
            SetText("2");
        };
        three.Clicked += (object obj, EventArgs args) => {
            SetText("3");
        };
        four.Clicked += (object obj, EventArgs args) => {
            SetText("4");
        };
        five.Clicked += (object obj, EventArgs args) => {
            SetText("5");
        };
        six.Clicked += (object obj, EventArgs args) => {
            SetText("6");
        };
        seven.Clicked += (object obj, EventArgs args) => {
            SetText("7");
        };
        eight.Clicked += (object obj, EventArgs args) => {
            SetText("8");
        };
        nine.Clicked += (object obj, EventArgs args) => {
            SetText("9");
        };
        zero.Clicked += (object obj, EventArgs args) => {
            SetText("0");
        };
        doubleZero.Clicked += (object obj, EventArgs args) => {
            SetText("00");
        };
        tripleZero.Clicked += (object obj, EventArgs args) => {
            SetText("000");
        };
        equal.Clicked += (object obj, EventArgs args) => {
            display.Buffer.Text = Calculate().ToString();
        };
        plus.Clicked += (object obj, EventArgs args) => {
            SetText("+");
        };
        minus.Clicked += (object obj, EventArgs args) => {
            SetText("-");
        };
        divide.Clicked += (object obj, EventArgs args) => {
            SetText("/");
        };
        times.Clicked += (object obj, EventArgs args) => {
            SetText("*");
        };
        leftParentheses.Clicked += (object obj, EventArgs args) => {
            SetText("(");
        };
        rightParentheses.Clicked += (object obj, EventArgs args) => {
            SetText(")");
        };
        clear.Clicked += (object obj, EventArgs args) => {
            Clear();
        };
    }
}
