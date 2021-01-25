<?php
    
    class DBAccess{
        //details fo accessing mysql database
        protected $db_name = 'portfolio';
        protected $db_user = 'root';
        protected $db_password = '4sirah@123';
        protected $db_host = 'localhost';

        var $db;

        function __construct(){
            $this->connect();
            return $this->db;
        }

        function connect(){
            //establishing mysqli connection
            $this->db = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name)
            or die("ERROR:" .mysqli_connect_error());
        }

        // function disconnect(){
        //     $this->db
        // }

        //sanitizing inputs
        //removing sql injection
        function sanitize($input){
            $result = mysqli_real_escape_string($this->db, $input);
            return $result;
        }

        
        //performing queries
        function query($sql){
           $result = mysqli_query($this->db, $sql);
           return $result;
        }
    }
    
    
?>