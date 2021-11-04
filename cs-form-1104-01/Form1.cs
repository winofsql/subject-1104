using System.Reflection;
using System.Reflection.Metadata;
using System;
using System.Collections.Generic;
using System.Net;
using System.Web;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace cs_form_1104_01
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            MessageBox.Show("OK");

            string url = "http://localhost/php-test/keijiban.php";
            string encoding = "utf-8";

            // Console.WriteLine("personal_name");
            // string p1 = Console.ReadLine();
            // Console.WriteLine("contents");
            // string p2 = Console.ReadLine();

            Dictionary<string, string> param =
                new Dictionary<string, string>();
                // {
                //     { "personal_name", textBox1.Text },
                //     { "contents", textBox2.Text }
                // };
                param.Add("personal_name", textBox1.Text);
                param.Add("contents", textBox2.Text);

                // データの数
                Console.WriteLine(param.Count);
                // データの値
                Console.WriteLine(param["personal_name"]);
                Console.WriteLine(param["contents"]);


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

                // Console.WriteLine(data_string);
                // Console.ReadLine();

                string result =
                    webClient.UploadString(new Uri(url), "POST", data_string);

                Console.ReadLine();
                Console.WriteLine (result);
            }
            catch (System.Exception ex)
            {
                Console.WriteLine(ex.Message);
            }            
        }
    }
}
