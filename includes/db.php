<?php
    class database{

        var $db_host='localhost';
        var $db_name='cms';
        var $db_user='root';
        var $db_pass='';
        var $connection;

        function __construct(){
            $this->connection =mysqli_connect($this->db_host , $this->db_user, $this->db_pass,$this->db_name);
        }
        
        // for insert/delete/update data
        public function DML($query){
            if(!mysqli_query($this->connection ,$query)){
                return "query failed ".mysqli_error($this->connection);
            }else{
                return "done";
            }
        }
            
        public function isExist($queryStat){
            //boolean value
            $result =mysqli_query($this->connection,$queryStat);
            return $result;
        }
    }
   

?>