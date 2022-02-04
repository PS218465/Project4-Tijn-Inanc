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
using stonkspizza.classes;
using System.Windows.Shapes;
using System.ComponentModel;
using System.Runtime.CompilerServices;

namespace stonkspizza.Bestellingen
{
    /// <summary>
    /// Interaction logic for BestelScherm.xaml
    /// </summary>
    public partial class BestelScherm : Window, INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;

        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }
        DBconnection cnn = new DBconnection();
        public BestelScherm()
        {
            DataContext = this;
            InitializeComponent();
            loadOrders();
        }
        private ObservableCollection<Orders> order;

        public ObservableCollection<Orders> Order
        {
            get { return order; }
            set
            {
                order = value;
                OnPropertyChanged();
            }
        }
        private ObservableCollection<bezoekers> bezoeker;

        public ObservableCollection<bezoekers> Bezoeker
        {
            get { return bezoeker; }
            set
            {
                bezoeker = value;
                OnPropertyChanged();
            }
        }
        private ObservableCollection<bestelling> pizza;

        public ObservableCollection<bestelling> Pizza
        {
            get { return pizza; }
            set
            {
                pizza = value;
                OnPropertyChanged();
            }
        }
        public void loadOrders()
        {
            Order = cnn.GetAllOrders();
        }
        private void LVbestellingen(object sender, SelectionChangedEventArgs e)
        {
            if (LvUsers.SelectedIndex != -1)
            {
                Orders selectedPerson = ((Orders)LvUsers.SelectedItem);
                string iserId = selectedPerson.Klant_id.ToString();
                string pizza = selectedPerson.Pizza.ToString();
                //cnn.infoload.(iserId);
                Bezoeker = cnn.infoload(iserId);

                Pizza = cnn.loadbestelling(iserId, pizza);
            }
        }

        private void statusClick(object sender, RoutedEventArgs e)
        {
            if (LvUsers.SelectedItems.Count > 0)
            {
                Orders selectedPerson = ((Orders)LvUsers.SelectedItem);
                string orderid = selectedPerson.Id.ToString();
                status status = new status(orderid);
                status.Show();
                this.Close();
            }
            else
            {
                MessageBox.Show("je moet een order selecteren!");
            }
        }

        private void select(object sender, SelectionChangedEventArgs e)
        {
            if (lvBestellings.SelectedIndex != -1) lvBestellings.SelectedIndex = -1;
            else if (LvBezoeker.SelectedIndex != -1) LvBezoeker.SelectedIndex = -1;
        }
        private void DeleteClick(object sender, RoutedEventArgs e)
        {
            if (LvUsers.SelectedItems.Count > 0)
            {
                Orders selectedPerson = ((Orders)LvUsers.SelectedItem);
                string orderid = selectedPerson.Klant_id.ToString();
                if (cnn.deleteOrder(orderid))
                {
                    MessageBox.Show("order afgerond!");
                    Pizza.Clear();
                    Bezoeker.Clear();
                    LvUsers.SelectedIndex = -1;
                    Order.Clear();
                    loadOrders();
                }
                else
                {
                    MessageBox.Show("verwijderen mislukt");
                }
            }
            else
            {
                MessageBox.Show("je moet een order selecteren!");
            }
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            Window1 win = new Window1();
            win.Show();
            this.Close();
        }
    }
}
