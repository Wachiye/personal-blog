<?php
    session_start();
    if(!$_SESSION['logged_in']){
        return header('Location:./');
    }

    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    $page_id = 'Settings';
    
    include_once ROOT_PATH . 'functions/create-settings.php';
    include_once ROOT_PATH . 'functions/get-settings.php'; 

    include_once ROOT_PATH . 'includes/admin-header.php';
    include_once ROOT_PATH . 'includes/admin-nav.php';

?>

<div class="main">
    <main class="main-content">
        <div class="container-fluid ">
            <div class="card shadow-none">
                <div class="card-body">
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
                    <form method="POST" target="_self">
                        <div class="form-row">
                            <div class="col-md-6 mb-1">
                                <h5>Basic Details</h5>
                                <div class="form-group">
                                    <label for="site_title">Site Title</label>
                                    <input type="text" name="site_title" id="site_title" class="form-control"
                                        placeholder="Site Title"
                                        value="<?php echo $site['site_title'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="site_tag_line">Site Tag Line</label>
                                    <input type="text" name="site_tag_line" id="site_tag_line" class="form-control"
                                        placeholder="Site Tagline "
                                        value="<?php echo $site['site_tag_line'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Site Description</label>
                                    <textarea name="description" id="description" class="form-control" maxlength="140"><?php echo $site['description'] ?? '' ?></textarea>
                                    <span class="form-text text-info font-italic">Character limit:140</span>
                                </div>
                                <div class="form-group">
                                    <label for="site_email">Email</label>
                                    <input type="email" name="site_email" id="site_email" class="form-control"
                                        placeholder="Email"
                                        value="<?php echo $site['site_email'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="site_phone">Phone</label>
                                    <input type="tel" name="site_phone" id="site_phone" class="form-control"
                                        placeholder="Phone"
                                        value="<?php echo $site['site_phone'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="about_me_text">About Me</label>
                                    <textarea name="about_me_text" id="about_me_text" class="summernote form-control">
                                    <?php echo $site['about_me_text'] ?? '' ?></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-1">
                                <h5>Social Accounts</h5>
                                <div class="form-group">
                                    <label for="facebook_url">Facebook</label>
                                    <input type="url" name="facebook_url" id="facebook_url" class="form-control"
                                        placeholder="https://www.facebook.com/"
                                        value="<?php echo $site['facebook_url'] ?? 'https://www.facebook.com/' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="twitter_url">Twitter</label>
                                    <input type="url" name="twitter_url" id="twitter_url" class="form-control"
                                        placeholder="https://www.twitter.com/"
                                        value="<?php echo $site['twitter_url'] ?? 'https://www.twitter.com/' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="linkedin_url">Linkedin</label>
                                    <input type="url" name="linkedin_url" id="linkedin_url" class="form-control"
                                        placeholder="https://www.linkedin.com/"
                                        value="<?php echo $site['linkedin_url'] ?? 'https://www.linked.com/' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="github_url">GitHub</label>
                                    <input type="url" name="github_url" id="github_url" class="form-control"
                                        placeholder="https://www.github.com/"
                                        value="<?php echo $site['github_url'] ?? 'https://www.github.com/' ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-dark w-50 mx-auto">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>