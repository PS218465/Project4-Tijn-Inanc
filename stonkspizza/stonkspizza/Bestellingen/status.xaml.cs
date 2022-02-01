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

namespace stonkspizza.Bestellingen
{
    /// <summary>
    /// Interaction logic for status.xaml
    /// </summary>
    public partial class status : Window
    {
        DBconnection cnn = new DBconnection();
        string order = null;
        public status( string id)
        {
            InitializeComponent();
            Loaded(id);
            order = id;
        }
        public void Loaded(string id)
        {
            informatie.Text = cnn.GetStatus(id, "status");
        }

        private void save_Click(object sender, RoutedEventArgs e)
        {
            if (cnn.updateStatus(order, informatie.Text))
            {
                MessageBox.Show($"status geupdated");
                BestelScherm orders = new BestelScherm();
                orders.Show();
                this.Close();
            }
            else
            {
                MessageBox.Show($"Updaten mislukt");
            }
        }
    }
}
