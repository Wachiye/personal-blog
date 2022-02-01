<?php
session_start();
if (!$_SESSION['logged_in']) {
    return header('Location:./');
}

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}
$page_id = 'Dashboard';


//require_once ROOT_PATH . 'functions/get_dashboard_data.php';
include ROOT_PATH . 'includes/admin-header.php';
include_once ROOT_PATH . 'includes/admin-nav.php';

?>

<div class="main">
    <main class="main-content">
        <div class="greetings">
            <h2 class="title">Hi, <?php echo $_SESSION['user']['full_name']; ?></h2>
            <P class="message">Welcome to your admin Dashboard</P>
        </div>
        <div class="updates">
            <h3>Updates </h3>
            <div class="update-cards">
                <div class="card update">
                    <div class="icon">
                        <i class="fa fa-users"></i>
                        <p>Users</p>
                    </div>
                    <div class="text">
                        <p>10</p>
                        <?php echo $userType=='admin' ? '<a href="./users.php">View >></a>' : '' ; ?>
                    </div>
                </div>
                <div class="card update">
                    <div class="icon">
                        <i class="fa fa-group"></i>
                        <p>Subscribers</p>
                    </div>
                    <div class="text">
                        <p>5</p>
                    </div>
                </div>
                <div class="card update">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                        <p>Messages</p>
                    </div>
                    <div class="text">
                        <p>12</p>
                        <a href="./messages.php">View >></a>
                    </div>
                </div>
                <div class="card update">
                    <div class="icon">
                        <i class="fa fa-files-o"></i>
                        <p>Articles</p>
                    </div>
                    <div class="text">
                        <p>3</p>
                        <a href="./articles.php">View >></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cards">
            <div class="card main-card">
                <div class="card-header">
                    <h2>Site Page-View Statistics</h2>
                    <div class="right">
                        <i class="fa fa-chart"></i>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="page-view-stats"></canvas>
                </div>
            </div>
            <div class="card stats-card">
                <div class="card-header">
                    <h2>Quick Statistics</h2>
                </div>
                <div class="card-body">
                    <div class="stat-list">
                        <div class="stat">Users<span>45</span></div>
                        <div class="stat">Subscribers<span>20</span></div>
                        <div class="stat">Articles<span>45</span></div>
                        <div class="stat">Messages<span>20</span></div>
                        <div class="stat">Your Articles<span>5</span></div>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-header">
                    <h2>Recently Added Users</h2>
                </div>
                <div class="card-body">
                    <ul class="user-list">
                        <li class="user list-item list-header">
                            <div class="number">#</div>
                            <div class="name">Full Name Here</div>
                            <div class="username">Username</div>
                            <div class="email">Email</div>
                            <div class="action">Actions</div>
                        </li>
                        <li class="user list-item">
                            <div class="number">1</div>
                            <div class="name">Wachiye XYZ</div>
                            <div class="username">wachiye1</div>
                            <div class="email">wachiye@example.com</div>
                            <div class="action">
                                <div class="action-list">
                                    <button class="btn btn-light text-primary action-btn">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-light text-danger action-btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li class="user list-item">
                            <div class="number">1</div>
                            <div class="name">Wachiye XYZ</div>
                            <div class="username">wachiye1</div>
                            <div class="email">wachiye@example.com</div>
                            <div class="action">
                                <div class="action-list">
                                    <button class="btn btn-light text-primary action-btn">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-light text-danger action-btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li class="use list-item user-list-btn">
                            <button class="btn btn-light text-dark action-btn">
                                <i class="fa fa-plus"></i>
                            </button>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="card subscribers">
                <div class="card-header">
                    <h2>New Subscribers</h2>
                </div>
                <div class="card-body">
                    <ul class="subscribers-list">
                        <li class="list-header list-item">
                            <div class="username">Username</div>
                            <div class="email">Email</div>
                        </li>
                        <li class="subscriber list-item">
                            <div class="username">Wachiye</div>
                            <div class="email">siranjofuw@gmail.com</div>
                        </li>
                        <li class="subscriber list-item">
                            <div class="username">Wachiye</div>
                            <div class="email">siranjofuw@gmail.com</div>
                        </li>
                        <li class="subscriber list-item">
                            <div class="username">Wachiye</div>
                            <div class="email">siranjofuw@gmail.com</div>
                        </li>
                        <li class="subscriber list-item">
                            <div class="username">Wachiye</div>
                            <div class="email">siranjofuw@gmail.com</div>
                        </li>
                        <li class="subscriber list-item">
                            <button class="btn btn-light text-dark action-btn">
                                <i class="fa fa-plus"></i>
                            </button>
                        </li>
                    </ul>

                </div>


            </div>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>