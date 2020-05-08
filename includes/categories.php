<?php 
    include_once $path."includes/db.php";
    include_once $path."includes/interface.php";
    
    class category extends database implements operation{
        //variables
        var $cat_name;
        var $cat_id;
        //interface functions
        public function add(){
            $query ="insert into category values(Default,'".$this->getCat_name()."')";
            return parent::DML($query);
        }
        public function update(){
            $query ="update category set cat_name ='".$this->getCat_name()."' where cat_id ='".$this->getCat_id()."'";
            return parent::DML($query);
        }
        public function delete(){
            $query ="delete from category where cat_id =".$this->getCat_id();
            return parent::DML($query);
        }
        public function search(){
            $query ="select * from category where cat_id =".$this->getCat_id();
            return parent::isExist($query);
        }
        public function getAll(){
            $query ="select * from category";
            return parent::isExist($query);
        }
        public function getByCatId(){
            $query="select * from post where post_status='1' and cat_id='".$this->getCat_id()."'";
            return parent::isExist($query);
        }

        /**
         * Get the value of cat_name
         */ 
        public function getCat_name()
        {
                return $this->cat_name;
        }

        /**
         * Set the value of cat_name
         *
         * @return  self
         */ 
        public function setCat_name($cat_name)
        {
                $this->cat_name = $cat_name;

                return $this;
        }

        /**
         * Get the value of cat_id
         */ 
        public function getCat_id()
        {
                return $this->cat_id;
        }

        /**
         * Set the value of cat_id
         *
         * @return  self
         */ 
        public function setCat_id($cat_id)
        {
                $this->cat_id = $cat_id;

                return $this;
        }
    }
?>