<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'pwd') {

        require_once ROOT_PATH . '../config/db.config.php';
        $db = new DBAccess();

        // input validation
        if(empty($_POST['old_password'])){
            return $message_error = "Old Password cannot be empty.";
        }
        if(empty($_POST['new_password']) || empty($_POST['confirm_password'])){
            return $message_error = "New Password cannot be empty.";
        }
        // checking password match
        if($_POST['confirm_password'] != $_POST['new_password']){
            return $message_error = "Password's don't match";
        }
        //sanitizing inputs
        $old_pass = $db->sanitize($_POST['old_password']);
        $new_pass = $db->sanitize($_POST['new_password']);
        $user_id = $_SESSION['user']['user_id'];

        //get user and match passwords
        $sql = "SELECT * FROM users WHERE password = md5('$old_pass') AND user_id=$user_id";
        $user = $db->query($sql);
        //if there is such user, then then length of user should be one
        if($user && @mysqli_num_rows($user) == 1){
            $sql = "UPDATE users set password = md5('$new_pass') WHERE user_id = $user_id";
        
            $result = $db->query($sql);

            if($result){
                //send email here
                $message_reply = 'Password changed successfully. Use your new password next time you login';
            }
            else
            {
                $message_error = "Sorry, but an error occurred. Try again later.";
            }
        } else{
            $message_error = "Old passwords don't match.";
        }
        
    }
?>