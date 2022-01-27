using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace stonkspizza.classes
{
    public class bezoekers
    {
        private int id;
        private string voornaam;
        private string achternaam;
        private string adres;
        private string telefoonnummer;
        private string stad;
        private string postcode;

        //--------------------------------------id
        public int Id
        {
            get { return id; }
            set { id = value; }
        }
        //--------------------------------------Voornaam
        public string Voornaam
        {
            get { return voornaam; }
            set { voornaam = value; }
        }
        //---------------------------------------Achternaam
        public string Achternaam
        {
            get { return achternaam; }
            set { achternaam = value; }
        }
        //---------------------------------------adres
        public string Adres
        {
            get { return adres; }
            set { adres = value; }
        }
        //---------------------------------------telefoonnummer
        public string Telefoonnummer
        {
            get { return telefoonnummer; }
            set { telefoonnummer = value; }
        }
        //---------------------------------------postcode
        public string Postcode
        {
            get { return postcode; }
            set { postcode = value; }
        }
        //---------------------------------------stad
        public string Stad
        {
            get { return stad; }
            set { stad = value; }
        }
    }
}
