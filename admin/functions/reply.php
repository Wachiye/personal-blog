<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once ROOT_PATH . '../config/db.config.php';
        // require_once ROOT_PATH . '../utils/Mail.php';

        $db = new DBAccess();
        // $mailer = new Mail();

        // input validation
        if(empty($_POST['reply'])){
            return $message_error = "Reply Message cannot be empty.";
        }
        // if(empty($_POST['reply_to_email'])){
        //     return $message_error = "Recipient Email cannot be null";
        // }
        // if(empty($_POST['reply_to_name'])){
        //     return $message_error = "Recipient Name cannot be null";
        // }
        if(empty($_POST['reply'])){
            return $message_error = "Reply Message cannot be empty.";
        }
        if(empty($_POST['message_id'])){
            return $message_error = "Original Message cannot be empty.";
        }
        
        //sanitizing inputs
        $reply = $db->sanitize($_POST['reply']);
        $message_id = $db->sanitize($_POST['message_id']);
        $reply_by = $_SESSION['user']['user_id'];

         $sql = "UPDATE messages set status = 1, reply = '$reply', reply_by = '$reply_by' WHERE message_id = $message_id";
        
        $result = $db->query($sql);

        if($result){
            //send email here
            // $mailer->setToEmail($_POST['reply_to_email']);
            // $mailer->setToName($_POST['reply_to_name']);
            // $mailer->setMessage($reply);
            
            // if($mailer->send()){
                $message_reply = 'Reply send successfully';
            // } else{
            //     $message_error = "Sorry, but an error occurred while sending email to recipient.";
            // };
            
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>