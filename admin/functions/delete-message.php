<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if (isset($_SESSION['user']) && $_SESSION['user']['type'] != 'admin') {
        return header('Location:./dashboard.php');
    }
    
    require_once ROOT_PATH . '../config/db.config.php';

    $db = new DBAccess();

    $message = '';
    if( isset($_GET['action']) && $_GET['action'] == 'delete'){
        $message_id = $db->sanitize($_GET['message_id']);
        $query = "DELETE FROM messages WHERE message_id=$message_id";

        $results = $db->query($query);

        if($results){
            $message = 'Message Deleted Successfully';
        }
        else{
            $message = 'Unable to delete message';
        }

    }
    
    return $message;

?>