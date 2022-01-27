using stonkspizza.classes;
using System;
using System.Collections.Generic;
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

namespace stonkspizza.Users
{
    /// <summary>
    /// Interaction logic for UsersCreate.xaml
    /// </summary>
    public partial class UsersCreate : Window
    {
        DBconnection cnn = new DBconnection();
        private string salt;
        private string hash;
        public UsersCreate()
        {
            InitializeComponent();
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            salt = BCrypt.Net.BCrypt.GenerateSalt();
            hash = BCrypt.Net.BCrypt.HashPassword(tbpassword.Text, salt);
            Users.ViewUsers win = new Users.ViewUsers();
            string gehashed = hash.ToString();
            string date =DateTime.Now.ToString("MM/dd/yyyy");
            string naam = tbnaam.Text;
            string eamil = tbemail.Text;
            cnn.createusers(naam, gehashed, date, eamil);
            win.loadusers();
            win.Show();
            this.Close();
        }
    }
}
