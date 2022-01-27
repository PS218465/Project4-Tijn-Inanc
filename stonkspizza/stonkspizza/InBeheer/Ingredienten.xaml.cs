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

namespace stonkspizza.InBeheer
{
    /// <summary>
    /// Interaction logic for Ingredienten.xaml
    /// </summary>
    public partial class Ingredienten : Window, INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;

        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }

        DBconnection cnn = new DBconnection();
        string ahit;
        private ObservableCollection<Ingredient> ingredientenlist;


        public ObservableCollection<Ingredient> Ingredientenlist
        {
            get { return ingredientenlist; }
            set {
                ingredientenlist = value;
                OnPropertyChanged();
            }
        }

       

        private ObservableCollection<PizzaIngredient> pizzaIngredienten;

        public ObservableCollection<PizzaIngredient> PizzaIngredienten
        {
            get { return pizzaIngredienten; }
            set { pizzaIngredienten = value; OnPropertyChanged(); }
        }

        public Ingredienten(string id, string PizzaNaam)
        {
           
            InitializeComponent();
            DataContext = this;
            loadIing(PizzaNaam);
            loadingrelist(id);
            ahit = id;
        }
        public void loadIing(string pizznaam)
        {

            Ingredientenlist = cnn.LoadIngredienten();
            tbpizzanaam.Text = "beheer de pizza "+pizznaam;
            
        }
        public void loadingrelist(string id)
        {
            PizzaIngredienten = cnn.LoadIngreList(id);
        }

        private void LvProduct_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            Ingredient selectedPizza = ((Ingredient)LvProduct.SelectedItem);
            string naam = selectedPizza.Naam.ToString();
            string ingredientid = selectedPizza.Id.ToString();
            string pizzaid = ahit;
            cnn.Koppelingredient(pizzaid,ingredientid);
            MessageBox.Show(pizzaid+" "+ ingredientid);
            loadingrelist(pizzaid);
        }

        private void Button_delete(object sender, RoutedEventArgs e)
        {
            manager.Manager win = new manager.Manager();
            win.Show();
            this.Close();
        }
    }
}
