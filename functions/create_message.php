<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        require_once ROOT_PATH . 'config/db.config.php';
        $db = new DBAccess();

        // input validation
        if(empty($_POST['full_name'])){
            return $message_error = "Error: Please provide your full name";
        }
        if(empty($_POST['email'])){
           return $message_error = "Error: Please provide your email address for easy communication";
        }
        if(empty($_POST['email'])){
            return $message_error = "Error: Please provide your email address for easy communication";
        }
        if(empty($_POST['message'])){
            return $message_error = "Error: Your message is empty";
        }

        //sanitizing inputs
        $from_name = $db->sanitize($_POST['full_name']);
        $from_email = $db->sanitize($_POST['email']);
        $message = $db->sanitize($_POST['message']);
        $sql = "INSERT INTO messages(from_name, from_email,message) VALUES('$from_name','$from_email','$message')";
            
        $result = $db->query($sql);

        if($result){
            // TODO send email here
            $message_reply = "Message sent successfully. Please be patient. Thank you";
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>