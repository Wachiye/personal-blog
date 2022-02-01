<?php
    $user = $userType = null;

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $userType = $user['type'];
    }

?>

<aside class="sidenav">
    <div class="sidenav-header">
        <h4>Portfolio 
            <span class="text-capitalize">(<?php echo $userType ?>)</span></h4>
        <i class="fa fa-times nav-icon"></i>
    </div>
    <ul class="sidenav-menu">
     
        <li class="menu-item"> 
            <i class="fa fa-tachometer"></i>
            <a href="./dashboard.php" class="menu-link">Dashboard</a>
        </li>
        <h5>Articles</h5>
        <li class="menu-item group">
            <i class="fa fa-plus"></i>
            <a href="./add-article.php" class="menu-link">Write Article</a>
        </li>
        <li class="menu-item group">
            <i class="fa fa-files-o"></i>
            <a href="./articles.php" class="menu-link"> Articles List</a>
        </li>
        <li class="menu-item">
            <i class="fa fa-envelope"></i>
            <a href="./messages.php" class="menu-link">Messages</a>
        </li>
        <?php 
            if($userType == 'admin'){
                echo <<<EOT
                    <h5>Samples</h5>
                    <li class="menu-item group ">
                        <i class="fa fa-plus"></i>
                        <a href="./add-sample.php" class="menu-link">Add Sample</a>
                    </li>
                    <li class="menu-item group">
                        <i class="fa fa-file-code-o"></i>
                        <a href="./samples.php" class="menu-link">Sample List</a>
                    </li>
                    <h5>Users</h5>
                    <li class="menu-item group ">
                        <i class="fa fa-plus"></i>
                        <a href="./add-user.php" class="menu-link">Add User</a>
                    </li>
                    <li class="menu-item group users">
                        <i class="fa fa-users"></i>
                        <a href="./users.php" class="menu-link">User List</a>
                    </li>
                    <li class="menu-item">
                        <i class="fa fa-cog"></i>
                        <a href="./settings.php" class="menu-link">Settings</a>
                    </li>
                EOT;
            }
        ?>
        
        <li class="menu-item">
            <i class="fa fa-user"></i>
            <a href="./profile.php" class="menu-link">Profile</a>
        </li>
        <li class="menu-item">
            <i class="fa fa-sign-out"></i>
            <a href="./logout.php" class="menu-link">Log Out</a>
        </li>
    </ul>
</aside>