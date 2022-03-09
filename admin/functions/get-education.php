<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    require_once ROOT_PATH . '../config/db.config.php';

    $db = new DBAccess();
    $sql = "SELECT * FROM education";

    $results = $db->query($sql);

    $education = array();

    if($results){
        while($ed =  mysqli_fetch_array($results, MYSQLI_ASSOC)){
            if($ed['end_year'] == null || $ed['end_year'] == 0){
                $ed['end_year'] = 'Current';
            }
            array_push($education, $ed);
        }
    }
    else{
        return mysqli_error($db->db);
    }

?>