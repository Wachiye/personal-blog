<?php
    session_start();
    if($_SESSION['logged_in']){
        session_unset();
        session_destroy();
        return header('Location:./');
    }
?>