<?php 
    include_once "includes/db.php";
    include_once "includes/interface.php";
    class category extends database implements operation{
         
      
        //interface functions
        function add(){}
        function update(){}
        function delete(){}
        function search(){}
        function getAll(){
            $query ="select * from category";
            return parent::isExist($query);
        }

    }
?>