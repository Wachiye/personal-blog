<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once ROOT_PATH . '../config/db.config.php';
        $db = new DBAccess();

        // input validation
        if(empty($_POST['site_title'])){
            return $message_error = "Title cannot be empty.";
        }
        if(empty($_POST['site_tag_line'])){
            return $message_error = "Site Tag Line cannot be empty";
        }
        if(empty($_POST['site_email'])){
            return $message_error = "Site Email Cannot be empty";
        }
        if(empty($_POST['site_phone'])){
            return $message_error = "Site Phone Number Cannot be empty";
        }
        if(empty($_POST['about_me_text'])){
            return $message_error = "About me Text Cannot be empty";
        }

        //sanitizing inputs
        $title = $db->sanitize($_POST['site_title']);
        $tag_line = $db->sanitize($_POST['site_tag_line']);
       
        $email = $_POST['site_email'];
        $phone = $_POST['site_phone'];
        $about_me = $_POST['about_me_text'];

        $desc = $db->sanitize($_POST['description'] ?? null);
        $facebook = $db->sanitize($_POST['facebook_url'] ?? null);
        $twitter = $db->sanitize($_POST['twitter_url'] ?? null);
        $linkedin = $db->sanitize($_POST['linkedin_url'] ?? null);
        $github = $db->sanitize($_POST['github_url'] ?? null);
        //check if settings exits
        
        $query = "SELECT * FROM settings";

        $exists = $db->query($query);

        if($exists && @mysqli_num_rows($exists) >= 1){
            //DELETE settings
            $db->query("DELETE FROM settings");
        }

        $sql = "INSERT INTO settings(setting_key, value) VALUES('site_title','$title'),('site_tag_line', '$tag_line'),('description','$desc'), ('site_email','$email'), ('site_phone','$phone'), ('about_me_text','$about_me'), ('facebook_url','$facebook'), ('twitter_url','$twitter'), ('linkedin_url','$linkedin'), ('github_url','$github')";
        

        $result = $db->query($sql);

        if($result){
            $message_reply = 'Settings updated successfully';
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>