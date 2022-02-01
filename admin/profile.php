<?php
    session_start();
    if(!$_SESSION['logged_in']){
        return header('Location:./');
    }

    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    $page_id = 'Profile';

    $user = $_SESSION['user'];
    
    include_once ROOT_PATH . 'functions/create-user.php';
    include_once ROOT_PATH . 'functions/change-password.php';

    include_once ROOT_PATH . 'includes/admin-header.php';
    include_once ROOT_PATH . 'includes/admin-nav.php';
    require_once ROOT_PATH . 'functions/delete-user.php';
?>

<div class="main">
    <main class="main-content">
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
        ?>
        <div class="cards profile">
            <div class="card summary">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $user['full_name'] ?? '' ?></h3>
                    <h5 class="card-subtitle">@<?php echo $user['username'] ?? '' ?></h5>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-envelope"></i>
                            <?php echo $user['email'] ?? '' ?>
                        </li>
                    </ul>
                    <p>Join Date: <?php echo $user['created_at'] ?? '' ?></p>
                    <hr>
                    <a  href="?action=delete&user_id=<?php echo $user['user_id'] ?>" class="btn btn-danger btn-sm">Delete Account</a>
                </div>
            </div>
            <div class="card edit-profile">
                <div class="card-header">
                    <h2>Edit Profile</h2>
                </div>
                <div class="card-body">
                    <form method="POST" target="_self">
                        <input type="hidden" name="action" value="add-user" />
                        <input type="hidden" name="user" value="<?php echo $user['user_id'] ?? '' ?>" />
                        <input type="hidden" name="username" value="<?php echo $user['username'] ?? '' ?>" />
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" name="full_name" id="full_name" class="form-control"
                                placeholder="Full Name"
                                value="<?php echo $user['full_name'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" class="form-control" disabled
                                value="<?php echo $user['username'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Email"
                                value="<?php echo $user['email'] ?? '' ?>">
                        </div>
                        <input type="hidden" name="type" id="type" class="form-control"
                            value="<?php echo $user['type'] ?? '' ?>">
                        <button type="submit" class="btn btn-sm btn-dark w-50 mx-auto">Save Changes</button>
                    </form>
                </div>
            </div>
            <div class="card change-password">
                <div class="card-header">
                    <h2>Change Password</h2>
                </div>
                <div class="card-body">
                    <form method="POST" target="_self">
                        <input type="hidden" name="action" value="pwd" />
                        <input type="hidden" name="user" value="<?php echo $user['user_id'] ?? '' ?>" />
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" name="old_password" id="old_password" class="form-control"
                                placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control"
                                placeholder="New Password" >
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-sm btn-dark mx-auto">Change Password</button>
                    </form>
                </div>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>