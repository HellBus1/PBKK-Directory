using System;
using System.Collections.Generic;
using System.Net;
using Newtonsoft.Json;

namespace MoneyConverter.Factory
{
    public class CurrencyFactory
    {
        private readonly String BASE_URL = "https://free.currconv.com/api/v7/";
        private WebClient webClient = new WebClient();

        public CurrencyFactory()
        {
        }

        public String GetCurrency()
        {
            String url = BASE_URL + "currencies?apiKey=fe47bc81e1a3b982d178";
            String jsonData = String.Empty;

            try
            {
                jsonData = webClient.DownloadString(url);

                var result = JsonConvert.DeserializeObject(jsonData);

                Console.WriteLine(result.ToString());
            }
            catch (Exception)
            {

            }

            return "";
        }

        public String ConvertCurrency(String from, String to)
        {
            String query = from + "_" + to;
            String url = BASE_URL + "convert?q=" + query + "&compact=ultra&apiKey=fe47bc81e1a3b982d178";
            String jsonData = String.Empty;
            //Console.WriteLine(url);

            try
            {
                jsonData = webClient.DownloadString(url);

                Dictionary<string, string> result = JsonConvert.DeserializeObject<Dictionary<string, string>>(jsonData);

                return result[query];
            }
            catch (Exception e)
            {
                Console.WriteLine(e);
                return "failure";
            }
        }
    }
}
