<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    require_once __DIR__ . "/DotEnv.php";

    (new DotEnv(  __DIR__ . '/.env'))->load();

    class DBAccess{
        //details fo accessing mysql database
        protected $db_name;
        protected $db_user;
        protected $db_password;
        protected $db_host;

        var $db;

        function __construct(){
            $this->db_host = $_ENV['DB_HOST'];
            $this->db_name = $_ENV['DB_NAME'];
            $this->db_user = $_ENV['DB_USERNAME'];
            $this->db_password = $_ENV['DB_PASSWORD'];
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