<?php
session_start();
if (!$_SESSION['logged_in']) {
    return header('Location:./');
}

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}
$page_id = 'Dashboard';


require_once ROOT_PATH . 'functions/dashboard-data.php';
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
                        <p><?php echo count($data["users"]) ?></p>
                        <?php echo $userType=='admin' ? '<a href="./users.php">View >></a>' : '' ; ?>
                    </div>
                </div>
                <div class="card update">
                    <div class="icon">
                        <i class="fa fa-group"></i>
                        <p>Subscribers</p>
                    </div>
                    <div class="text">
                        <p><?php  echo count($data['subscribers']) ?></p>
                    </div>
                </div>
                <div class="card update">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                        <p>Messages</p>
                    </div>
                    <div class="text">
                        <p><?php  echo count($data['unread_messages']) ?></p>
                        <a href="./messages.php">View >></a>
                    </div>
                </div>
                <div class="card update">
                    <div class="icon">
                        <i class="fa fa-files-o"></i>
                        <p>Articles</p>
                    </div>
                    <div class="text">
                        <p><?php  echo count($data['articles']) ?></p>
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
                    <!-- <canvas id="page-view-stats"></canvas> -->
                    <div class="page-views d-flex flex-row justify-content-between">
                        <?php
                            if( count($data['page_views']) > 0){
                                foreach ($data['page_views'] as $page) {
                                    echo <<<EOT
                                    <div class="bg-light" style="height:300px; width:30px;display:inline-flex; position:relative">
                                        <div class="text-capitalize px-2 bg-primary" style="width:30px; height:{$page['views']}%; position:absolute; left: 0; bottom:0; transform: rotate(180deg);">
                                            
                                        </div>
                                        {$page['page_name']} {$page['views']}%
                                    </div>
                                    EOT;
                                }
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            <div class="card stats-card">
                <div class="card-header">
                    <h2>Quick Statistics</h2>
                </div>
                <div class="card-body">
                    <div class="stat-list">
                        <div class="stat">Users<span><?php  echo count($data['users']) ?></span></div>
                        <div class="stat">Subscribers<span><?php  echo count($data['subscribers']) ?></span></div>
                        <div class="stat">All Articles<span><?php  echo count($data['articles']) ?></span></div>
                        <div class="stat">All Messages<span><?php  echo count($data['messages']) ?></span></div>
                        <div class="stat">Page Views<span>~<?php echo $total_views ?></span></div>
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
                            <div class="action">User Type</div>
                        </li>
                        <?php
                            if(count($data['recent_users']) > 0){
                                foreach($data['recent_users'] as $user){
                                    $name = $user['full_name'] ?? 'Anonymous';
                                    echo <<<EOT
                                    <li class="user list-item">
                                        <div class="number">{$user['user_id']}</div>
                                        <div class="name">{$name}</div>
                                        <div class="username">{$user['username']}</div>
                                        <div class="email">{$user['email']}</div>
                                        <div class="type">{$user['type']}</div>
                                    </li>
                                    EOT;
                                }
                            }
                        ?>
                        <li class="use list-item user-list-btn">
                            <a class="btn btn-light text-dark action-btn" href="./users.php">
                                <i class="fa fa-plus"></i>
                            </a>
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
                        <?php
                            if(count($data['recent_subscribers']) > 0){
                                foreach($data['recent_subcribers'] as $user){
                                    echo <<<EOT
                                    <li class="subscriber list-item">
                                        <div class="username">{$user['username']}</div>
                                        <div class="email">{$user['email']}</div>
                                    </li>
                                    EOT;
                                }
                            }
                        ?>
                         <li class="use list-item user-list-btn">
                            <a class="btn btn-light text-dark action-btn" href="./users.php">
                                <i class="fa fa-plus"></i>
                            </a>
                        </li>
                    </ul>

                </div>


            </div>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>