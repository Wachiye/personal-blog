<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (! defined('ROOT_PATH')) {
            define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
        }
        require_once ROOT_PATH . '../config/db.config.php';
        $db = new DBAccess();

        //validate username and password
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $db->sanitize($_POST['username']);
            $password = $db->sanitize($_POST['password']);
        } else {
            $username = $password = FALSE;

            $error = 'Invalid username/password';
        }

        //if no problem
        if($username && $password){
            //get user with given username and password;
            $sql = "SELECT user_id, full_name, username, type, email, type, created_at, updated_at FROM users WHERE username = '$username' AND password = md5('$password')";
            $user = $db->query($sql);
            //if there is such user, then then length of user should be one
            if($user && @mysqli_num_rows($user) == 1){
                //start session
                session_start();

                $_SESSION['user'] = mysqli_fetch_array ($user, MYSQLI_ASSOC);
                $_SESSION['logged_in'] = true;
                //redirect to url if callback url is set

                return header('Location:./dashboard.php');
            }
            else{
                $error = 'Error: No account exists with given username and password';
            }
        }
        else{
            return $error;
        }
    }
?>