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

namespace stonkspizza.manager
{
    /// <summary>
    /// Interaction logic for Manager.xaml
    /// </summary>
    public partial class Manager : Window
    {
        DBconnection cnn = new DBconnection();
        private ObservableCollection<Pizzas> pizza;

        public ObservableCollection<Pizzas> Pizza
        {
            get { return pizza; }
            set { pizza = value; }
        }


        public Manager()
        {
            DataContext = this;
            InitializeComponent();
            loadpizzas();
        }
        private void loadpizzas()
        {

            LvProduct.ItemsSource = Pizza = cnn.loadpizz();
            Console.WriteLine(Pizza.ToString());
            



        }
        private void Button_create(object sender, RoutedEventArgs e)
        {
            manager.PizzaCreate win = new manager.PizzaCreate();
            win.Show();
            this.Close();
        }

        private void Button_bewerk(object sender, RoutedEventArgs e)
        {

        }

        private void Button_delete(object sender, RoutedEventArgs e)
        {

        }

        private void Button_bakck(object sender, RoutedEventArgs e)
        {

        }
    }
}
