<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    
    require_once ROOT_PATH . 'functions/create_message.php';
    
?>    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/font-awesome.min.css">
    <link rel="stylesheet" href="./public/css/portfolio.common.css">
    <link rel="stylesheet" href="./public/css/portfolio.contact_me.css">
</head>

<body>
    <div class='wrapper'>
        <div class="main-nav">
            <nav class='navbar navbar-expand-md navbar-dark bg-dark'>
                <div class="nav-left navbar-brand float-left">
                    <a href="/" class='logo'>
                        SIRAh
                    </a>
                </div>
                <button className="navbar-toggler" type="button" data-toggle='collapse' data-target='#navbar-content'
                    aria-controls="navbar-content" aria-expanded="false" aria-label="Menu">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div class='collapse navbar-collapse' id='navbar-content'>
                    <ul class='nav-right ml-auto navbar-nav float-right'>
                        <li class='nav-item'>
                            <a href="/" class="nav-link">HOME</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/about_me.php" class="nav-link">ABOUT</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/samples.php" class="nav-link">SAMPLES</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/articles.php" class="nav-link">ARTICLES</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/contact_me.php" class="nav-link active">CONTACT</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/login.php" class="nav-link">LOGIN</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="main-panel samples-panel" id="samples-panel">
            <div class="main-header">
               <h1>Contact Me</h1>
               <p>Please feel free to contact me within any working hours</p>
            </div>
            <div class="main-content">
                <div class="main-content-top">
                    <h2>Let's Get In Touch</h2>
                </div>
                <div class="main-content-left">
                    <form method="POST" target="_self">
                        <p class="form-text text-left">Please fill this form and I will get back to you as soon as possible</p>
                        <?php
                            if(!empty($message_error)){
                                echo <<<EOT
                                    <div class="alert alert-danger alert-dismissible">
                                        <p>$message_error</p>
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                EOT;
                            }
                            if(!empty($message_reply)){
                                echo <<<EOT
                                    <div class="alert alert-info alert-dismissible">
                                        <p>$message_reply</p>
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                EOT;
                            }

                        ?>
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" name="full_name" id="full_name" class="form-control"
                                placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" name="phone_number" id="phone_number" class="form-control"
                                placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control"
                                placeholder="Subject for contact">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="10" class="form-control"
                            placeholder="Your Message ..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-dark">Send Message</button>
                    </form>
                </div>
                <div class="main-content-right">
                    <div class="contact-list">
                        <div>
                            Email: <span>siranjofuw@gmail.com</span>
                        </div>
                        <div>
                            Phone: <span>+254790983123</span>
                        </div>
                        <div>
                            Address: <span>P.O Box 232, Kitale</span>
                        </div>
                        <div >
                            <div  class="card" id="map"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Got a project? Need help?</h4>
                            <p class="text">Please contact me directly via email/phone</p>
                        </div>
                    </div>    
                </div>
                <div class="space-body w-100"></div>
                <div class='main-content-bottom'>
                    <div class="hire-me">
                        <h2>Your are a click away!</h2>
                        <p class="text-light">Are you looking for website/blog?</p>
                        <button class="btn action-btn">Get it Here</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer">
            <h5>Follow Me</h5>
            <ul class="list-inline media">
                <li class="list-inline-item media-item">
                    <a href="#" class='fa fa-facebook'></a>
                </li>
                <li class="list-inline-item media-item">
                    <a href="#" class='fa fa-twitter'></a>
                </li>
                <li class="list-inline-item media-item">
                    <a href="#" class='fa fa-linkedin'></a>
                </li>
                <li class="list-inline-item media-item">
                    <a href="#" class='fa fa-github'></a>
                </li>
            </ul>
            <p class="lead">Copyright &copy; .All rights Reserved</p>
        </div>
    </div>
    <script src="./assets/jquery.min.js"></script>
    <script src="./assets/popper.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>