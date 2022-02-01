<?php
    
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    
    require_once ROOT_PATH . 'functions/subscribe.php';
    require_once ROOT_PATH . 'functions/get_samples.php';
?>
<?php include_once ROOT_PATH . 'includes/header.php' ?>
<link rel="stylesheet" href="./public/css/portfolio.samples.css">   

<div class="main-panel samples-panel" id="samples-panel">
    <!-- <div class="main-header">
        <h1>Sample Personal Projects</h1>
        <p>My next move will always be the best</p>
    </div> -->
    <div class="main-content">
        <div class="main-content-top">
            <h2>Sample Projects</h2>
            <p class="lead">The Road to Performance Is Littered with Dirty Code Bombs</p>
        </div>
        <div class="main-content-left">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                 <?php
                                    while($sample = mysqli_fetch_array($samples, MYSQLI_ASSOC)){
                                        echo <<<EOT
                                            <li class="list-group-item text-left">
                                                <h5>{$sample['title']}</h5>
                                                <p class="card-text text-left">{$sample['content']}</p>
                                                <a class="card-link" href="{$sample['github_url']}" target="_blank">
                                                    <i class="fa fa-github-square"> View on Github</i>
                                                </a>
                                            </li>
                                        EOT;
                                    }
                                 ?>
                            </ul>
                        </div>
                    </div>
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
            <?php include_once ROOT_PATH . 'includes/hire-me.php' ?>
        </div>
    </div>
</div>
       
<?php include_once ROOT_PATH . 'includes/footer.php' ?>