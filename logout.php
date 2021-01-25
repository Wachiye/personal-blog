<?php
    session_start();
    if($_SESSION['logged_in']){
        session_destroy();
        return header('Location:index.php');
    }
?>