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
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace stonkspizza
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        DBconnection cnn = new DBconnection();
        
        private ObservableCollection<Orders> order;

        public ObservableCollection<Orders> Order
        {
            get { return order; }
            set
            {
                order = value;

            }

        }
        public MainWindow()
        {
            DataContext = this;
            InitializeComponent();
            LoadOrders();
            
        }
        private void LoadOrders()
        {
            LvOrder.ItemsSource = cnn.GetAllOrders().ToList();

            MessageBox.Show(cnn.GetAllOrders().ToString());
        }
    }
}
