<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    require_once ROOT_PATH . 'config/db.config.php';
    $db = new DBAccess();

    require_once ROOT_PATH . 'functions/subscribe.php';
    require_once ROOT_PATH . 'config/db.config.php';
    
    $sql = 'SELECT * FROM samples';

    $samples = $db->query($sql);

    if($samples){
        return $samples;
    }
    else{
        return mysqli_error();
    }

?>