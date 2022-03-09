<?php
     if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    $data = array(
        "users" => array(),
        "recent_users" => array(),
        "subscribers" => array(),
        "recent_subscribers" => array(),
        "articles" => array(),
        "messages" => array(),
        "unread_messages" => array(),
        "samples" => array(),
        "page_views" => array()
    );

    include_once ROOT_PATH . 'functions/get-users.php';
    include_once ROOT_PATH . 'functions/get-articles.php';
    include_once ROOT_PATH . 'functions/get-messages.php';
    include_once ROOT_PATH . 'functions/get-samples.php';
    include_once ROOT_PATH . 'functions/get-page-stats.php';


    if($users != null){
        while($user = mysqli_fetch_array( $users, MYSQLI_ASSOC)){
            $date_diff = date_diff(date_create($user['created_at']), date_create());
            
            array_push($data['users'], $user);
            
            if($user['type'] == 'subscriber'){
                array_push($data['subscribers'], $user);
            }
            if($date_diff->d <= 7){
                array_push($data['recent_users'], $user);
                if($user['type'] == 'subscriber'){
                    array_push($data['recent_subscribers'], $user);
                }
            }
        }
        
    }

    if($articles != null){
        while($article = mysqli_fetch_array( $articles, MYSQLI_ASSOC)){
            array_push($data['articles'], $article);
        }
    }

    if($messages != null){
        while($msg = mysqli_fetch_array( $messages, MYSQLI_ASSOC)){
            array_push($data['messages'], $msg);
            if($msg['status'] == 0){
                array_push($data['unread_messages'], $msg);
            }
        }
    }

    if($page_views != null){
        $total_views = 0;
        while($page = mysqli_fetch_array( $page_views, MYSQLI_ASSOC)){
            array_push($data['page_views'], $page);
            $total_views += $page['views'];
        }
        for ($i=0; $i < count($data['page_views']); $i++) { 
            $data['page_views'][$i]['page_name'] = str_replace("_"," ", $data['page_views'][$i]['page_name']);
            $data['page_views'][$i]['views'] = (int) ($data['page_views'][$i]['views'] / $total_views * 100);
        }
    }
?>