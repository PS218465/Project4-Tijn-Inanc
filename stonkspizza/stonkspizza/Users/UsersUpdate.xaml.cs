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
    /// Interaction logic for UsersUpdate.xaml
    /// </summary>
    public partial class UsersUpdate : Window
    {
        string ahit;
    
        DBconnection cnn = new DBconnection();
        private string salt;
        private string hash;
        public UsersUpdate(string name, string Uemail,string id)
        {
            InitializeComponent();
            filltextbox(name,Uemail);
            ahit = id;
            
        }
        public void filltextbox(string naam, string mail)
        {
            tbnaam.Text= naam;
            tbemail.Text = mail;
        }
        private void Button_Click(object sender, RoutedEventArgs e)
        {

            salt = BCrypt.Net.BCrypt.GenerateSalt();
            hash = BCrypt.Net.BCrypt.HashPassword(tbpassword.Text, salt);
            Users.ViewUsers win = new Users.ViewUsers();
            string gehashed = hash.ToString();
            cnn.Updateusers(tbnaam.Text, tbemail.Text, gehashed,ahit);
            if (btnrole.SelectedIndex != -1) 
            {
                ComboBoxItem cbi = (ComboBoxItem)btnrole.SelectedItem;
                string selectedrole = cbi.Content.ToString();
                var splitted = selectedrole.Split(' ');
                string roleid = (splitted[0]); // INAGX4
                cnn.kopperole(roleid,ahit);
            }
            else
            {
                MessageBox.Show("u heeft geen role geselecteerd");
            }
            win.loadusers();
            win.Show();
            this.Close();


        }
        
    }
}
