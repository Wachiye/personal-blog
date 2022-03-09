<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    $_GET['limit'] = 4;
    require_once ROOT_PATH . 'functions/get_articles.php';
    require_once ROOT_PATH . 'functions/get_services.php';
?>
<?php include_once ROOT_PATH . 'includes/header.php' ; ?>
        
<div class="main-panel">
    <div class="main-header">
        <div class='main-header-left'>
            <h1><?php echo $site['site_title'] ?></h1>
            <p class="lead"><?php echo $site['site_tag_line'] ?></p>
            <div class='action-btns'>
                <a class='btn btn-dark action-btn btn-sm' href="./samples.php">Samples</a>
                <a class='btn btn-dark action-btn first btn-sm' href="./hire-me.php">Hire Me</a>
            </div>
        </div>
        <div class="main-header-bottom">
        <?php require_once ROOT_PATH . 'includes/message.php' ?>
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
    <div class="main-content grid">
        <div class="main-content-left">
            <img src="./public/images/me.jpeg" alt="" class="rounded-circle">
            <h2>A Gist About Me</h2>
            <div><?php echo $site['about_me_text'] ?></div>
        </div>
        <div class="main-content-right container">
            <h2>What I Do</h2>
            <div class="cards what-i-do ">
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
                    <div class="card shadow-none price-card">
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
            <?php include_once ROOT_PATH . 'includes/hire-me.php' ?>
            <div class="recent-articles">
                <h2>Recent Articles</h2>
                <div class="cards articles">
                <?php
                    while($article = mysqli_fetch_array($articles,MYSQLI_ASSOC)){
                        echo <<<EOT
                        <a href="./article.php?view={$article['article_id']}" class="card article">
                            <h3>{$article['title']}</h3>
                        </a>
                        EOT;
                    }

                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_PATH . 'includes/footer.php' ; ?>
        