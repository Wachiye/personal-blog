<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    require_once ROOT_PATH . 'config/db.config.php';

    $db = new DBAccess();
    $sql = "SELECT * FROM services";

    $services = $db->query($sql);

    if($services){
        return $services;
    }
    else{
        return mysqli_error($db->db);
    }

?>