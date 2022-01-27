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


namespace stonkspizza.manager
{
    /// <summary>
    /// Interaction logic for Manager.xaml
    /// </summary>
    public partial class Manager : Window, INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;

        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }

        DBconnection cnn = new DBconnection();
        private ObservableCollection<Pizzas> pizza;

        public ObservableCollection<Pizzas> Pizza
        {
            get { return pizza; }
            set { pizza = value;
                OnPropertyChanged();
                }
        }


        public Manager()
        {
            DataContext = this;
            InitializeComponent();
            loadpizzas();
        }
        public void loadpizzas()
        {
            Pizza = cnn.loadpizz();
        }
        private void Button_create(object sender, RoutedEventArgs e)
        {
            manager.PizzaCreate win = new manager.PizzaCreate();
            win.Show();
            this.Close();
        }

        private void Button_bewerk(object sender, RoutedEventArgs e)
        {
            if (LvProduct.SelectedIndex >= 0)
            {
                Pizzas selectedPizza = ((Pizzas)LvProduct.SelectedItem);
                string naam = selectedPizza.Naam.ToString();
                string id = selectedPizza.Id.ToString();
                string kosten = selectedPizza.Kosten.ToString();
                manager.PizzaBewerk win = new manager.PizzaBewerk(naam, kosten, id);
                win.Show();
                this.Close();
            }
            else
            {
                MessageBox.Show("u heeft geen pizza geselecteerd");
            }
           

        }

        private void Button_delete(object sender, RoutedEventArgs e)
        {
            if (LvProduct.SelectedIndex >= 0)
            {
                Pizzas selectedPizza = ((Pizzas)LvProduct.SelectedItem);
                string Pizzaid = selectedPizza.Id.ToString();
                cnn.DeletePizza(Pizzaid);
                loadpizzas();
            }
            else
            {
                MessageBox.Show("u heeft geen pizza geselecteerd");
            }
        }

        private void Button_bakck(object sender, RoutedEventArgs e)
        {
           
        }

        private void Button_beheer(object sender, RoutedEventArgs e)
        {
            if (LvProduct.SelectedIndex >= 0)
            {
                Pizzas selectedPizza = ((Pizzas)LvProduct.SelectedItem);
                string Pizzaid = selectedPizza.Id.ToString();
                string PizzaName = selectedPizza.Naam.ToString();
                InBeheer.Ingredienten win = new InBeheer.Ingredienten(Pizzaid,PizzaName);
                win.Show();
                this.Close();
            }
            else
            {
                MessageBox.Show("u heeft geen pizza geselecteerd");
            }
                
        }
    }
}
