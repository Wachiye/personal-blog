<?php
    session_start();

    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    if(!$_SESSION['logged_in']){
        return header('Location:./');
    }

    if (isset($_SESSION['user']) && $_SESSION['user']['type'] != 'admin') {
        return header('Location:./dashboard.php');
    }

    $page_id = 'Add User';

    include_once ROOT_PATH . 'includes/admin-header.php';
     include_once ROOT_PATH . 'includes/admin-nav.php';

    $user = null;

    if(isset($_GET['id']) && isset($_GET['action'])){
        require_once ROOT_PATH . 'functions/get-users.php';
        $user = mysqli_fetch_array ($users, MYSQLI_ASSOC);
    }

    require_once ROOT_PATH . 'functions/create-user.php';

?>
<div class="main">
    <main class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card bg-transparent">
                        <div class="card-body">
                            <form target="_self" method="POST">
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
                                    if(isset($_GET['id']) && isset($_GET['action'])){
                                        echo <<<EOT
                                            <input type="hidden" name="user" value="$id" /> 
                                        EOT;
                                    }
                                ?>
                                <div class="form-row">

                                    <div class="col-md-7">
                                    <input type="hidden" name="action" value="add-user" />
                                        <div class="form-group">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" name="full_name" id="full_name" class="form-control"
                                                placeholder="Full Name" value="<?php echo $user['full_name'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                placeholder="Username" value="<?php echo $user['username'] ?? '' ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" value="<?php echo $user['email'] ?? '' ?>">
                                </div>
                                <?php 
                                    if(!isset($_GET['id']) && !isset($_GET['action'])){
                                        echo <<<EOT
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                                    placeholder="Confirm Password ">
                                            </div>
                                        EOT;
                                    }

                                ?>
                                
                                <div class="form-group">
                                    <label for="type">Select User Type</label>
                                    <select name="type" id="type" class="form-control" value="<?php echo $user['type'] ?? 'user' ?>">
                                        <option value="user" >User</option>
                                        <option value="subscriber">Subscriber</option>
                                        <option value="author" >Author</option>
                                        <option value="admin" >Admin</option>
                                    </select>
                                </div>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-ms btn-secondary">
                                        <i class="fa fa-save"></i>
                                        Save User
                                    </button>
                                    <a class="btn btn-ms btn-info mx-2" href="./users.php">
                                        <i class="fa fa-eye"></i>
                                        View Users
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>