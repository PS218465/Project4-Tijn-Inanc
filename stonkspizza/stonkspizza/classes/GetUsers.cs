using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace stonkspizza.classes
{
    public class GetUsers
    {
        private int id;

        public int Id
        {
            get { return id; }
            set { id = value; }
        }

        private string name;

        public string Name
        {
            get { return name; }
            set { name = value; }
        }
        private string email;

        public string Email
        {
            get { return email; }
            set { email = value; }
        }

        private string password;

        public string Password
        {
            get { return password; }
            set { password = value; }
        }
        private int roleId;

        public int RoleId
        {
            get { return roleId; }
            set { roleId = value; }
        }
        private string rolname;

        public string Rolname
        {
            get { return rolname; }
            set { rolname = value; }
        }
        private int userId;

        public int UserId
        {
            get { return userId; }
            set { userId = value; }
        }

    }
}
