<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    
    require_once ROOT_PATH . 'functions/create_message.php';
    
?>    
<?php include_once ROOT_PATH . 'includes/header.php' ?>
<link rel="stylesheet" href="./public/css/portfolio.contact_me.css">

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
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="10" class="form-control"
                    placeholder="Your Message ..."></textarea>
                </div>
                <button type="submit" class="btn btn-sm btn-dark">Send Message</button>
            </form>
        </div>
        <div class="main-content-right">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Got a project? Need help?</h4>
                    <p class="text">Please contact me directly via email/phone</p>
                </div>
            </div>
            <div class="contact-list">
                <div>
                    Email: <span><a href="mailto:<?php echo $site['site_email'] ?? ''?>?Subject=I%20Need%20Help">siranjofuw@gmail.com</a></span>
                </div>
                <div>
                    Phone: <span>+<?php echo $site['site_phone'] ?? ''?></span>
                </div>
                <div>
                    Address: <span>P.O Box 232, Kitale</span>
                </div>
                <div >
                    <div  class="card" id="map"></div>
                </div>
            </div>

        </div>
        <div class="space-body w-100"></div>
        <div class='main-content-bottom'>
            <?php include_once ROOT_PATH . 'includes/hire-me.php' ?>
        </div>
    </div>
</div>
<?php include_once ROOT_PATH . 'includes/footer.php' ?>