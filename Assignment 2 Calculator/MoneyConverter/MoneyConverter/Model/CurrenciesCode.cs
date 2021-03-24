using System;
namespace MoneyConverter.Model
{
    public class CurrenciesCode
    {
        private String codeName;
        private Currency currency;

        CurrenciesCode(String codeName, Currency currency)
        {
            this.codeName = codeName;
            this.currency = currency;
        }

        public String GetCodename()
        {
            return this.codeName;
        }

        public Currency GetCurrencies()
        {
            return this.currency;
        }
    }
}
