<?php

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}
$_GET['limit'] = 4;
require_once ROOT_PATH . 'functions/subscribe.php';
require_once ROOT_PATH . 'functions/get_samples.php';

if ($sample) {
    $sample = mysqli_fetch_array($sample, MYSQLI_ASSOC);
}
?>

<?php include_once ROOT_PATH . 'includes/header.php' ?>
<div class="main-panel" id="about-me-panel">
    <div class="main-header sample-header" style="background: linear-gradient(rgb(0,0,0,0.7), rgb(0,0,0,0.7)), url('./public/images/web.jpeg');
    ; background-position: center;background-attachment: fixed; background-repeat:no-repeat; background-size:cover; min-height:250px;">
        <h2 style="text-center"><?php echo $sample['title']; ?></h2>
    </div>
    <div class="main-content d-flex flex-column">
        <div class="container-fluid mb-2">
        <?php require_once ROOT_PATH . 'includes/message.php' ?>
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <h2 class="text-left text-uppercase"><?php echo $sample['title']; ?></h2>
                    <div class="content mb-2">
                        <?php echo $sample['content']; ?>
                    </div>
                    <a class="action-btn p-2 " href="<?php echo $sample['github_url'] ?>" target="_blank">
                        <i class="text-primary fa fa-github-square">View on Github</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="space-body w-100"></div>
        <div class='main-content-bottom'>
            <?php include_once ROOT_PATH . 'includes/hire-me.php' ?>
        </div>
    </div>
</div>
<?php include_once ROOT_PATH . 'includes/footer.php' ?>