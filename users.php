<?php
    session_start();
    if(!$_SESSION['logged_in']){
        return header('Location:login.php');
    }
    
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    $page_id = 'Users';
    
    require_once ROOT_PATH . 'functions/get_users.php';
    include_once ROOT_PATH . 'includes/admin_header.php';
    include_once ROOT_PATH . 'includes/admin_nav.php';
    
?>

        <div class="main">
            <main class="main-content">
                <div class="top-card">
                    <form action="#">
                        <div class="input-group">
                           <input class="form-control form-control-sm" type="search" name="search" id="search" placeholder="name/username/email">
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
                            New User
                        </button>
                        <button class="btn btn-ms btn-primary">
                            <i class="fa fa-envelope"></i>
                            Message
                        </button>
                        <button class="btn btn-ms btn-danger">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                    </div>
                </div>
                    <div class="cards users">
                    
                        <div class="card">
                            <div class="card-header">
                                <h2>List of Users : <?php echo @mysqli_num_rows($users); ?></h2> 
                            </div>
                            <div class="card-body table-responsive-sm">
                                <table class="table">
                                    <thead>
                                        <tr class="bg-dark text-light">
                                            <th>
                                                <input type='checkbox' id='select-all' data-select='user' />
                                            </th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        while ($user = mysqli_fetch_array($users, MYSQLI_ASSOC)) {
                                            echo '<tr>
                                                    <td>
                                                    <input type="checkbox" id="select-all" data-select="user" 
                                                    class="user" data-value=' . $user['user_id'] . '/>
                                                    <td>' . $user['full_name'] . '</td>
                                                    <td> @'. $user['username'] . '</td>
                                                    <td>' . $user['email'] . '</td>
                                                    <td>' . $user['created_at'] . '</td>
                                                    <td>' . $user['type'] . '</td>
                                                    <td>
                                                        <div class="btn-group action-list">
                                                            <button class="btn btn-light text-primary action-btn edit-btn"
                                                            data-target="users" data-value="'. $user['user_id'] . '">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-light text-danger action-btn delete-btn"
                                                            data-target="users" data-value="'. $user['user_id'] . '">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>' ;
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
    </div>
</body>
</html>