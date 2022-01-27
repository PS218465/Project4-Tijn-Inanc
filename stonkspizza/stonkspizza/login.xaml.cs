using Org.BouncyCastle.Crypto.Generators;
using stonkspizza.classes;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace stonkspizza
{
    /// <summary>
    /// Interaction logic for login.xaml
    /// </summary>
    public partial class login : Window
    {
        DBconnection cnn = new DBconnection();

        public login()
        {
            DataContext = this;
            InitializeComponent();
            
        }

        private void btnlogin_Click(object sender, RoutedEventArgs e)
        {
            
         
            Login login = cnn.login(tbnaam.Text);
            Console.WriteLine(tbnaam.Text);
            bool Bwachtwoord = BCrypt.Net.BCrypt.Verify(tbwachtwoord.Text, login.Password);
            
            if (login.Id == 0)
            {
                tbmessage.Text = "Je wachtwoord of gebruikersnaam is onjuist.\n Controleer je wachtwoord en je gebruikersnaam.";
            }
            else
            {
                tbmessage.Text = "";
                string userid = login.Id.ToString();
                Role role = cnn.role(userid);
                string verify = role.Role_id.ToString();
                switch (verify)
                {
                    case "1":

                        break;
                    case "2":

                        break;
                    case "3":
                        manager.Manager win = new manager.Manager();
                        win.Show();
                        this.Close();
                        break;
                    case "4":
                        
                        break;
                    case "5":

                        break;
                }
            }
          

        }
    }
}
