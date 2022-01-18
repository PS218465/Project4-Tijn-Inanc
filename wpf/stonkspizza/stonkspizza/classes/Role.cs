using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace stonkspizza.classes
{
    public class Role
    {
        private int id;

        public int Id
        {
            get { return id; }
            set { id = value; }
        }
        private int user_id;

        public int User_id
        {
            get { return user_id; }
            set { user_id = value; }
        }
        private int role_id;

        public int Role_id
        {
            get { return role_id; }
            set { role_id = value; }
        }
    }
}
