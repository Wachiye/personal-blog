<?php

if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}

include_once ROOT_PATH . 'includes/header.php' 

?>

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
        <div class="main-content-left">
            <h2>Profile</h2>
            <?php echo $site['about_me_text'] ?? ''?>
        </div>
        <div class="main-content-right">
            <div class="right-left">
                <h2>Skills</h2>
                <div class="skill-group">
                    <h3>Languages</h3>
                    <ul class="skills">
                        <li class="skill">PHP <sup>*</sup></li>
                        <li class="skill">NodeJs <sup>*</sup></li>
                        <li class="skill">VB <sup>*</sup></li>
                        <li class="skill">Java</li>
                        <li class="skill">Python</li>
                        <li class="skill">C/C++</li>
                    </ul>
                </div>
                <div class="skill-group">
                    <h3>Project Tools</h3>
                    <ul class="skills">
                        <li class="skill">Git <sup>*</sup></li>
                        <li class="skill">Heroku <sup>*</sup></li>
                        <li class="skill">VsCode/Sublime-Text <sup>*</sup></li>
                        <li class="skill">Visual Studio <sup>*</sup></li>
                        <li class="skill">Eclipse</li>
                    </ul>
                </div>
                <div class="skill-group">
                    <h3>Databases</h3>
                    <ul class="skills">
                        <li class="skill">MySQL <sup>*</sup></li>
                        <li class="skill">MongoDB <sup>*</sup></li>
                        <li class="skill">MS-Access <sup>*</sup></li>
                        <li class="skill">Postgres</li>
                    </ul>
                </div>
                <div class="skill-group">
                    <h3>Prototyping/Graphics</h3>
                    <ul class="skills">
                        <li class="skill">Photoshop</li>
                        <li class="skill">InVision <sup>*</sup></li>
                        <li class="skill">Pencil <sup>*</sup></li>
                        <li class="skill">JustInMind <sup>*</sup></li>
                    </ul>
                </div>
            </div>
            <div class="right-right">
                <h2>Hobbies/Interests</h2>
                <div class="cards">
                    <div class='card card1'>
                        <i class="fa fa-bicycle"></i>
                    </div>
                    <div class='card card2'>
                        <i class="fa fa-swim"></i>
                    </div>
                    <div class='card card3'>
                        <i class="fa fa-book"></i>
                    </div>
                    <div class='card card4'>
                        <i class="fa fa-walk"></i>
                    </div>
                    <div class='card card3'>
                        <i class="fa fa-book"></i>
                    </div>
                    <div class='card card4'>
                        <i class="fa fa-walk"></i>
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
                        <div class='experience'>
                            <h3 class='title'>Senior Sales Marketing Manager</h3>
                            <p class="company">Stem Agency Firm (<span class="period">2012-2014</span>)</p>
                            <ul class="duties">
                                <li class="duty">Sales Marketing</li>
                                <li class="duty">Sales Marketing</li>
                            </ul>
                        </div>
                        <div class='experience'>
                            <h3 class='title'>Senior Sales Marketing Manager</h3>
                            <p class="company">Stem Agency Firm (<span class="period">2012-2014</span>)</p>
                            <ul class="duties">
                                <li class="duty">Sales Marketing</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bottom-right">
                    <h2>Education</h2>
                    <div class="educations">
                        <div class='education'>
                            <div class="period">2017 - Present</div>
                            <div class="details">
                                <h3 class='course'>Bsc in Computer Science</h3>
                                <p class="school">Egerton University, Nakuru</p>
                                <p class="grade">Level 3 . Waiting to graduate in 2022</p>
                            </div>
                        </div>
                        <div class='education'>
                            <div class="period">2013 - 2016</div>
                            <div class="details">
                                <h3 class='course'>High School</h3>
                                <p class="school">Arc Bishop Philip Anyolo, Bungoma</p>
                                <p class="grade">A-</p>
                            </div>
                        </div>
                        <div class='education'>
                            <div class="period">2006 - 2013</div>
                            <div class="details">
                                <h3 class='course'>Junior School</h3>
                                <p class="school">Baraton Primary Sch, Kitale</p>
                                <p class="grade">C+</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <p class="lead">It's nice that you have read through. Please get a copy of my full cv
                <a class="btn btn-sm action-btn first" href='.\docs\"Wachye Siranjofuw Wachiye.pdf"' download target="_blank">
                    <i class="fa fa-download">Download CV</i>
                </a>
            </p>
            <?php include_once ROOT_PATH . 'includes/hire-me.php' ?>
        </div>
    </div>
</div>

<?php include_once ROOT_PATH . 'includes/footer.php' ?>
        