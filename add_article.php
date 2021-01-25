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
               <h1>Dashboard::Articles</h1>
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
                <li class="menu-item group action-link">
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
                        <button type="submit" class="btn btn-ms btn-primary">
                            <i class="fa fa-cloud-upload"></i>
                            Publish
                        </button>
                        <button type="button" class="btn btn-ms btn-secondary">
                            <i class="fa fa-save"></i>
                            As Draft
                        </button>
                        <button type="button" class="btn btn-ms btn-info">
                            <i class="fa fa-eye"></i>
                            View Articles
                        </button>
                    </div>
                </div>
                <form class="cards add-article">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Add New Article</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Title of your article">
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" name="subtitle" id="subtitle" class="form-control"
                                    placeholder="Subtitle">
                            </div>
                            <div class="form-group">
                                <label for="content">Article Content</label>
                                <textarea name="content" id="content" class="form-control"
                                    placeholder="HTML Content of your article" rows="15"></textarea>
                            </div>
                            <button type="button" class="btn btn-sm btn-dark w-50 mx-auto">Preview</button>
                        </div>
                    </div>
                    <div class="card article-setting">
                        
                        <div class="card-header text-center">
                            <div>
                                <h2>Article Settings</h2>
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
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="uncategorized">Uncategorized</option>
                                    <option value="computer_skills">Computer Skills</option>
                                    <option value="programming">Programming</option>
                                    <option value="life_skills">Life Skills</option>
                                    <option value="tutorial">Tutorial</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <input type="text" name="tags[]" id="tags" class="form-control"
                                    placeholder="Tags">
                                <p class="form-text text-muted">Separate tags with a comma (<strong>,</strong>)</p>
                            </div>
                            <div class="form-group">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" class="form-control"
                                    placeholder="Excerpt of your article" rows="7"></textarea>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-ms btn-primary">
                                    <i class="fa fa-cloud-upload"></i>
                                    Publish
                                </button>
                                <button type="button" class="btn btn-ms btn-secondary">
                                    <i class="fa fa-save"></i>
                                    As Draft
                                </button>
                                <button type="button" class="btn btn-ms btn-info">
                                    <i class="fa fa-eye"></i>
                                    View Articles
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