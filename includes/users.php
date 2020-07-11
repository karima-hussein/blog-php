<?php 
    include_once $path."includes/db.php";
    include_once $path."includes/interface.php";

    class user extends database implements operation{
        var $username;
        var $fname;
        var $lname;
        var $user_id;
        var $user_pass;
        var $user_email;
        var $user_phone;
        var $user_role;
        var $user_image;

        public function add(){
             $query="insert into users values ('DEFAULT','".$this->getUsername()."','".$this->getUser_phone()."','".$this->getUser_email()."','".$this->getUser_pass()."','".$this->getFname()."','".$this->getLname()."','".$this->getUser_image()."','".$this->getUser_role()."')";  
             return parent::DML($query);
        }
        public function update(){
            
        }
        public function delete(){

        }
        public function search(){
            
        }
        public function getAll(){
            $query='select * from users';
            return parent::isExist($query);
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of fname
         */ 
        public function getFname()
        {
                return $this->fname;
        }

        /**
         * Set the value of fname
         *
         * @return  self
         */ 
        public function setFname($fname)
        {
                $this->fname = $fname;

                return $this;
        }

        /**
         * Get the value of user_id
         */ 
        public function getUser_id()
        {
                return $this->user_id;
        }

        /**
         * Set the value of user_id
         *
         * @return  self
         */ 
        public function setUser_id($user_id)
        {
                $this->user_id = $user_id;

                return $this;
        }

        /**
         * Get the value of user_pass
         */ 
        public function getUser_pass()
        {
                return $this->user_pass;
        }

        /**
         * Set the value of user_pass
         *
         * @return  self
         */ 
        public function setUser_pass($user_pass)
        {
                $this->user_pass = $user_pass;

                return $this;
        }

        /**
         * Get the value of user_email
         */ 
        public function getUser_email()
        {
                return $this->user_email;
        }

        /**
         * Set the value of user_email
         *
         * @return  self
         */ 
        public function setUser_email($user_email)
        {
                $this->user_email = $user_email;

                return $this;
        }

        /**
         * Get the value of user_phone
         */ 
        public function getUser_phone()
        {
                return $this->user_phone;
        }

        /**
         * Set the value of user_phone
         *
         * @return  self
         */ 
        public function setUser_phone($user_phone)
        {
                $this->user_phone = $user_phone;

                return $this;
        }

        /**
         * Get the value of user_role
         */ 
        public function getUser_role()
        {
                return $this->user_role;
        }

        /**
         * Set the value of user_role
         *
         * @return  self
         */ 
        public function setUser_role($user_role)
        {
                $this->user_role = $user_role;

                return $this;
        }

        /**
         * Get the value of lname
         */ 
        public function getLname()
        {
                return $this->lname;
        }

        /**
         * Set the value of lname
         *
         * @return  self
         */ 
        public function setLname($lname)
        {
                $this->lname = $lname;

                return $this;
        }

        /**
         * Get the value of user_image
         */ 
        public function getUser_image()
        {
                return $this->user_image;
        }

        /**
         * Set the value of user_image
         *
         * @return  self
         */ 
        public function setUser_image($user_image)
        {
                $this->user_image = $user_image;

                return $this;
        }
    }
?>