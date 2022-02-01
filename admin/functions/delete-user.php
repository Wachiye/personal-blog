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
        $user_id = $db->sanitize($_GET['user_id']);

        $query = "DELETE FROM articles WHERE user_id=$user_id";

        $results = $db->query($query);
        
        if($results){
            $query = "DELETE FROM users WHERE user_id=$user_id";

            $results = $db->query($query);
            //update session values
            if(isset($_SESSION['user']) && $user_id == $_SESSION['user']['user_id']){
                session_unset();
                session_destroy();
                return header('Location:./');
            }
            $message = 'User Deleted Successfully';
        }
        else{
            $message = 'Unable to delete user';
        }

    }
    
    return $message;

?>