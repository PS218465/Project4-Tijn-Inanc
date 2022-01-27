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
    /// Interaction logic for PizzaBewerk.xaml
    /// </summary>
    public partial class PizzaBewerk : Window
    {
        string ahit;
        DBconnection cnn = new DBconnection();
        public PizzaBewerk(string naam, string kosten, string id)
        {
            DataContext = this;
            InitializeComponent();
            loadtext(naam, kosten, id);
            ahit = id;
        }
        private void loadtext(string naam, string kosten, string id)
        {
            tbkosten.Text =kosten;
            tbnaam.Text =naam;
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            cnn.berwerkpizza(tbnaam.Text, tbkosten.Text, ahit);
            manager.Manager win = new manager.Manager();
            win.loadpizzas();
            win.Show();
            this.Close();
        }
    }
}
