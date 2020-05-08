<?php 
    class validation{
        var $file;

        public function isImage(){
            $img = getFile();
            $img = $img['type'];
            // if($img)
        }
        /**
         * Get the value of file
         */ 
        public function getFile()
        {
            return $this->file;
        }

        /**
         * Set the value of file
         *
         * @return  self
         */ 
        public function setFile($file)
        {
            $this->file = $file;
            return $this;
        }
    }
?>