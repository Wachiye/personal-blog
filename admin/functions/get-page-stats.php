<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    require_once ROOT_PATH . '../config/db.config.php';

    $db = new DBAccess();
    $query = "SELECT page_name, views from page_views;";

    $page_views = $db->query($query);

    if($page_views){
        return $page_views;
    }
    else{
        return mysqli_error($db->db);
    }

?>