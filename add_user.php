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
               <h1>Dashboard::Users</h1>
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
                <li class="menu-item group active-link">
                    <i class="fa fa-plus"></i>
                    <a href="./add_article.php" class="menu-link">Write Article</a>
                </li>
                <li class="menu-item group">
                    <i class="fa fa-files-o"></i>
                    <a href="./articles.php" class="menu-link">View Articles</a>
                </li>
                <li class="menu-item">
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
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-dark text-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-trash"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <form class="cards add-article">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Add New Users</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" name="full_name" id="full_name" class="form-control"
                                    placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                    placeholder="Confirm Password ">
                            </div>
                        </div>
                    </div>
                    <div class="card article-setting">
                        
                        <div class="card-header text-center">
                            <div>
                                <h2>Other Details</h2>
                                <img src="../public/favicon.ico" id="img-preview" alt="" class="img-fluid w-100">
                            </div>
                            <div class="right">
                                <input type="file" class="d-none" name="image" id="image">
                                <a href="#" class="btn btn-primary my-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" default="user">
                                    <option value="user">User</option>
                                    <option value="subscriber">Subscriber</option>
                                    <option value="author">Author</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" name="phone" id="phone" class="form-control"
                                    placeholder="Phone">
                                <p class="form-text text-muted">Format: <strong>2547XXXXXXXX</strong></p>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-ms btn-secondary">
                                    <i class="fa fa-save"></i>
                                    Save User
                                </button>
                                <button type="button" class="btn btn-ms btn-info">
                                    <i class="fa fa-eye"></i>
                                    View Users
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>
</html>