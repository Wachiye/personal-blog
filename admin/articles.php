<?php
    session_start();
    
    if(!$_SESSION['logged_in']){
        return header('Location:./');
    }

    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    $page_id = 'Articles';

    include_once ROOT_PATH . 'functions/delete-article.php';

    require_once ROOT_PATH . 'functions/get-articles.php';
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
                        <button class="btn btn-ms btn-success">
                            <i class="fa fa-plus"></i>
                            New Article
                        </button>
                        <button class="btn btn-ms btn-danger">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                    </div>
                </div>
                    <div class="cards articles">
                    
                        <div class="card">
                            <div class="card-header">
                                <h2>List of Articles</h2>
                            </div>
                            <div class="card-body table-responsive-sm">
                                <?php
                                    if(!empty($message)){
                                        echo <<<EOT
                                            <div class="alert alert-info alert-dismissible">
                                                <p>$message</p>
                                                <button class="close" data-dismiss="alert" data-target="alert">&times;</button>
                                            </div>
                                        EOT;
                                    }
                                ?>
                                <table class="table">
                                    <thead>
                                        <tr class="bg-dark text-light">
                                            <th>
                                                <input class="select" type="checkbox" id="select-all">
                                            </th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Stats</th>
                                            <th>Modified</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        while ($article = mysqli_fetch_array($articles, MYSQLI_ASSOC)) {
                                            echo <<<EOT
                                                <tr>
                                                    <td>
                                                        <input class="select" type="checkbox" data-target="articles"
                                                        data-value="{$article['article_id']}">
                                                    </td>
                                                    <td> {$article['title'] }</td>
                                                    <th> {$article['full_name'] }</th>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <i class="fa fa-eye"></i>
                                                                 {$article['views'] }
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <i class="fa fa-comments-o"></i>
                                                                 {$article['comments'] }
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <i class="fa fa-thumbs-up"></i>
                                                                 {$article['likes'] }
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>{$article['updated_at'] }</td>
                                                    <td>
                                                        <div class="btn-group action-list">
                                                            <a class="btn btn-light text-primary action-btn edit-btn" href="./add-article.php?id={$article['article_id']}&action=edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-light text-danger btn-sm" href="?action=delete&article_id={$article['article_id']}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>'
                                            EOT;
                                        }
                                    ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>