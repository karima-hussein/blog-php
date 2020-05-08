<?php
    include_once $path."includes/db.php";
    include_once $path."includes/interface.php";
    class comment extends database implements operation{
        var $comment_id;
        public function add(){

        }
        public function update(){

        }
        public function delete(){
            $query="delete from comment where comment_id='".$this->getComment_id()."'";
            return parent::DML($query);
        }
        public function search(){

        }
        public function getAll(){
            $query="select * from comment";
            return parent::isExist($query);
        }
        public function getCommById(){
            $query="select * from comment where comment_id='".$this->getComment_id()."'";
            return parent::isExist($query);
        }
        public function publish_comment(){
            $query="update comment set comment_status='1' where comment_id='".$this->getComment_id()."'";
            return parent::DML($query); 
        }
        /**
         * Get the value of comment_id
         */ 
        public function getComment_id()
        {
                return $this->comment_id;
        }

        /**
         * Set the value of comment_id
         *
         * @return  self
         */ 
        public function setComment_id($comment_id)
        {
                $this->comment_id = $comment_id;

                return $this;
        }
    }

?>