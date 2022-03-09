<?php
session_start();
if (!$_SESSION['logged_in']) {
    return header('Location:./');
}

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}
$page_id = 'Hire Me';

include_once ROOT_PATH . 'functions/delete-hire-me.php';
require_once ROOT_PATH . 'functions/get-hire-me.php';
include_once ROOT_PATH . 'includes/admin-header.php';
include_once ROOT_PATH . 'includes/admin-nav.php';

?>

<div class="main">
    <main class="main-content">
        
        <div class="container-fluid py-2">
            <div class="card shadow-none">
                <div class="card-header">
                    <h2>Hire Me Requests</h2>
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
                                <th>Client Name</th>
                                <th>Client Email</th>
                                <th>Project Type</th>
                                <th>Budget (Ksh)</th>
                                <th>Request Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($hire = mysqli_fetch_array($hire_me, MYSQLI_ASSOC)) {
                                echo <<<EOT
                                    <tr>
                                        <td>
                                            <input class="select" type="checkbox" data-target="hire_me"
                                            data-value="{$hire['hire_id']}">
                                        </td>
                                        <td> {$hire['from_name']}</td>
                                        <td> {$hire['from_email']}</td>
                                        <td> {$hire['project']}</td>
                                        <td> {$hire['budget']}</td>
                                        <td>{$hire['created_at']}</td>
                                        <td>
                                            <div class="btn-group action-list">
                                                <button class="btn btn-light text-info btn-sm" data-toggle="modal" data-target="#hire-me-{$hire['hire_id']}">
                                                    View
                                                </button>
                                                <div class="modal " id="hire-me-{$hire['hire_id']}">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"> 
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{$hire['from_name']} ({$hire['project']})</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body text-left">
                                                                {$hire['description']}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn btn-light text-primary btn-sm" href="../uploads/{$hire['attachment']}" download>
                                                    <i class="fa fa-file"></i>
                                                </a>
                                                <a class="btn btn-light text-danger btn-sm" href="?action=delete&hire_id={$hire['hire_id']}&attachment={$hire['attachment']}">
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