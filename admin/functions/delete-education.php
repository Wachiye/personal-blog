<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if (isset($_SESSION['user']) && $_SESSION['user']['type'] != 'admin') {
        return header('Location:./dashboard.php');
    }
    
    require_once ROOT_PATH . '../config/db.config.php';

    $db = new DBAccess();

    if( isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['type'] == 'education'){
        $education_id = $db->sanitize($_GET['education_id']);
        $query = "DELETE FROM education WHERE education_id=$education_id";

        $results = $db->query($query);

        if($results){
            return $message_reply = 'Education Deleted Successfully';
        }
        else{
            return $message_error = 'Unable to delete education record';
        }

    } 
    return null;
?>