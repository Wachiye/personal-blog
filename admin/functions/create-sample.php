<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once ROOT_PATH . '../config/db.config.php';
        $db = new DBAccess();

        // input validation
        if(empty($_POST['title'])){
            return $message_error = "Title cannot be empty.";
        }
        if(empty($_POST['content'])){
            return $message_error = "Sample content cannot be empty";
        }
        if(empty($_POST['github_url'])){
            return $message_error = "Please enter github repository url for this sample";
        }
        

        //sanitizing inputs
        $title = $db->sanitize($_POST['title']);
        $content = $db->sanitize($_POST['content']);
        $github_url = $_POST['github_url'];

        if(isset($_POST['sample'])){
            $id = $db->sanitize($_POST['sample']);
            $sql = "UPDATE samples SET title = '$title', content = '$content', github_url= '$github_url' WHERE sample_id = $id";
        } else{
            $sql = "INSERT INTO samples(title, content, github_url) VALUES('$title', '$content','$github_url')";
        }

        $result = $db->query($sql);

        if($result){
            $message_reply = 'Sample published successfully';
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>