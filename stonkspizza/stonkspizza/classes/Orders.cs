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
        private string naam;
        private int stuks;
        private int pizza;

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
        //--------------------------------------klant id
        public int Pizza
        {
            get { return pizza; }
            set { pizza = value; }
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
        //---------------------------------------totaalprijs
        public string Naam
        {
            get { return naam; }
            set { naam = value; }
        }//---------------------------------------stuks
        public int Stuks
        {
            get { return stuks; }
            set { stuks = value; }
        }
    }
}
