<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    $_GET['limit'] = 4;

    require_once ROOT_PATH . 'functions/get_settings.php';
    require_once ROOT_PATH . 'functions/get_articles.php';
    require_once ROOT_PATH . 'functions/get_services.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site['site_title'] ?></title>
    <meta name="description" content="<?php echo $site['site_title'] ?> ">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/font-awesome.min.css">
    <link rel="stylesheet" href="./public/css/portfolio.common.css">
</head>

<body>

    <div class='wrapper'>
        <?php include_once ROOT_PATH . 'includes/nav.php' ; ?>
        
        <div class="main-panel">
            <div class="main-header">
                <div class='main-header-left'>
                    <h1><?php echo $site['site_title'] ?></h1>
                    <p class="lead"><?php echo $site['site_tag_line'] ?></p>
                    <div class='action-btns'>
                        <button class='btn btn-dark action-btn btn-sm'>Samples</button>
                        <button class='btn action-btn btn-dark first'>Hire Me</button>
                    </div>
                </div>
                <div class="main-header-bottom">
                    <ul class="list-inline media-list">
                        <li class="list-inline-item">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:<?php echo $site['site_email'] ?>?Subject=LET'S%20TALK%20BUSINESS"><?php echo $site['site_email'] ?></a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-phone"></i>
                            <a href="tel:<?php echo $site['site_phone'] ?>"><?php echo $site['site_phone'] ?></a>
                        </li>
                    </ul>
                </div>
                <img src="./public/images/me.jpeg" alt="" class="rounded-circle">
            </div>
            <div class="main-content">
                <div class="main-content-left">
                    <img src="./public/images/me.jpeg" alt="" class="rounded-circle">
                    <h2>A Gist About Me</h2>
                    <div><?php echo $site['about_me_text'] ?></div>
                </div>
                <div class="main-content-right">
                    <h2>What I Do</h2>
                    <div class="cards what-i-do">
                        <div class='card card1'>
                            <i class="fa fa-desktop"></i>
                            <p>Web Design</p>
                        </div>
                        <div class='card card2'>
                            <i class="fa fa-code"></i>
                            <p>Web Development</p>
                        </div>
                        <div class='card card3'>
                            <i class="fa fa-desktop"></i>
                            <p>Android Development</p>
                        </div>
                        <div class='card card4'>
                            <i class="fa fa-desktop"></i>
                            <p>Desktop Applications</p>
                        </div>
                    </div>
                </div>
                <div class="space-body w-100"></div>
                <div class='main-content-bottom'>
                    <h2>My Prices</h2>
                    <p class="lead">Get it done, at the value of your money</p>
                    <div class="cards prices">
                    <?php
                        while($svc = mysqli_fetch_array($services,MYSQLI_ASSOC)){
                            echo <<<EOT
                            <div class="card price-card">
                                <div class="price-header">
                                    <h2 class="text-capitalize">{$svc['service_name']}</h2>
                                    <p >Ksh {$svc['price']} +</p>
                                </div>
                                <div class='description'>{$svc['description']}</div>
                            </div>
                            EOT;
                        }

                    ?>
                    </div>
                    <div class="hire-me">
                        <h2>Your are a click away!</h2>
                        <p class="text-light">Are you looking for website/blog?</p>
                        <button class="btn action-btn">Get it Here</button>
                    </div>
                    <div class="recent-articles">
                        <h2>Recent Articles</h2>
                        <div class="cards articles">
                        <?php
                            while($post = mysqli_fetch_array($articles,MYSQLI_ASSOC)){
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