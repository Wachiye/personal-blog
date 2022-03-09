<?php

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}
$_GET['limit'] = 4;
require_once ROOT_PATH . 'functions/subscribe.php';
require_once ROOT_PATH . 'functions/get_articles.php';
if ($article) {
    $article = mysqli_fetch_array($article, MYSQLI_ASSOC);
}
?>

<?php include_once ROOT_PATH . 'includes/header.php' ?>

<link rel="stylesheet" href="./public/css/portfolio.articles.css">
<div class="main-panel" id="about-me-panel">
    <div class="main-header article-header" style="background: linear-gradient(rgb(0,0,0,0.7), rgb(0,0,0,0.7)), url('./public/images/web.jpeg');
    ; background-position: center;background-attachment: fixed; background-repeat:no-repeat; background-size:cover; min-height:250px;">
        <h2 style="text-center"><?php echo $article['title']; ?></h2>
        <p class="text-center"><?php echo $article['subtitle']; ?></p>
    </div>
    <div class="main-content">
        <div class="main-content-left">
        <?php require_once ROOT_PATH . 'includes/message.php' ?>
            <div class="article">
                <h2 class="title text-left text-uppercase"><?php echo $article['title']; ?></h2>
                <h3 class="subtitle"><?php echo $article['subtitle'] ?? '' ?></h3>
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
                    <?php include_once ROOT_PATH . 'includes/subscription-form.php' ?>
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
            <?php include_once ROOT_PATH . 'includes/hire-me.php' ?>
            <div class="recent-articles">
                <h2>Other Recent Articles</h2>
                <div class="cards articles">
                    <?php
                    while ($post = mysqli_fetch_array($articles, MYSQLI_ASSOC)) {
                        if ($post['article_id'] != $article['article_id']){
                            echo <<<EOT
                                <a href="?view={$post['slag']}" class="card article">
                                    <h3>{$post['title']}</h3>
                                </a>
                            EOT;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_PATH . 'includes/footer.php' ?>