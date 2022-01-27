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
        public Login login(string name)
        {
            Login login = new Login();
            DataTable Dtlogin = new DataTable();
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "SELECT * FROM `users` WHERE `name` LIKE @name";
                command.Parameters.AddWithValue("@name", name);
                MySqlDataReader reader = command.ExecuteReader();
                Dtlogin.Load(reader);

                foreach (DataRow row in Dtlogin.Rows)
                {
                    login.Id = Convert.ToInt32(row["id"].ToString());
                    login.Name = row["name"].ToString();
                    login.Password = row["password"].ToString();
                    
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
              
                pizzas.Kosten = row["kosten"].ToString();
                ocReturnPizzas.Add(pizzas);
                
            }
            return ocReturnPizzas;

        }
        ///_________________________________________________________________________________Create Pizza__________________________________________________________________________
        public void CreatePizza(string naam , string kosten)
        {
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "INSERT INTO `pizzas` (`id`, `naam`, `kosten`) VALUES (NULL, @naam, @kosten)";
                command.Parameters.AddWithValue("@naam", naam);
                command.Parameters.AddWithValue("@kosten", kosten);
                command.ExecuteNonQuery();
            }
        }
        //__________________________________________________________________bewerk pizza___________________________________________________________________________________________
        public void berwerkpizza(string naam, string kosten,string id)
        {
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "UPDATE `pizzas` SET `naam` = @naam, `kosten` = @kosten WHERE `pizzas`.`id` = @id;";
                command.Parameters.AddWithValue("@naam", naam);
                command.Parameters.AddWithValue("@kosten", kosten);
                command.Parameters.AddWithValue("@id", id);
                command.ExecuteNonQuery();
            }
        }
        //___________________________________________________________________delete pizza__________________________________________________________________________________________
        public void DeletePizza(string id )
        {
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "DELETE FROM `pizzas` WHERE `pizzas`.`id` = @id";
                command.Parameters.AddWithValue("@id", id);
                command.ExecuteNonQuery();
            }
        }
        //___________________________________________________________________load users_____________________________________________________________________________________________
        public ObservableCollection<GetUsers> LoadUsers()
        {
            ObservableCollection <GetUsers> ReturnUsers = new ObservableCollection<GetUsers>();
            DataTable DtUsers = new DataTable();
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "SELECT * FROM `users`";
                MySqlDataReader reader = command.ExecuteReader();
                DtUsers.Load(reader);
            }
            foreach (DataRow row in DtUsers.Rows)
            {
                GetUsers user = new GetUsers();
                user.Name = row["name"].ToString();
                user.Email = row["email"].ToString();
                user.Password = row["password"].ToString();
                user.Id = Convert.ToInt32(row["id"].ToString());
                ReturnUsers.Add(user);
               
            }
            return ReturnUsers;
        }
        //_________________________________________________________________________________________Create Users____________________________________________________________________________
        public void createusers(string naam, string wachtwoord, string date, string email)
        {
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, @naam, @email, NULL, @wachtwoord, NULL, NULL, NULL)";
                command.Parameters.AddWithValue("@naam", naam);
                command.Parameters.AddWithValue("@wachtwoord", wachtwoord);
                command.Parameters.AddWithValue("@date", date);
                command.Parameters.AddWithValue("@email", email);
                command.ExecuteNonQuery();
            }
        }
        //____________________________________________________________________________________Delete users_______________________________________________________________________________
        public void DeleteUsers(string id)
        {
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "DELETE FROM `users` WHERE `users`.`id` = @id";
                command.Parameters.AddWithValue("@id", id);
                command.ExecuteNonQuery();
            }
        }
        //______________________________________________________________________________________update Users______________________________________________________________________________
        public void Updateusers(string naam, string email, string wachtwoord,string id)
        {
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "UPDATE `users` SET `name` = @naam, `email` = @email, `email_verified_at` = NULL, `password` = @wachtwoord, `created_at` = NULL, `updated_at` = NULL WHERE `users`.`id` = @id;";
                command.Parameters.AddWithValue("@id", id);
                command.Parameters.AddWithValue("@naam", naam);
                command.Parameters.AddWithValue("@email", email);
                command.Parameters.AddWithValue("@wachtwoord", wachtwoord);
                command.ExecuteNonQuery();
            }
        }
        //_______________________________________________________________________________________create role for user_____________________________________________________________________
        public void kopperole(string roleid, string userid)
        {
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES (NULL, @userid, @roleid, NULL, NULL);";
                command.Parameters.AddWithValue("@roleid", roleid);
                command.Parameters.AddWithValue("@userid", userid);
                command.ExecuteNonQuery();
            }
        }
        public ObservableCollection<defineroll> defineRole(string userid)
        {
            ObservableCollection<defineroll> ReturnUsers = new ObservableCollection<defineroll>();
            DataTable DtUsers = new DataTable();
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "SELECT user_roles.id,role_id,roles.rolname,user_id,users.name, users.email,users.password FROM `user_roles` INNER JOIN users ON user_roles.user_id = users.id INNER JOIN `roles` ON user_roles.role_id = roles.id WHERE user_roles.user_id = @userid";
                command.Parameters.AddWithValue("@userid", userid);
                MySqlDataReader reader = command.ExecuteReader();
                DtUsers.Load(reader);
            }
            foreach (DataRow row in DtUsers.Rows)
            {
                defineroll user = new defineroll();
                user.Name = row["name"].ToString();
                user.Rolname = row["rolname"].ToString();
                user.Id = Convert.ToInt32(row["id"].ToString());
                ReturnUsers.Add(user);
                Console.WriteLine(user.Id);
                Console.WriteLine(user.Name);

            }
            return ReturnUsers;
        }
        //________________________________________________________________________________________Delete role of user_______________________________________________________________________

        public void DeleteRole(string id)
        {
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "DELETE FROM `user_roles` WHERE `user_roles`.`id` = @id";
                command.Parameters.AddWithValue("@id", id);
                command.ExecuteNonQuery();
            }
        }

        //________________________________________________________________________________________load ingredienten______________________________________________________________________________________
        public ObservableCollection<Ingredient> LoadIngredienten()
        {
            ObservableCollection<Ingredient> ReturnIngredienten = new ObservableCollection<Ingredient>();
            DataTable DtIngredienten = new DataTable();
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "SELECT * FROM `ingredients`";
                MySqlDataReader reader = command.ExecuteReader();
                DtIngredienten.Load(reader);
            }
            foreach (DataRow row in DtIngredienten.Rows)
            {
                Ingredient ingedienten = new Ingredient();
                ingedienten.Id = Convert.ToInt32(row["id"].ToString());
                ingedienten.Naam = row["naam"].ToString();
                ingedienten.Soort = row["soort"].ToString();
                
                ReturnIngredienten.Add(ingedienten);
                
            }
            return ReturnIngredienten;
        }
        //________________________________________________________________________________________koppel ingredient______________________________________________________________________________________
        public void Koppelingredient(string pizId, string ingID)
        {
            using (MySqlConnection con = new MySqlConnection(connString))
            {
                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "INSERT INTO `pizza_ingredient` (`id`, `pizza_id`, `ingredient_id`) VALUES (NULL, @pizzaid, @ingid)";
                command.Parameters.AddWithValue("@pizzaid", pizId);              
                command.Parameters.AddWithValue("@ingid", ingID);              
                command.ExecuteNonQuery();
            }
        }
        //______________________________________________________________________________________ingredient list van pizza________________________________________________________________________________
        public ObservableCollection<PizzaIngredient> LoadIngreList(string id)
        {
            ObservableCollection<PizzaIngredient> ReturnIngredientenLijst = new ObservableCollection<PizzaIngredient>();
            DataTable DtIngredientenlist = new DataTable();
            using (MySqlConnection con = new MySqlConnection(connString))
            {

                con.Open();
                MySqlCommand command = con.CreateCommand();
                command.CommandText = "SELECT * FROM `ingredients` INNER JOIN pizza_ingredient ON ingredients.id = pizza_ingredient.ingredient_id WHERE pizza_id = @pizzaid";
                command.Parameters.AddWithValue("@pizzaid", id);
                Console.WriteLine(id);
                MySqlDataReader reader = command.ExecuteReader();
                DtIngredientenlist.Load(reader);

            }
            foreach (DataRow row in DtIngredientenlist.Rows)
            {
                PizzaIngredient ingedienten = new PizzaIngredient();
                ingedienten.Id = Convert.ToInt32(row["id"].ToString());
                ingedienten.Naam = row["naam"].ToString();
                ingedienten.Soort = row["soort"].ToString();
                Console.WriteLine(ingedienten.Naam);
                ReturnIngredientenLijst.Add(ingedienten);
            }
            return ReturnIngredientenLijst;
    }



            public ObservableCollection<Orders>GetAllOrders()
        {
            
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
