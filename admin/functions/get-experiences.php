<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    require_once ROOT_PATH . '../config/db.config.php';

    $db = new DBAccess();
    $sql = "SELECT * FROM experiences";

    $results = $db->query($sql);

    $experiences = array();

    if($results){
        while($exp =  mysqli_fetch_array($results, MYSQLI_ASSOC)){
            if($exp['end_year'] == null || $exp['end_year'] == 0){
                $exp['end_year'] = 'Current';
            }
            if($exp['tasks'] != null){
                $exp['tasks'] = explode(",",$exp['tasks']);
            }
            array_push($experiences, $exp);
        }
    }
    else{
        return mysqli_error($db->db);
    }

?>