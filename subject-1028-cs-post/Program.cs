using System;
using System.Collections.Generic;
using System.Net;
using System.Text;
using System.Web;

namespace subject_1028_cs_post
{
    class Program
    {
        static void Main(string[] args)
        {
            string url = "http://localhost/php-test/keijiban.php";
            string encoding = "utf-8";

            Console.WriteLine("personal_name");
            string p1 = Console.ReadLine();
            Console.WriteLine("contents");
            string p2 = Console.ReadLine();

            Dictionary<string, string> param =
                new Dictionary<string, string>()
                {
                    { "personal_name", p1 },
                    { "contents", p2 }
                };

            try
            {
                WebClient webClient = new WebClient();
                webClient.Encoding = Encoding.GetEncoding("utf-8");
                webClient.Headers["Content-Type"] =
                    "application/x-www-form-urlencoded";

                string data_string = "";
                foreach (KeyValuePair<string, string> kvp in param)
                {
                    if (data_string != "")
                    {
                        data_string += "&";
                    }
                    data_string += kvp.Key + "=";
                    data_string +=
                        HttpUtility
                            .UrlEncode(kvp.Value,
                            Encoding.GetEncoding(encoding));
                }

                Console.WriteLine(data_string);
                Console.ReadLine();

                string result =
                    webClient.UploadString(new Uri(url), "POST", data_string);

                Console.WriteLine (result);
            }
            catch (System.Exception ex)
            {
                Console.WriteLine(ex.Message);
            }

            Console.ReadLine();
        }
    }
}
