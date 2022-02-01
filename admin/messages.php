<?php
session_start();
if (!$_SESSION['logged_in']) {
    return header('Location:login.php');
}

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}

$page_id = 'Messages';

require_once ROOT_PATH . 'functions/delete-message.php';

require_once ROOT_PATH . 'functions/reply.php';

require_once ROOT_PATH . 'functions/get-messages.php';
include_once ROOT_PATH . 'includes/admin-header.php';
include_once ROOT_PATH . 'includes/admin-nav.php';


?>
<div class="main">
    <main class="main-content">
        <div class="top-card">
            <form action="#">
                <div class="input-group">
                    <input class="form-control form-control-sm" type="search" name="search" id="search" placeholder="keyword search">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-dark text-light" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>

            </form>
            <div class="btn-group">
                <button class="btn btn-sm btn-primary">
                    <i class="fa fa-book"></i>
                    Mark All Read
                </button>
                <button class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                    Delete All
                </button>
            </div>
        </div>
        <?php
            if(!empty($message_error)){
                echo <<<EOT
                    <div class="alert alert-danger alert-dismissible">
                        <p>$message_error</p>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                EOT;
            }
            if(!empty($message_reply)){
                echo <<<EOT
                    <div class="alert alert-info alert-dismissible">
                        <p>$message_reply</p>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                EOT;
            }
            if(!empty($message)){
                echo <<<EOT
                    <div class="alert alert-info alert-dismissible">
                        <p>$message</p>
                        <button class="close" data-dismiss="alert" data-target="alert">&times;</button>
                    </div>
                EOT;
            }
        ?>
        <div class="cards messages">
            <?php
            while ($msg = mysqli_fetch_array($messages, MYSQLI_ASSOC)) {
                $status = $msg['status'] == 0 ?  'unread' : 'read';
                echo <<<EOT
                    <div class="card message {$status}">
                        <div class="card-body">
                            <h6 class="card-subtitle">From: {$msg['from_name']}</h6>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-envelope"></i>
                                    {$msg['from_email']}
                                </li>
                            </ul>
                            <p>Date: {$msg['created_at']}</p>
                            <hr>
                            <p class="card-text">{$msg['message']}</p>
                            <div id="reply-text-{$msg['message_id']}" class="collapse">
                                <div class="blockquote">{$msg['reply']}</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-sm btn-primary" title="Mark as read" href="?action=read&message_id={$msg['message_id']}">
                                    Mark as Read
                                </a>
                                <button class="btn btn-sm btn-success mx-1" title="Reply"
                                    data-toggle="modal" data-target="#reply-{$msg['message_id']}">
                                    Reply
                                </button>
                                <button class="btn btn-sm btn-secondary" data-toggle="collapse" data-target="#reply-text-{$msg['message_id']}">View Reply</button>
                                <a href="?action=delete&message_id={$msg['message_id']}" title="Delete" class="card-link btn btn-danger btn-sm mx-1">
                                    Delete
                                </a>
                            </div>
                            <div class="modal " id="reply-{$msg['message_id']}">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"> 
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Replying to {$msg['from_name']}</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <form method="POST" target="_self">
                                                    <input type="hidden" name="message_id" value="{$msg['message_id']}" />
                                                    <input type="hidden" name="reply_to_email" value="{$msg['from_email']}" />
                                                    <input type="hidden" name="reply_to_name" value="{$msg['from_name']}" />
                                                    <div class="form-group">
                                                        <label for="reply">Your Message</label>
                                                        <textarea name="reply" id="reply" class="summernote form-control" placeholder="Type Your Message here" rows="7"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-success my-1">
                                                        <i class="fa fa-send"></i>
                                                        Send Reply
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                EOT;
            } ?>
        </div>
    </main>
</div>
<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>