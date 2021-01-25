<?php
    session_start();
    
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
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
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/font-awesome.min.css">
    <link rel="stylesheet" href="./public/css/portfolio.common.css">
</head>

<body>
    <div class='wrapper'>
        <div class="main-nav">
            <nav class='navbar navbar-expand-md navbar-dark bg-dark'>
                <div class="nav-left navbar-brand float-left">
                    <a href="/" class='logo'>
                        SIRAh
                    </a>
                </div>
                <button className="navbar-toggler" type="button" data-toggle='collapse' data-target='#navbar-content'
                    aria-controls="navbar-content" aria-expanded="false" aria-label="Menu">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div class='collapse navbar-collapse' id='navbar-content'>
                    <ul class='nav-right ml-auto navbar-nav float-right'>
                        <li class='nav-item'>
                            <a href="/" class="nav-link">HOME</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/about_me.php" class="nav-link">ABOUT</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/samples.php" class="nav-link">SAMPLES</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/articles.php" class="nav-link">ARTICLES</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/contact_me.php" class="nav-link">CONTACT</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/login.php" class="nav-link active">LOGIN</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="main-panel login-panel" id="login-panel">
            <div class="main-content">
                <div class='main-content-bottom'>
                    <div class="login">
                        <h2>User Authentication Required</h2>
                        <div class="login-top">
                            <div class="btn-group">
                                <button class="btn btn-primary" id="login-toggle">Login</button>
                                <button class="btn btn-secondary" id="signup-toggle">Sign Up</button>
                            </div>
                        </div>
                        <div class="login-container">
                            <form method="POST">
                                <?php
                                    if(!empty($error)){
                                        echo <<<EOT
                                            <div class="alert alert-danger alert-dismissible">
                                                <p>$error</p>
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
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
                                <div class="form-group text-right">
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark w-50 mx-auto">Authenticate</button>
                            </form>
                        </div>
                        <div class="signup-container d-none">
                            <form action="#" method='POST'>
                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" name="full_name" id="full_name" class="form-control"
                                        placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email">
                                </div>
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
                                <button type="submit" class="btn btn-sm btn-dark w-50 mx-auto">Register</button>
                            </form>
                        </div>
                    </div>
                    <div class="hire-me">
                        <h2>Your are a click away!</h2>
                        <p class="text-light">Are you looking for website/blog?</p>
                        <button class="btn action-btn">Get it Here</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer">
            <h5>Follow Me</h5>
            <ul class="list-inline media">
                <li class="list-inline-item media-item">
                    <a href="#" class='fa fa-facebook'></a>
                </li>
                <li class="list-inline-item media-item">
                    <a href="#" class='fa fa-twitter'></a>
                </li>
                <li class="list-inline-item media-item">
                    <a href="#" class='fa fa-linkedin'></a>
                </li>
                <li class="list-inline-item media-item">
                    <a href="#" class='fa fa-github'></a>
                </li>
            </ul>
            <p class="lead">Copyright &copy; .All rights Reserved</p>
        </div>
    </div>
    <script src="./assets/jquery.min.js"></script>
    <script src="./assets/popper.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>