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
        private string ingredient;

        public string Ingredient
        {
            get { return ingredient; }
            set { ingredient = value; }
        }
        private string naam;

        public string Naam
        {
            get { return naam; }
            set { naam = value; }
        }
    }
}
