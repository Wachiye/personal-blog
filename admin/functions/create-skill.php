<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'skills') {

        require_once ROOT_PATH . '../config/db.config.php';
        $db = new DBAccess();

        // input validation
        if(empty($_POST['category'])){
            return $message_error = "Skill Category cannot be empty.";
        }
        if(empty($_POST['skills'])){
            return $message_error = "Skills cannot be empty";
        }

        //sanitizing inputs
        $category = $db->sanitize($_POST['category']);
        $skills = $db->sanitize($_POST['skills']);

        if(isset($_POST['skill'])){
            $id = $db->sanitize($_POST['skill']);
            $sql = "UPDATE skills SET category = '$category', skills = '$skills' WHERE skill_id = $id";
        } else{
            $sql = "INSERT INTO skills(category, skills) VALUES('$category', '$skills')";
        }

        $result = $db->query($sql);

        if($result){
            $message_reply = 'Skill saved successfully';
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>