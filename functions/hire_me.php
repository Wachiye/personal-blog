<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'hire-me') {
        
        require_once ROOT_PATH . 'config/db.config.php';
        require_once ROOT_PATH . 'utils/file-upload.php';
        $db = new DBAccess();

        // input validation
        if(empty($_POST['full_name'])){
            return $message_error = "Error: Please provide your full name";
        }
        if(empty($_POST['email'])){
           return $message_error = "Error: Please provide your email address for easy communication";
        }
        if(empty($_POST['project'])){
            return $message_error = "Error: Please select Project Type";
         }
         
        if(empty($_POST['description'])){
            return $message_error = "Error: Your Website description cannot be empty";
        }

        if(empty($_POST['budget']) || is_nan($_POST['budget'])){
            return $message_error = "Error: Budget cannot be empty";
        }

        //sanitizing inputs
        $from_name = $db->sanitize($_POST['full_name']);
        $from_email = $db->sanitize($_POST['email']);
        $description = $db->sanitize($_POST['description']);
        $budget = $db->sanitize($_POST['budget']);
        $project = $db->sanitize($_POST['project']);
    
        
        if($_FILES['attachment']){
            $ext = strtolower(pathinfo( basename($_FILES['attachment']['name']),PATHINFO_EXTENSION));
            $filename =$from_name ."-" . $project . "-attachment-" . time() ."." . $ext;
            $filename = str_replace(" ", "-", $filename);
            
            $upload = uploadFile($_FILES['attachment'], $filename );
            if($upload == -1){
                return $message_error = "File too large. Upload file must be <= 2MB";
            }
            else if($upload == 0){
                return $message_error = "An error occured while uploading attachment";
            }
        }

        $sql = "INSERT INTO hire_me(from_name, from_email,project, description, budget, attachment) VALUES('$from_name','$from_email','$project','$description',$budget, '$filename')";
            
        $result = $db->query($sql);

        if($result){
            // TODO send email here
            $message_reply = "Project Request sent successfully. Please be patient. Thank you";
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>