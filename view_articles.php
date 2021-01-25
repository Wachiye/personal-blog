<?php
    session_start();
    
    if(!$_SESSION['logged_in']){
        return header('Location:login.php');
    }

    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    $page_id = 'Articles';
    require_once ROOT_PATH . 'functions/get_articles.php';
    include_once ROOT_PATH . 'includes/admin_header.php';
    include_once ROOT_PATH . 'includes/admin_nav.php';
    
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
                                            echo '
                                        <tr>
                                            <td>
                                                <input class="select" type="checkbox" data-target="articles"
                                                data-value="' . $article['article_id'] . '">
                                            </td>
                                            <td>' . $article['title'] . '</td>
                                            <th>' . $article['full_name'] . '</th>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-eye"></i>
                                                        ' . (int) $article['views'] .'
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-comments-o"></i>
                                                        ' . (int) $article['comments'] .'
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                        ' . (int) $article['likes'] .'
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>' . $article['updated_at'] . '</td>
                                            <td>
                                                <div class="btn-group action-list">
                                                    <button class="btn btn-light text-primary action-btn edit-btn"
                                                    data-target="articles" data-value="'. $article['article_id'] . '">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-light text-danger action-btn delete-btn"
                                                    data-target="users" data-value="'. $article['article_id'] . '">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>'
                                        ;}
                                    ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>