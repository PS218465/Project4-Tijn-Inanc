using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace stonkspizza.classes
{
    public class Ingedient
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
        private string soort;

        public string Soort
        {
            get { return soort; }
            set { soort = value; }
        }

    }
}
