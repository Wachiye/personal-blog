<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    require_once ROOT_PATH . '../config/db.config.php';
    $db = new DBAccess();
    $query = 'SELECT * FROM messages';
    $messages = $db->query($query);
    if($messages){
    return $messages;
    }
    else{
        return $mysqli_error();
    }

?>