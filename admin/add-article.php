<?php
    session_start();

    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    if(!$_SESSION['logged_in']){
        return header('Location:./');
    }

    if (isset($_SESSION['user'])){
        $userType = $_SESSION['user']['type'];
        if($userType != 'admin' && $userType != 'author'){
            return header('Location:./dashboard.php');
        } 
    }
    $page_id = 'Add Article';

    $article = null;

    if(isset($_GET['id']) && isset($_GET['action'])){
        require_once ROOT_PATH . 'functions/get-articles.php';
        $article = mysqli_fetch_array ($articles, MYSQLI_ASSOC);
    }

    include_once ROOT_PATH . 'functions/create-article.php';
    include_once ROOT_PATH . 'includes/admin-header.php';
    include_once ROOT_PATH . 'includes/admin-nav.php';

?>

<div class="main">
    <main class="main-content">
        <div class="top-card">
            <form action="#">
                <div class="input-group">
                   <input class="form-control form-control-sm" type="search" name="search" id="search"
                   placeholder="keyword search">
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
                <button type="button" class="btn btn-ms btn-info">
                    <i class="fa fa-eye"></i>
                    View Articles
                </button>
            </div>
        </div>
        <form class="cards add-article" target="_self" method="POST">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Add New Article</h2>
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
                                <input type="hidden" name="article" value="{$article['article_id']}" /> 
                            EOT;
                        }
                    ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="Title of your article"
                            value="<?php echo $article['title'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control"
                            placeholder="Subtitle"
                            value="<?php echo $article['subtitle'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="content">Article Content</label>
                        <textarea name="content" id="summernote" class="form-control"
                            placeholder="HTML Content of your article" rows="15">
                        <?php echo $article['content'] ?? '' ?>
                    </textarea>
                    </div>
                </div>
            </div>
            <div class="card article-setting">

                <div class="card-header text-center">
                    <div>
                        <h2>Article Settings</h2>
                    </div>
                </div>
                <div class="card-body">
                <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" value="<?php echo $article['category'] ?? 'uncategorized' ?>">
                            <option value="uncategorized">Uncategorized</option>
                            <option value="computer_skills">Computer Skills</option>
                            <option value="programming">Programming</option>
                            <option value="life_skills">Life Skills</option>
                            <option value="tutorial">Tutorial</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" name="tags" id="tags" class="form-control"
                            placeholder="Tags" 
                            value="<?php echo $article['tags'] ?? '' ?>">
                        <p class="form-text text-muted">Separate tags with a comma (<strong>,</strong>)</p>
                    </div>
                    <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" class="summernote form-control">
                        <?php echo $article['excerpt'] ?? '' ?></textarea>
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-ms btn-primary">
                            <i class="fa fa-cloud-upload"></i>
                            Publish
                        </button>
                        <a href="./articles.php" class="btn btn-ms btn-info mx-2">
                            <i class="fa fa-eye"></i>
                            View Articles
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </main>
</div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>