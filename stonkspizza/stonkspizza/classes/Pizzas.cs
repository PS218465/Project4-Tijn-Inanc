using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace stonkspizza.classes
{
    public class Pizzas
    {
        private int id;

        public int Id
        {
            get { return id; }
            set { id = value; }
        }

        private string naam;

        public string Naam
        {
            get { return naam; }
            set { naam = value; }
        }
        private string kosten;

        public string Kosten
        {
            get { return kosten; }
            set { kosten = value; }
        }

    }
}
