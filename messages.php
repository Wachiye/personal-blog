<?php
    session_start();
    if(!$_SESSION['logged_in']){
        return header('Location:login.php');
    }

    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    $page_id = 'Messages';
    require_once ROOT_PATH . 'functions/get_messages.php';
    include_once ROOT_PATH . 'includes/admin_header.php';
    include_once ROOT_PATH . 'includes/admin_nav.php';
    
?>        <div class="main">
            <main class="main-content">
                <div class="top-card">
                    <form action="#">
                        <div class="input-group">
                           <input class="form-control form-control-sm" type="search" name="search" id="search" 
                           placeholder="keyword search">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-dark text-light" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        
                    </form>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i>
                            Compose
                        </button>
                        <button class="btn btn-sm btn-primary">
                            <i class="fa fa-book"></i>
                            Mark as Read
                        </button>
                        <button class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                    </div>
                </div>
                <div class="cards messages">
                <?php
                    while ($msg = mysqli_fetch_array($messages, MYSQLI_ASSOC)) {
                        if($msg['status'] == '0')
                            echo '<div class="card message unread">' ; 
                        else
                            echo '<div class="card message read">' ;
                            
                        echo '<div class="card-header text-center">
                                <h3 class="card-title">' . $msg['subject'] . '</h3>
                                <div class="right">
                                    <input type="checkbox" class="select">
                                    <button class="btn btn-sm btn-primary my-1 update-btn" title="mark as read"
                                    data-target="messages" data-value="'. $msg['message_id'] . '">
                                        <i class="fa fa-book"></i>
                                    </button>
                                    <button href="#" class="btn btn-danger detele-btn"
                                    data-target="messages" data-value="'. $msg['message_id'] . '">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">From: ' . $msg['from_name'] .'</h6>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <i class="fa fa-envelope"></i>
                                        ' . $msg['from_email'] .'
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fa fa-phone"></i>
                                        ' . $msg['from_phone'] .'
                                    </li>
                                </ul>
                                <p>Date: ' . $msg['created_at'] .'</p>
                                <hr>
                                <p class="card-text">' . $msg['message'] .'</p>
                            </div> 
                        </div>'
                    ;
                }?>
                </div>
            </main>
        </div>
    </div>
</body>
</html>