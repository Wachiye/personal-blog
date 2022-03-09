<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    require_once ROOT_PATH . '../config/db.config.php';

    $db = new DBAccess();
    $sql = "SELECT * FROM skills";

    $results = $db->query($sql);

    $skills = array();

    if($results){
        while($skill =  mysqli_fetch_array($results, MYSQLI_ASSOC)){
            if($skill['skills'] != null){
                $skill['skills'] = explode(",",$skill['skills']);
            }
            array_push($skills, $skill);
        }
    }
    else{
        return mysqli_error($db->db);
    }

?>