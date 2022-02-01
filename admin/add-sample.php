<?php
session_start();

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}

if (!$_SESSION['logged_in']) {
    return header('Location:./');
}

if (isset($_SESSION['user'])) {
    $userType = $_SESSION['user']['type'];
    if ($userType != 'admin' && $userType != 'author') {
        return header('Location:./dashboard.php');
    }
}
$page_id = 'Add Sample';

$sample = null;

if(isset($_GET['id']) && isset($_GET['action'])){
    require_once ROOT_PATH . 'functions/get-samples.php';
    $sample = mysqli_fetch_array ($samples, MYSQLI_ASSOC);
}

include_once ROOT_PATH . 'functions/create-sample.php';

include_once ROOT_PATH . 'includes/admin-header.php';
include_once ROOT_PATH . 'includes/admin-nav.php';

?>

<div class="main">
    <main class="main-content">
        <div class="top-card">
            <form action="#">
                <div class="input-group">
                    <input class="form-control form-control-sm" type="search" name="search" id="search" placeholder="keyword search">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-dark text-light" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>

            </form>
            <div class="btn-group">
                <button type="submit" class="btn btn-ms btn-primary">
                    <i class="fa fa-cloud-upload"></i>
                    Publish
                </button>
                <a class="btn btn-ms btn-info mx-2" href="./samples.php">
                    <i class="fa fa-eye"></i>
                    View Samples
                </a>
            </div>
        </div>
        <form target="_self" method="POST">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Add New Sample</h2>
                </div>
                <div class="card-body">
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
                                <input type="hidden" name="sample" value="{$sample['sample_id']}" /> 
                            EOT;
                        }
                    ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" 
                        placeholder="Title of your sample"
                        value="<?php echo $sample['title'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="content">Article Content</label>
                        <textarea name="content" id="summernote" class="form-control" placeholder="HTML Content of your sample" rows="15">
                        <?php echo $sample['content'] ?? '' ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="github_url">Github URL</label>
                        <input type="text" name="github_url" id="github_url" class="form-control" 
                        placeholder="Github Repository URL"
                        value="<?php echo $sample['github_url'] ?? '' ?>">
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-ms btn-primary">
                            <i class="fa fa-cloud-upload"></i>
                            Publish
                        </button>
                        <a class="btn btn-ms btn-info mx-2" href="./samples.php">
                            <i class="fa fa-eye"></i>
                            View Samples
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </main>
</div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>