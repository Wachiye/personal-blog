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
               <h1>Dashboard::Settings</h1>
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
                <li class="menu-item">
                    <i class="fa fa-file-code-o"></i>
                    <a href="./samples.php" class="menu-link">Samples</a>
                </li>
                <li class="menu-item active-link">
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
                <div class="cards profile">
                    <div class="card summary">
                        <div class="image">
                            <img src="../public/images/background.jpeg" alt="" class="w-100 img-fluid">
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
                            <h3 class="card-title site-title">Wachiye Siranjofu</h3>
                            <h5 class="card-subtitle site-tag">@wachiye</h5>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-envelope"></i>
                                    wachiye@example.com
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-phone"></i>
                                    254790983123
                                </li>
                            </ul>
                            <hr>
                            <form action="#">
                                <div class="form-group">
                                    <textarea name="description" id="description" class="form-control"
                                        placeholder="Briefly describe your site" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-sm btn-secondary">Change Description</button>
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Site Service</button> -->
                            </form>
                        </div>
                    </div>
                    <div class="card edit-profile">
                        <div class="card-header">
                            <h2>Edit Site Details</h2>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="form-group">
                                    <label for="title">Site Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Site Title">
                                </div>
                                <div class="form-group">
                                    <label for="tag">Site Tag Line</label>
                                    <input type="text" name="tag" id="tag" class="form-control"
                                        placeholder="Site Tag">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" class="form-control"
                                        placeholder="Phone">
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark w-50 mx-auto">Save Changes</button>
                            </form>
                        </div>
                    </div>
                    <div class="card change-password">
                        <div class="card-header">
                            <h2>Change Password</h2>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control"
                                        placeholder="Current Password">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control"
                                        placeholder="New Password" >
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                        placeholder="Confirm Password">
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark mx-auto">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>