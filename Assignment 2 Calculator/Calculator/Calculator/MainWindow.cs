using System;
using Gtk;
using System.Collections.Generic;
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

    public static int ComputeInfix(string infix)
    {
        var operatorstack = new Stack<char>();
        var operandstack = new Stack<int>();

        var precedence = new Dictionary<char, int> { { '(', 0 }, { '*', 1 }, { '/', 1 }, { '+', 2 }, { '-', 2 }, { ')', 3 } };

        foreach (var ch in $"({infix})")
        {
            switch (ch)
            {
                case var digit when Char.IsDigit(digit):
                    operandstack.Push(Convert.ToInt32(digit.ToString()));
                    break;
                case var op when precedence.ContainsKey(op):
                    var keepLooping = true;
                    while (keepLooping && operatorstack.Count > 0 && precedence[ch] > precedence[operatorstack.Peek()])
                    {
                        switch (operatorstack.Peek())
                        {
                            case '+':
                                operandstack.Push(operandstack.Pop() + operandstack.Pop());
                                break;
                            case '-':
                                operandstack.Push(-operandstack.Pop() + operandstack.Pop());
                                break;
                            case '*':
                                operandstack.Push(operandstack.Pop() * operandstack.Pop());
                                break;
                            case '/':
                                var divisor = operandstack.Pop();
                                operandstack.Push(operandstack.Pop() / divisor);
                                break;
                            case '(':
                                keepLooping = false;
                                break;
                        }
                        if (keepLooping)
                            operatorstack.Pop();
                    }
                    if (ch == ')')
                        operatorstack.Pop();
                    else
                        operatorstack.Push(ch);
                    break;
                default:
                    throw new ArgumentException();
            }
        }

        if (operatorstack.Count > 0 || operandstack.Count > 1)
            throw new ArgumentException();

        return operandstack.Pop();
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
            String temporary = display.Buffer.Text;
            display.Buffer.Text = ComputeInfix(temporary).ToString();
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
