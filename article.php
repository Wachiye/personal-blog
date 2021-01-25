<?php
    
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    $_GET['limit'] = 4;
    require_once ROOT_PATH . 'functions/subscribe.php';
    require_once ROOT_PATH . 'functions/get_articles.php';
    if($article){
        $article = mysqli_fetch_array($article, MYSQLI_ASSOC);
    }
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
    <link rel="stylesheet" href="./public/css/portfolio.articles.css">
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
        
        <div class="main-panel" id="about-me-panel">
            <div class="main-header article-header" style="background: linear-gradient(rgb(0,0,0,0.7), rgb(0,0,0,0.7)), url('./public/images/web.jpeg');
    ; background-position: center;background-attachment: fixed; background-repeat:no-repeat; background-size:cover; min-height:250px;">
               <h2 style="text-center"><?php echo $article['title']; ?></h2>
               <p class="text-center"><?php echo $article['subtitle']; ?></p>
            </div>
            <div class="main-content">
                <div class="main-content-left">
                    <div class="article">
                        <h2 class="title text-left text-uppercase"><?php echo $article['title']; ?></h2>
                        <h3 class="subtitle"><?php echo $article['subtitle']; ?></h3>
                        <p class="lead excerpt"><?php echo $article['excerpt']; ?></p>
                        <hr class="bg-dark my-1">
                        <div class="content">
                        <?php echo $article['content']; ?>
                        </div>
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
                    <div class="recent-articles">
                        <h2>Other Recent Articles</h2>
                        <div class="cards articles">
                        <?php
                            while($post = mysqli_fetch_array($articles,MYSQLI_ASSOC)){
                                if($post['article_id'] != $article['article_id'])
                                    echo <<<EOT
                                    <a href="#" class="card article">
                                        <h3>{$post['title']}</h3>
                                    </a>
                                    EOT;
                            }
                        ?>
                        </div>
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