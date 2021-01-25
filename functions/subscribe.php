<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        require_once ROOT_PATH . 'config/db.config.php';
        $db = new DBAccess();
        // check if username and email are provided
        if(!empty($_POST['username']) && !empty($_POST['email'])){
            $username = $db->sanitize($_POST['username']);
            $email = $db->sanitize($_POST['email']);

            $sql = "INSERT INTO users(username, email, type) VALUES('$username','$email','subscriber')";
            
            $result = $db->query($sql);
            
            if($result){
                $subscribe_reply = "Successfully subscribed. Thank you";
            }
            else
            {
                $subscribe_error = "Sorry, but an error occurred. Try again later.";
            }
        }
        else{
            $subscribe_error = "Error: Please provide username and email address";
        }
    }
?>