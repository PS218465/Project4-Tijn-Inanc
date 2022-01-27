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
        private string status;
        private string totaalprijs;

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
        //---------------------------------------status
        public string Status
        {
            get { return status; }
            set { status = value; }
        }
        //---------------------------------------totaalprijs
        public string Totaalprijs
        {
            get { return totaalprijs; }
            set { totaalprijs = value; }
        }
    }
}
