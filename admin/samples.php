<?php
session_start();
if (!$_SESSION['logged_in']) {
    return header('Location:./');
}

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}
$page_id = 'Samples';

include_once ROOT_PATH . 'functions/delete-sample.php';
require_once ROOT_PATH . 'functions/get-samples.php';
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
                <button class="btn btn-ms btn-success">
                    <i class="fa fa-plus"></i>
                    New Sample
                </button>
                <button class="btn btn-ms btn-danger">
                    <i class="fa fa-trash"></i>
                    Delete
                </button>
            </div>
        </div>
        <div class="container-fluid py-2">
            <div class="card shadow-none">
                <div class="card-header">
                    <h2>List of Samples</h2>
                </div>
                <div class="card-body table-responsive-sm">
                    <?php
                    if (!empty($message)) {
                        echo <<<EOT
                            <div class="alert alert-info alert-dismissible">
                                <p>$message</p>
                                <button class="close" data-dismiss="alert" data-target="alert">&times;</button>
                            </div>
                        EOT;
                    }
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-dark text-light">
                                <th>
                                    <input class="select" type="checkbox" id="select-all">
                                </th>
                                <th>Title</th>
                                <th>Github URL</th>
                                <th>Modified</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($sample = mysqli_fetch_array($samples, MYSQLI_ASSOC)) {
                                echo <<<EOT
                                    <tr>
                                        <td>
                                            <input class="select" type="checkbox" data-target="samples"
                                            data-value="{$sample['sample_id']}">
                                        </td>
                                        <td> {$sample['title']}</td>
                                        <td> {$sample['github_url']}</td>
                                        <td>{$sample['updated_at']}</td>
                                        <td>
                                            <div class="btn-group action-list">
                                                <button class="btn btn-light text-info btn-sm" data-toggle="modal" data-target="#sample-{$sample['sample_id']}">
                                                    View
                                                </button>
                                                <div class="modal " id="sample-{$sample['sample_id']}">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"> 
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{$sample['title']}</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body text-left">
                                                                {$sample['content']}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn btn-light text-primary action-btn edit-btn" href="./add-sample.php?id={$sample['sample_id']}&action=edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-light text-danger btn-sm" href="?action=delete&sample_id={$sample['sample_id']}">
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
    </main>
</div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>