using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace stonkspizza.classes
{
    public class bestelling
    {
        private int ingredientenid;

        public int Ingredientenid
        {
            get { return ingredientenid; }
            set { ingredientenid = value; }
        }
        private int ingredient;

        public int Ingredient
        {
            get { return ingredient; }
            set { ingredient = value; }
        }
        private int naam;

        public int Naam
        {
            get { return naam; }
            set { naam = value; }
        }
    }
}
