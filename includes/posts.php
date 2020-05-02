<?php 
    require_once $path."includes/db.php";
    require_once $path."includes/interface.php";
    class post extends database implements operation{
         var $key;
         var $post_id;
         var $post_title;
         var $post_content;
         var $post_author;
         var $post_category;
         var $post_tags;
         var $post_image;
        //interface functions
        public function add(){
            $query = "insert into post values(Default,'".$this->getPost_title()."','".$this->getPost_content()."','".$this->getPost_author()."','".$this->getPost_image()."','".$this->getPost_category()."',NOW(),'".$this->getPost_tags()."',Default,Default,NOW())";
            return parent::DML($query);
        }
        public function update(){
            $query ="update post set post_title='".$this->getPost_title()."', post_author='".$this->getPost_author()."',post_tags='".$this->getPost_tags()."',post_content='".$this->getPost_content()."',post_image='".$this->getPost_image()."', cat_id='".$this->getPost_category()."' where post_id='".$this->getPost_id()."'";
            return parent::DML($query);
        }
        public function delete(){
            $query="delete from post where post_id='".$this->getPost_id()."'";
            return parent::DML($query);
        }
        public function search(){
            $query ="select * from post where post_tags like '%".$this->getKey()."%' or post_title like '%".$this->getKey()."%' or post_author like'%".$this->getKey()."%' or post_author like'%".$this->getKey()."%'";
            return parent::isExist($query);
        }
        public function getAll(){
            $query ="select * from post_view";
            return parent::isExist($query);
        }
        public function viewAll(){
            $query ="select * from post_view where post_status='1' ";
            return parent::isExist($query);
        }
        public function getById(){
            $query="select * from post where post_id='".$this->getPost_id()."'";
            return parent::isExist($query);
        }
        public function publish(){
            $query="update post set post_status='1' where post_id='".$this->getPost_id()."'";
            return parent::DML($query); 
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

        /**
         * Get the value of post_title
        */ 
        public function getPost_title()
        {
                return $this->post_title;
        }

        /**
         * Set the value of post_title
        *
        * @return  self
        */ 
        public function setPost_title($post_title)
        {
                $this->post_title = $post_title;

                return $this;
        }

        /**
         * Get the value of post_content
        */ 
        public function getPost_content()
        {
                return $this->post_content;
        }

        /**
         * Set the value of post_content
        *
        * @return  self
        */ 
        public function setPost_content($post_content)
        {
                $this->post_content = $post_content;

                return $this;
        }

        /**
         * Get the value of post_author
        */ 
        public function getPost_author()
        {
                return $this->post_author;
        }

        /**
         * Set the value of post_author
        *
        * @return  self
        */ 
        public function setPost_author($post_author)
        {
                $this->post_author = $post_author;

                return $this;
        }

        /**
         * Get the value of post_category
        */ 
        public function getPost_category()
        {
                return $this->post_category;
        }

        /**
         * Set the value of post_category
        *
        * @return  self
        */ 
        public function setPost_category($post_category)
        {
                $this->post_category = $post_category;

                return $this;
        }

        /**
         * Get the value of post_tags
        */ 
        public function getPost_tags()
        {
                return $this->post_tags;
        }

        /**
         * Set the value of post_tags
        *
        * @return  self
        */ 
        public function setPost_tags($post_tags)
        {
                $this->post_tags = $post_tags;

                return $this;
        }

        /**
         * Get the value of post_image
        */ 
        public function getPost_image()
        {
                return $this->post_image;
        }

        /**
         * Set the value of post_image
        *
        * @return  self
        */ 
        public function setPost_image($post_image)
        {
                $this->post_image = $post_image;

                return $this;
        }

        /**
         * Get the value of post_id
        */ 
        public function getPost_id()
        {
                return $this->post_id;
        }

        /**
         * Set the value of post_id
        *
        * @return  self
        */ 
        public function setPost_id($post_id)
        {
                $this->post_id = $post_id;

                return $this;
        }

    }
?>