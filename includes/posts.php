<?php 
    include_once "includes/db.php";
    include_once "includes/interface.php";
    class post extends database implements operation{
         var $key;
        //interface functions
        function add(){}
        function update(){}
        function delete(){}
        function search(){
            $query ="select * from post where post_tags like '%".$this->getKey()."%' or post_title like '%".$this->getKey()."%' or post_author like'%".$this->getKey()."%' or post_author like'%".$this->getKey()."%'";
            return parent::isExist($query);
        }
        function getAll(){
            $query ="select * from post";
            return parent::isExist($query);
        }

        //properties//

        /**
         * Get the value of key
        */ 
        public function getKey()
        {
                return $this->key;
        }

        /**
         * Set the value of key
        *
        * @return  self
        */ 
        public function setKey($key)
        {
                $this->key = $key;

                return $this;
        }
    }
?>