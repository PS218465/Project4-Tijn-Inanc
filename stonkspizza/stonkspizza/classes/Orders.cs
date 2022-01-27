using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace stonkspizza.classes
{
    public class Orders
    {
        private int id;
        private int klant_id;
        private string bestelling;

        //--------------------------------------id
        public int Id
        {
            get { return id; }
            set { id = value; }
        }
        //--------------------------------------klant id
        public int Klant_id
        {
            get { return klant_id; }
            set { klant_id = value; }
        }
        //---------------------------------------bestelling
        public string Bestelling
        {
            get { return bestelling; }
            set { bestelling = value; }
        }
    }
}
