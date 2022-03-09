<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    require_once ROOT_PATH . '../config/db.config.php';

    $db = new DBAccess();
    $sql = "SELECT * FROM settings";

    $settings = $db->query($sql);

    if($settings){
        $site = null;

        while($setting =  mysqli_fetch_array($settings, MYSQLI_ASSOC)){
            $site[$setting['setting_key']] = $setting['value'];
        }

        return $site;
    }
    else{
        return mysqli_error($db->db);
    }

?>