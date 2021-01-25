<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/portfolio.admin.css">

    <link rel="shortcut icon" href="../public/favicon.ico" type="image/x-icon">
    <title>Portfolio::Dashboard</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="nav-icon">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <div class="header-left">
               <h1>Dashboard::Samples</h1>
            </div>
            <div class="header-right">
                <a href="./profile.php">
                    <img src="../public/favicon.ico" alt="" class="img-circle" width="40px" height="40px">
                </a>
            </div>
        </div>
        <aside class="sidenav">
            <div class="sidenav-header">
                <div class="sidenav-img">
                    <img src="../public/favicon.ico" alt="">
                    <h1>SIRAH</h1>
                </div>
                <i class="fa fa-times nav-icon"></i>
            </div>
            <ul class="sidenav-menu">
                <li class="menu-item">
                    <i class="fa fa-tachometer"></i>
                    <a href="./dashboard.php" class="menu-link">Dashboard</a>
                </li>
                <h2>Users</h2>
                <li class="menu-item group">
                    <i class="fa fa-plus"></i>
                    <a href="./add_user.php" class="menu-link">Add User</a>
                </li>
                <li class="menu-item group">
                    <i class="fa fa-users"></i>
                    <a href="./users.php" class="menu-link">Users</a>
                </li>
                <li class="menu-item">
                    <i class="fa fa-envelope"></i>
                    <a href="./messages.php" class="menu-link">Messages</a>
                </li>
                <h2>Articles</h2>
                <li class="menu-item group">
                    <i class="fa fa-plus"></i>
                    <a href="./add_article.php" class="menu-link">Write Article</a>
                </li>
                <li class="menu-item group">
                    <i class="fa fa-files-o"></i>
                    <a href="./articles.php" class="menu-link">View Articles</a>
                </li>
                <li class="menu-item active-link">
                    <i class="fa fa-file-code-o"></i>
                    <a href="./samples.php" class="menu-link">Samples</a>
                </li>
                <li class="menu-item">
                    <i class="fa fa-cog"></i>
                    <a href="./settings.php" class="menu-link">Settings</a>
                </li>
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
                            New Sample
                        </button>
                        <button class="btn btn-ms btn-danger">
                            <i class="fa fa-trash"></i>
                            Delete
                        </button>
                    </div>
                </div>
                <div class="cards samples">
                    <div class="card sample">
                        
                        <div class="card-header text-center">
                            <img src="../public/favicon.ico" alt="" class="img-fluid w-100">
                            <div class="right">
                                <input type="checkbox" class="select">
                                <a href="#" class="btn btn-primary my-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Title of Sample Project HERE</h4>
                        </div>
                    </div>
                    <div class="card sample">
                        
                        <div class="card-header text-center">
                            <img src="../public/favicon.ico" alt="" class="img-fluid w-100">
                            <div class="right">
                                <input type="checkbox" class="select">
                                <a href="#" class="btn btn-primary my-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Title of Sample Project HERE</h4>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>