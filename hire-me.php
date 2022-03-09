<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    
    require_once ROOT_PATH . 'functions/hire_me.php';
    
?>    
<?php include_once ROOT_PATH . 'includes/header.php' ?>
<link rel="stylesheet" href="./public/css/portfolio.contact_me.css">

<div class="main-panel samples-panel" id="samples-panel">
    <div class="main-header">
        <h1>Hire Me</h1>
        <p></p>
    </div>
    <div class="main-content">
        <div class="main-content-top">
            <h2>Hire Me</h2>
        </div>
        <div class="main-content-left">
            <?php require_once ROOT_PATH . 'includes/message.php' ?>
            <form id="hire-me-form" method="POST" target="_self" enctype="multipart/form-data">
                <input type="hidden"  name="type" value="hire-me"/>
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="full_name" id="full_name" class="form-control form-control-sm"
                        placeholder="Full Name" value="<?php echo $_POST['full_name'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-sm"
                        placeholder="Email" value="<?php echo $_POST['email'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <label for="budget">Select Project Type</label>
                    <select list="project" name="project" id="project" class="form-control form-control-sm" value="<?php echo $_POST['project'] ?? '' ?>" >
                        <option value="Android Application">Android Application</option>
                        <option value="Desktop Application">Desktop Application</option>
                        <option value="Web Design">Web Design</option>
                        <option value="Web Application">Web Application</option>
                        <option value="Website Development">Website Development</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Project Details</label>
                    <textarea name="description" id="description"  class="form-control form-control-sm summernote"
                    placeholder="Please describe the details of the project"><?php echo $_POST['description'] ?? ''?></textarea>
                </div>
                <div class="form-group">
                    <label for="budget">Budget (Ksh)</label>
                    <input type="text" name="budget" id="budget" class="form-control form-control-sm"
                        placeholder="Expected Budget" value="<?php echo $_POST['budget'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <label for="attachment">Attachment</label>
                    <input type="file" name="attachment" id="attachment" class="form-control" placeholder="Attachment" accept=".pdf, .doc, .docx" value="<?php echo $_FILES['attachment'] ?? '' ?>" >
                </div>
                <button type="submit" class="btn btn-sm btn-dark" id="hire-me-btn">Hire Me</button>
            </form>
        </div>
        <div class="main-content-right">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Let's keep in touch</h4>
                    <p class="text">
                        Please contact me directly via email/phone 
                    </p>
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
    </div>
</div>
<?php include_once ROOT_PATH . 'includes/footer.php' ?>