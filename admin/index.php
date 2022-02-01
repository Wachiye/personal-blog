
<?php
session_start();

if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}
if (isset($_SESSION['logged_in'])) {
    return header('Location:./dashboard.php');
}

$page_id = 'Login';

require_once ROOT_PATH . 'functions/login.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <style>
        .container{
             margin-top:50px;
        }
        .login{
            padding:20px;
        }
    </style>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <div class="card bg-transparent">
                <div class ="card-header bg-transparent">
                    <h1 class="card-">
                        <i class="fa fa-user-secret"></i>
                        Admin Login
                    </h1>
                </div>
                <div class ="card-body">
                    <div class="login">
                        <div class="login-container">
                            <form method="POST">
                                <?php
                                    if(!empty($error)){
                                        echo <<<EOT
                                            <div class="alert alert-danger alert-dismissible">
                                                <p>$error</p>
                                                <button type="button" class="close" data-dismiss="alert" data-target="alert">&times;</button>
                                            </div>
                                        EOT;
                                    }
                                ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark w-50 mx-auto">Login</button>
                                 <div class="form-group text-right">
                                    <a href="../">Home Page</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/popper.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>