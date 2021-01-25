<?php
    
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    
    require_once ROOT_PATH . 'functions/subscribe.php';
    require_once ROOT_PATH . 'functions/get_samples.php';
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
    <link rel="stylesheet" href="./public/css/portfolio.samples.css">
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
                            <a href="/articles.php" class="nav-link active">ARTICLES</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/contact_me.php" class="nav-link">CONTACT</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/login.php" class="nav-link">LOGIN</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="main-panel samples-panel" id="samples-panel">
            <!-- <div class="main-header">
               <h1>Sample Personal Projects</h1>
               <p>My next move will always be the best</p>
            </div> -->
            <div class="main-content">
                <div class="main-content-top">
                    <h2>Sample Projects</h2>
                    <p>The Road to Performance Is Littered with Dirty Code Bombs</p>
                </div>
                <div class="main-content-left">
                    <div class="samples">
                        <?php
                            while($sample = mysqli_fetch_array($samples, MYSQLI_ASSOC)){
                                echo <<<EOT
                                    <div class="sample">
                                        <div class="image">
                                            <img class="img-thumbnail" src="./public/images/web.jpeg" alt="" />
                                        </div>
                                        <div class="details">
                                            <h3 class="title small">{$sample['title']}</h3>
                                            <a href="#" class="action-link">View Now</a>
                                        </div>
                                    </div>
                                EOT;
                            }
                        ?>
                        
                    </div>
                </div>
                <div class="main-content-right">
                    <div class="cards">
                        <div class="card subscribe-card">
                            <div class="top-center">Subscribe</div>
                            <form method="POST">
                                <p class="form-text">Subscribe to get latest articles and updates right ahead of others</p>
                                <?php
                                    if(!empty($subscribe_error)){
                                        echo <<<EOT
                                            <div class="alert alert-danger alert-dismissible">
                                                <p>$subscribe_error</p>
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        EOT;
                                    }
                                    if(!empty($subscribe_reply)){
                                        echo <<<EOT
                                            <div class="alert alert-info alert-dismissible">
                                                <p>$subscribe_reply</p>
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        EOT;
                                    }

                                ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" />
                                </div>
                                <button class="btn btn-sm btn-dark">Subscribe</button>
                            </form>
                        </div>
                        <!-- <div class="card project-card">
                            <h3>Do you have a project? Let's work together.</h3>
                            <p>Please fill <a href="#" class="action-link"> this </a> form and i will get back to you as soon as possible</p>
                        </div>
                        <div class="card blog-card">
                            <div class="top-center offer">Limited Offer!!</div>
                            <h3>Here is a free blog for you.</h3>
                            <p>Please hurry...</p>
                            <a href="#" class="action-link">Grab It</a>
                        </div> -->
                    </div>    
                </div>
                <div class="space-body w-100"></div>
                <div class='main-content-bottom'>
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