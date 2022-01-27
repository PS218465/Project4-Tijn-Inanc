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

namespace stonkspizza.manager
{
    /// <summary>
    /// Interaction logic for PizzaCreate.xaml
    /// </summary>
    public partial class PizzaCreate : Window
    {
  
        public PizzaCreate()
        {
     
            InitializeComponent();
          
        }
     
        private void Button_Click(object sender, RoutedEventArgs e)
        {
            if(tbnaam.Text !="" && tbkosten.Text != "")
            {
                manager.Manager win = new manager.Manager();

                DBconnection cnn = new DBconnection();
                string naam = tbnaam.Text;
                string kosten = tbkosten.Text;
                cnn.CreatePizza(naam, kosten);
                win.loadpizzas();
                win.Show();
                this.Close();
            }
            else
            {
                MessageBox.Show("u heeft niet alles ingevuld");
            }
           
          
        }
    }
}
