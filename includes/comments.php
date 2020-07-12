<?php
    include_once $path."includes/db.php";
    include_once $path."includes/interface.php";
    class comment extends database implements operation{
        var $comment_id;
        var $comment_email;
        var $comment_content;
        var $comment_post_id;
        
        public function add(){
            $query="insert into comment values (default, '".$this->getComment_content()."', '".$this->getComment_email()."','".$this->getComment_post_id()."',NOW(),default)";
            return parent::DML($query);
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
        public function viewAll(){
            $query="select * from comment where comment_status='1' and comment_post_id='".$this->getComment_post_id()."' ";
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
        public function count(){
            $query= "select count(comment_id) as count FROM comment";
            return parent::isExist($query);
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

        /**
         * Get the value of comment_email
         */ 
        public function getComment_email()
        {
                return $this->comment_email;
        }

        /**
         * Set the value of comment_email
         *
         * @return  self
         */ 
        public function setComment_email($comment_email)
        {
                $this->comment_email = $comment_email;

                return $this;
        }

        /**
         * Get the value of comment_content
         */ 
        public function getComment_content()
        {
                return $this->comment_content;
        }

        /**
         * Set the value of comment_content
         *
         * @return  self
         */ 
        public function setComment_content($comment_content)
        {
                $this->comment_content = $comment_content;

                return $this;
        }

        /**
         * Get the value of comment_post_id
         */ 
        public function getComment_post_id()
        {
                return $this->comment_post_id;
        }

        /**
         * Set the value of comment_post_id
         *
         * @return  self
         */ 
        public function setComment_post_id($comment_post_id)
        {
                $this->comment_post_id = $comment_post_id;

                return $this;
        }
    }

?>