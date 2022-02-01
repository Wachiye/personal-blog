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
            return $message_error = "Article content cannot be null";
        }
        if(empty($_POST['tags'])){
            return $message_error = "Please tags to this article";
        }
        

        //sanitizing inputs
        $title = $db->sanitize($_POST['title']);
        $subtitle = $db->sanitize($_POST['subtitle'] ?? null);
        $excerpt = $db->sanitize($_POST['excerpt'] ?? null);
        $content = $db->sanitize($_POST['content']);
        $category = $db->sanitize($_POST['type'] ?? 'uncategorized');
        $id = $_SESSION['user']['user_id'];
        $tags = $_POST['tags'];

        if(isset($_POST['article'])){
            $id = $db->sanitize($_POST['article']);
            $sql = "UPDATE articles SET title = '$title', subtitle ='$subtitle',excerpt = '$excerpt', content = '$content', tags = '$tags', category = '$category' WHERE article_id = $id";
        } else{
            $sql = "INSERT INTO articles(user_id, title, subtitle, excerpt, content, tags, category) VALUES($id,'$title','$subtitle','$excerpt', '$content','$tags','$category')";
        }

        $result = $db->query($sql);

        if($result){
            $message_reply = 'Article published successfully';
        }
        else
        {
            $message_error = "Sorry, but an error occurred. Try again later.";
        }
    }
?>