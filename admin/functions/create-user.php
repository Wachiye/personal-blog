<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'add-user') {

        require_once ROOT_PATH . '../config/db.config.php';
        $db = new DBAccess();

        // input validation
        if(empty($_POST['full_name'])){
            return $message_error = "Please provide full name";
        }
        if(empty($_POST['username'])){
            return $message_error = "Please provide username";
        }
        if(empty($_POST['email'])){
            return $message_error = "Please provide your email address";
        }
        if(empty($_POST['type'])){
            return $message_error = "Please select user type";
        }

        if(!isset($_POST['user'])){
            if(empty($_POST['password']) || empty($_POST['confirm_password'])){
                return $message_error = "Password is required";
            }

            if($_POST['password'] != $_POST['confirm_password']){
                return $message_error = "Passwords don't match";
            }
            $password = $db->sanitize($_POST['password']);
        }

        //sanitizing inputs
        $full_name = $db->sanitize($_POST['full_name']);
        $username = $db->sanitize($_POST['username']);
        $email = $db->sanitize($_POST['email']);
        $type = $db->sanitize($_POST['type']);
        

        $sql = null ;

        if(isset($_POST['user'])){
            $id = $db->sanitize($_POST['user']);
            $sql = "UPDATE users SET full_name = '$full_name', username = '$username', email= '$email', type= '$type' WHERE user_id = $id";
        } else{
            $sql = "INSERT INTO users(full_name, username, email, type, password) VALUES('$full_name','$username','$email','$type', md5('$password'))";
        }

        $result = $db->query($sql);

        if($result){
            // TODO send email here
            if(isset($_POST['user'])){
                $message_reply = 'User updated successfully';
                //update sesion values
                if(isset($_SESSION['user']) && $username == $_SESSION['user']['username']){
                    $_SESSION['user']['full_name'] = $full_name;
                    $_SESSION['user']['username'] = $username;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['type'] = $type;
                }
            }
            else
                $message_reply = "User Added successfully";
            
                
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>