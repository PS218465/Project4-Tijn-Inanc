using stonkspizza.classes;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
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
using System.ComponentModel;
using System.Runtime.CompilerServices;

namespace stonkspizza.Users
{
    /// <summary>
    /// Interaction logic for ViewUsers.xaml
    /// </summary>
    public partial class ViewUsers : Window, INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;

        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }

        DBconnection cnn = new DBconnection();


        private ObservableCollection<defineroll> rolinfo;
        public ObservableCollection<defineroll> Rolinfo
        {
            get { return rolinfo; }
            set
            {
                rolinfo = value;
                OnPropertyChanged();
            }
        }
        private ObservableCollection<GetUsers> userinfo;


        public ObservableCollection<GetUsers> Userinfo
        {
            get { return userinfo; }
            set { userinfo = value;
                OnPropertyChanged();
            }
        }
        public ViewUsers()
        {
            DataContext = this;
            InitializeComponent();
            loadusers();
        }
        public void loadusers()
        {
            Userinfo = cnn.LoadUsers();
        }
        private void Button_create(object sender, RoutedEventArgs e)
        {
            Users.UsersCreate win = new Users.UsersCreate();
            win.Show();
            this.Close();

        }

        private void Button_bewerk(object sender, RoutedEventArgs e)
        {
            if (LvUsers.SelectedIndex >= 0)
            {
                GetUsers selectedPizza = ((GetUsers)LvUsers.SelectedItem);
                defineroll selectedRole = ((defineroll)LvUsersrole.SelectedItem);
                string userrid = selectedPizza.Id.ToString();
                string username = selectedPizza.Name.ToString();
                string useremail = selectedPizza.Email.ToString();
                Users.UsersUpdate win = new Users.UsersUpdate(username, useremail, userrid);
                win.Show();
                this.Close();
            }
            else
            {
                MessageBox.Show("u heeft geen gebruiker geselecteerd");
            }
        }
            

        private void Button_delete(object sender, RoutedEventArgs e)
        {
            if (LvUsers.SelectedIndex >= 0)
            {
                GetUsers selectedPizza = ((GetUsers)LvUsers.SelectedItem);
                string userrid = selectedPizza.Id.ToString();
                Console.WriteLine(userrid);
                cnn.DeleteUsers(userrid);
                loadusers();
            }
            else
            {
                MessageBox.Show("u heeft geen gebruiker geselecteerd");
            }
        }

        private void LvUsers_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            try
            {
                GetUsers selectedPizza = ((GetUsers)LvUsers.SelectedItem);
                if (selectedPizza == null)
                {
                    return;
                }
                string userrid = selectedPizza.Id.ToString();
                Rolinfo = cnn.defineRole(userrid);
            }
            catch
            {
                MessageBox.Show("er is iets mis gegaan");
            }
        }

    

        private void deleteRole_Click(object sender, RoutedEventArgs e)
        {
            try
            {
               
                defineroll selectedPizza = ((defineroll)LvUsersrole.SelectedItem);
                string userrole = selectedPizza.Id.ToString();
                MessageBox.Show(userrole);
                cnn.DeleteRole(userrole);
                MessageBox.Show("de role is verwijderd");

                              GetUsers z = ((GetUsers)LvUsers.SelectedItem);
                if (z == null)
                {
                    return;
                }
                string userrid = z.Id.ToString();
                Rolinfo = cnn.defineRole(userrid);


            }
            catch
            {
                MessageBox.Show("er is iets mis gegaan");
            }
        }
    }
}
