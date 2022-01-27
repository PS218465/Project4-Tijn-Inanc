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
            Orders selectedPerson = ((Orders)LvUsers.SelectedItem);
            string iserId = selectedPerson.Klant_id.ToString();
            //cnn.infoload.(iserId);
            Bezoeker = cnn.infoload(iserId);

            Pizza = cnn.loadbestelling(iserId);
            Pizza = cnn.loadAll();
        }
    }
}
