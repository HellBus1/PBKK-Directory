using System;
namespace MoneyConverter.Model
{
    public class Currency
    {
        private String currencyName;
        private String currencySymbol;
        private String id;

        Currency(String currencyName, String currencySymbol, String id)
        {
            this.currencyName = currencyName;
            this.currencySymbol = currencySymbol;
            this.id = id;
        }

        public String GetCurrencyName()
        {
            return this.currencyName;
        }

        public String GetCurrencySymbol()
        {
            return this.currencySymbol;
        }

        public String GetId()
        {
            return this.id;
        }
    }
}
