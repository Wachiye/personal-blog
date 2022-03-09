<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    require_once ROOT_PATH . '../config/db.config.php';

    $db = new DBAccess();
    $query = "SELECT articles.*, full_name, email FROM articles join users on articles.user_id = users.user_id ORDER BY created_at DESC";

    if(isset($_GET['limit'])){
        $query .= ' LIMIT ' . $_GET['limit'];
    }
    $articles = $db->query($query);

    if(isset($_GET['view'])){
        $sql = "SELECT articles.*, full_name,email FROM articles join users on articles.user_id = users.user_id WHERE article_id=" . $_GET['view'] . " ORDER BY created_at DESC";
        $article = $db->query($sql); 
        return $articles && $article;
    }

    if($articles){
        return $articles;
    }
    else{
        return mysqli_error($db->db);
    }

?>