<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'experience') {

        require_once ROOT_PATH . '../config/db.config.php';
        $db = new DBAccess();

        // input validation
        if(empty($_POST['title'])){
            return $message_error = "Title cannot be empty.";
        }
        if(empty($_POST['company'])){
            return $message_error = "Company cannot be empty";
        }
        if(empty($_POST['from'])){
            return $message_error = "Entry Year cannot be empty";
        }
        if(empty($_POST['tasks'])){
            return $message_error = "Tasks cannot be empty";
        }
        

        //sanitizing inputs
        $title = $db->sanitize($_POST['title']);
        $company = $db->sanitize($_POST['company']);
        $from = (int) $_POST['from'];
        $to = isset($_POST['to']) ? (int) $_POST['to'] : 0 ;
        $tasks = $db->sanitize($_POST['tasks']);

        if(isset($_POST['experience'])){
            $id = $db->sanitize($_POST['experience']);
            $sql = "UPDATE experiences SET title = '$title', company = '$company', start_year=$from, end_year=$to, tasks='$tasks' WHERE experience_id = $id";
        } else{
            $sql = "INSERT INTO experiences(title, company, start_year, end_year, tasks) VALUES('$title', '$company', $from, $to, '$tasks')";
        }

        $result = $db->query($sql);

        if($result){
            $message_reply = 'Work Experience saved successfully';
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>