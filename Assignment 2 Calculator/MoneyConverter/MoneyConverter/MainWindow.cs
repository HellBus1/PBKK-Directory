using System;
using Gtk;
using MoneyConverter.Factory;

public partial class MainWindow : Gtk.Window
{
    public MainWindow() : base(Gtk.WindowType.Toplevel)
    {
        Build();
        Initialize();
    }

    protected void OnDeleteEvent(object sender, DeleteEventArgs a)
    {
        Application.Quit();
        a.RetVal = true;
    }

    private void Initialize()
    {
        CurrencyFactory factory = new CurrencyFactory();

        factory.ConvertCurrency("PHP", "USD");

        String[] values1 = new string[] {
            "USD",
            "EUR",
            "IDR"
        };
        for (var i = 0; i < values1.Length; i++)
        {
            comboBoxFrom.InsertText(i, values1[i]);
            comboBoxTo.InsertText(i, values1[i]);
        }

        clear.Clicked += (object obj, EventArgs args) => {
            amount.Text = "";
        };

        switchCurrency.Clicked += (object obj, EventArgs args) => {
            int index = Array.FindIndex(values1, row => row == comboBoxFrom.ActiveText);
            int index2 = Array.FindIndex(values1, row => row == comboBoxTo.ActiveText);
            if (index != -1 && index2 != -1)
            {
                comboBoxTo.Active = index;
                comboBoxFrom.Active = index2;
            }

        };

        convert.Clicked += (object obj, EventArgs args) => {
            String from = comboBoxFrom.ActiveText;
            String to = comboBoxTo.ActiveText;

            int temporary = Int32.Parse(amount.Text);

            if (from == "IDR")
            {
                switch (to)
                {
                    case "IDR":
                        {
                            entry2.Text = (temporary * 1).ToString();
                        }
                        break;
                    case "EUR":
                        {
                            entry2.Text = (temporary * 0.000058).ToString();
                        }
                        break;
                    case "USD":
                        {
                            entry2.Text = (temporary * 0.000069).ToString();
                        }
                        break;
                }
            }
            else if (from == "EUR")
            {
                switch (to)
                {
                    case "IDR":
                        {
                            entry2.Text = (temporary * 17133.89).ToString();
                        }
                        break;
                    case "EUR":
                        {
                            entry2.Text = (temporary * 1).ToString();
                        }
                        break;
                    case "USD":
                        {
                            entry2.Text = (temporary * 1.19).ToString();
                        }
                        break;
                }
            }
            else
            {
                switch (to)
                {
                    case "IDR":
                        {
                            entry2.Text = (temporary * 14434.25).ToString();
                        }
                        break;
                    case "EUR":
                        {
                            entry2.Text = (temporary * 0.84).ToString();
                        }
                        break;
                    case "USD":
                        {
                            entry2.Text = (temporary * 1).ToString();
                        }
                        break;
                }
            }
        };
    }
}
