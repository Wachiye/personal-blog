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
        $hire_id = $db->sanitize($_GET['hire_id']);
        $attachment = $db->sanitize($_GET['attachment']);

        $query = "DELETE FROM hire_me WHERE hire_id=$hire_id";

        $results = $db->query($query);

        if($results){
            unlink("../uploads/" . $attachment);
            $message = 'Hire Me Deleted Successfully';
        }
        else{
            $message = 'Unable to delete hire';
        }

    }
    
    return $message;

?>