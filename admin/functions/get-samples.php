<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    require_once ROOT_PATH . '../config/db.config.php';
    $db = new DBAccess();
    
    $sql = 'SELECT * FROM samples';

    if(isset($_GET['id'])){
        $id = $db->sanitize($_GET['id']);
        $sql .= ' WHERE sample_id =' . $id; 
    }
    
    $samples = $db->query($sql);

    if($samples){
        return $samples;
    }
    else{
        return $mysqli_error();
    }

?>