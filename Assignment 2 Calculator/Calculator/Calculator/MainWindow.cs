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

    private int Precedence(char prec)
    {
        if(prec == '*' || prec == '/')
        {
            return 2;
        }
        else if(prec == '+' || prec == '-')
        {
            return 1;
        }
        else
        {
            return -1;
        }
    }

    public void Calculate()
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
                String
            }
        }

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
            Calculate();
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
