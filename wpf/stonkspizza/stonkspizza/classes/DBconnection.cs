using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace stonkspizza.classes
{
    class DBconnection
    {
       
        string connString = ConfigurationManager.ConnectionStrings["ConnOpdracht"].ConnectionString;
        //--------------------------------------------------------------------------------------------------LOGIN--------------------------------------------------------------------------------
        public Login login(string name, string password)
        {
            Login login = new Login();
            DataTable Dtlogin = new DataTable();
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "SELECT * FROM `users` WHERE name = @name AND password = @password";
                command.Parameters.AddWithValue("@name", name);
                command.Parameters.AddWithValue("@password", password);
                MySqlDataReader reader = command.ExecuteReader();
                Dtlogin.Load(reader);

                foreach (DataRow row in Dtlogin.Rows)
                {
                    login.Id = Convert.ToInt32(row["id"].ToString());
                    login.Name = row["name"].ToString();
                }
                return login;
            }  
        }
       public Role role(string userid)
        {
            Role role = new Role();
            DataTable DtRole = new DataTable();
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "SELECT * FROM `user_roles`WHERE user_id = @userid";
                command.Parameters.AddWithValue("@userid", userid);
                MySqlDataReader reader = command.ExecuteReader();
                DtRole.Load(reader);
            }
            foreach (DataRow row in DtRole.Rows)
            {
                role.Id = Convert.ToInt32(row["id"].ToString());
                role.User_id = Convert.ToInt32(row["user_id"].ToString());
                role.Role_id = Convert.ToInt32(row["role_id"].ToString());
                Console.WriteLine(role.Role_id);
            }
            return role;
        }
        //-----------------------------------------------------------------------------------------------load pizzas
        public ObservableCollection<Pizzas> loadpizz()
        {

            ObservableCollection<Pizzas> ocReturnPizzas = new ObservableCollection<Pizzas>();
            DataTable dtPizzas = new DataTable();
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "SELECT * FROM `pizzas`";
                MySqlDataReader reader = command.ExecuteReader();
                dtPizzas.Load(reader);

            }
            foreach (DataRow row in dtPizzas.Rows)
            {
                Pizzas pizzas = new Pizzas();
                pizzas.Id = Convert.ToInt32(row["id"].ToString());
                pizzas.Naam = row["naam"].ToString();
                pizzas.Ingredienten = row["ingredienten"].ToString();
                pizzas.Kosten = row["kosten"].ToString();
                ocReturnPizzas.Add(pizzas);
                Console.WriteLine(pizzas.Naam);
            }
            return ocReturnPizzas;

        }

        public ObservableCollection<Orders>GetAllOrders()
        {
            Console.WriteLine("test");
            ObservableCollection<Orders> ocReturnOrders = new ObservableCollection<Orders>();
            DataTable DtOrders = new DataTable();

            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "SELECT * FROM `orders`;";
                MySqlDataReader reader = command.ExecuteReader();
                DtOrders.Load(reader);
                foreach(DataRow row in DtOrders.Rows)
                {
                    Orders order = new Orders();
                    order.Id = Convert.ToInt32(row["id"].ToString());
                    order.Klant_id = Convert.ToInt32(row["klant_id"].ToString());
                    order.Bestelling = row["bestelling"].ToString();
                    ocReturnOrders.Add(order);
                 
                }
                return ocReturnOrders;
               
            }
        }
    }
}
