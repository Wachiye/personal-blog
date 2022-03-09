<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    require_once ROOT_PATH . '../config/db.config.php';
    $db = new DBAccess();
    
    $sql = 'SELECT * FROM hire_me';

    if(isset($_GET['id'])){
        $id = $db->sanitize($_GET['id']);
        $sql .= ' WHERE hire_id =' . $id; 
    }
    
    $sql .= " ORDER BY created_at DESC";

    $hire_me = $db->query($sql);

    if($hire_me){
        return $hire_me;
    }
    else{
        return mysqli_error($db->db);
    }

?>