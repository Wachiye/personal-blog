<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if (isset($_SESSION['user']) && $_SESSION['user']['type'] != 'admin') {
        return header('Location:./dashboard.php');
    }
    
    require_once ROOT_PATH . '../config/db.config.php';

    $db = new DBAccess();

    if( isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['type'] == 'skill'){
        $skill_id = $db->sanitize($_GET['skill_id']);
        $query = "DELETE FROM skills WHERE skill_id=$skill_id";

        $results = $db->query($query);

        if($results){
            return $message_reply = 'Skill Deleted Successfully';
        }
        else{
           return $message_error = 'Unable to delete skill';
        }

    }

    return null;

?>