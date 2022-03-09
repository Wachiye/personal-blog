<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    require_once ROOT_PATH . 'config/db.config.php';
    $db = new DBAccess();

    require_once ROOT_PATH . 'functions/subscribe.php';
    require_once ROOT_PATH . 'config/db.config.php';
    
    $sql = "SELECT * FROM samples";

    if(isset($_GET['view'])){
        $slag = $db->sanitize($_GET['view']);
        $sql .= " WHERE slag ='${slag}'";
        $sample = $db->query($sql); 
        return $sample;
    }

    $sql .=  " ORDER BY created_at DESC ";

    $samples = $db->query($sql);

    if($samples){
        return $samples;

    }
    else{
        return mysqli_error($db->db);
    }

?>