<?php

if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}


require_once ROOT_PATH . 'functions/get_experiences.php';
require_once ROOT_PATH . 'functions/get_education.php';
require_once ROOT_PATH . 'functions/get_skills.php';
?>
<?php include_once ROOT_PATH . 'includes/header.php' ?>
<link rel="stylesheet" href="./public/css/portfolio.about_me.css">     
<div class="main-panel about-panel" id="about-me-panel">
    <div class="main-header">
        <div class='main-header-left'>
            <img src="./public/images/me.jpeg" alt="">
            <h2>I'm Sirah</h2>
        </div>
        <div class="main-header-right">
            <div class="top">
                <ul class="list-inline media">
                    <li class="list-inline-item media-item">
                        <a href="<?php echo $site['facebook_url'] ?? '#' ?>" class='fa fa-facebook' target="_blank"></a>
                    </li>
                    <li class="list-inline-item media-item">
                        <a href="<?php echo $site['twitter_url'] ?? '#' ?>" class='fa fa-twitter' target="_blank"></a>
                    </li>
                    <li class="list-inline-item media-item">
                        <a href="<?php echo $site['linkedin_url'] ?? '#' ?>" class='fa fa-linkedin' target="_blank"></a>
                    </li>
                    <li class="list-inline-item media-item">
                        <a href="<?php echo $site['github_url'] ?? '#' ?>" class='fa fa-github' target="_blank"></a>
                    </li>
                </ul>
            </div>
            <div class="middle">
                <h1>Jeremiah <span>Siranjofu</span> Wachiye</h1>
                <p>Web Developer</p>
                <address>
                    P.O. Box: 232 Kitale, Kenya
                </address>
            </div>
            <div class="bottom">
                <ul class="list-inline media-list">
                    <li class="list-inline-item">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo $site['site_email'] ?? ''?>?Subject=LET'S%20TALK%20BUSINESS"><?php echo $site['site_email'] ?? ''?></a>
                    </li>
                    <li class="list-inline-item">
                        <i class="fa fa-phone"></i>
                        <a href="tel:<?php echo $site['site_phone'] ?? ''?>">+<?php echo $site['site_phone'] ?? ''?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
        <?php require_once ROOT_PATH . 'includes/message.php' ?>
            <div class="row">
                <div class="col-md-6 mb-1">
                    <div class="container">
                        <h2 >Profile</h2>
                        <?php echo $site['about_me_text'] ?? ''?>
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <div class="container">
                        <h2>Skills</h2>
                        <?php
                            if(isset($skills)){
                                foreach($skills as $skill){
                                    echo <<<EOT
                                    <div class="skill-group">
                                        <h3 class="text-capitalize">{$skill['category']}</h3>
                                        <ul class="skills">
                                    EOT;
                                    if(isset($skill['skills'])){
                                        foreach($skill['skills'] as $_skill){
                                            echo <<<EOT
                                                <li class="skill">{$_skill}</li>
                                            EOT;
                                        }
                                    }
                                    echo <<<EOT
                                        </ul>
                                    </div>
                                    EOT;
                                } 
                            } else{
                                echo <<<EOT
                                <div class="skill-group">
                                    <h3>Skill Category</h3>
                                    <ul class="skills">
                                        <li class="skill">Skill 1</li>
                                        <li class="skill">Skill 2 </li>
                                    </ul>
                                </div>
                                EOT;
                            }   

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-body w-100"></div>
        <div class='main-content-bottom'>
            <div class="cv">
                <div class="bottom-left">
                    <h2>Work and Experience</h2>
                    <div class='experiences'>
                        <?php
                            if(isset($experiences)){
                                foreach($experiences as $exp){
                                    echo <<<EOT
                                    <div class='experience'>
                                        <h3 class='title'>{$exp['title']}</h3>
                                        <p class="company">{$exp['company']} (<span class="period">{$exp['start_year']}-{$exp['end_year']}</span>)</p>
                                        <ul class="duties">
                                    EOT;
                                    if(isset($exp['tasks'])){
                                        foreach($exp['tasks'] as $task){
                                            echo <<<EOT
                                                <li class="duty">{$task}</li>
                                            EOT;
                                        }
                                    }
                                    echo <<<EOT
                                        </ul>
                                    </div>
                                    EOT;
                                } 
                            } else{
                                echo <<<EOT
                                <div class='experience'>
                                    <h3 class='title'>Title of work</h3>
                                    <p class="company">Company Name (<span class="period">from-to</span>)</p>
                                    <ul class="duties">
                                        <li class="duty">Task 1</li>
                                        <li class="duty">Task 2</li>
                                    </ul>
                                </div>
                                EOT;
                            }   

                        ?>
                    </div>
                </div>
                <div class="bottom-right">
                    <h2>Education</h2>
                    <div class="educations">
                    <?php
                            if(isset($education)){
                                foreach($education as $ed){
                                    echo <<<EOT
                                    <div class='education'>
                                        <div class="period">{$ed['start_year']} - {$ed['end_year']}</div>
                                        <div class="details">
                                            <h3 class='course'>{$ed['course']} </h3>
                                            <p class="school">{$ed['institution']} , {$ed['location']} </p>
                                            <p class="grade">{$ed['grade']} </p>
                                        </div>
                                    </div>
                                    EOT;
                                } 
                            } else{
                                echo <<<EOT
                                <div class='education'>
                                    <div class="period">Entry - Final Year</div>
                                    <div class="details">
                                        <h3 class='course'>Course </h3>
                                        <p class="school">Institution, location</p>
                                        <p class="grade">Grade/Comments</p>
                                    </div>
                                </div>
                                EOT;
                            }   

                        ?>
                    </div>
                </div>
            </div>
            
            <p class="lead">It's nice that you have read through. Please get a copy of my full cv
                <a class="btn btn-sm action-btn first" href=".\docs\Resume.pdf" download="Jeremiah Siranjofu Wachiye.pdf" target="_blank">
                    <i class="fa fa-download">Download CV</i>
                </a>
            </p>
            <?php include_once ROOT_PATH . 'includes/hire-me.php' ?>
        </div>
    </div>
</div>

<?php include_once ROOT_PATH . 'includes/footer.php' ?>
        