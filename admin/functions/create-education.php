<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'education') {

        require_once ROOT_PATH . '../config/db.config.php';
        $db = new DBAccess();

        // input validation
        if(empty($_POST['course'])){
            return $message_error = "Course cannot be empty.";
        }
        if(empty($_POST['institution'])){
            return $message_error = "Institution cannot be empty";
        }
        if(empty($_POST['location'])){
            return $message_error = "Institution Location cannot be empty";
        }
        if(empty($_POST['from'])){
            return $message_error = "Entry Year cannot be empty";
        }
        

        //sanitizing inputs
        $course = $db->sanitize($_POST['course']);
        $institution = $db->sanitize($_POST['institution']);
        $location = $_POST['location'];
        $from = (int) $_POST['from'];
        $to = isset($_POST['to']) ? (int) $_POST['to'] : 0;
        $grade = $db->sanitize($_POST['grade'] ?? null);

        if(isset($_POST['education'])){
            $id = $db->sanitize($_POST['education']);
            $sql = "UPDATE education SET course = '$course', institution = '$institution', location= '$location', start_year=$from, end_year=$to, grade='$grade' WHERE education_id = $id";
        } else{
            $sql = "INSERT INTO education(course, institution, location, start_year, end_year, grade) VALUES('$course', '$institution','$location', $from, $to, '$grade')";
        }

        $result = $db->query($sql);

        if($result){
            $message_reply = 'Education record saved successfully';
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>