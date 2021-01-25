<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/font-awesome.min.css">
    <link rel="stylesheet" href="./public/css/portfolio.common.css">
    <link rel="stylesheet" href="./public/css/portfolio.about_me.css">
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
                            <a href="/about_me.php" class="nav-link active">ABOUT</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/samples.php" class="nav-link">SAMPLES</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/articles.php" class="nav-link">ARTICLES</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/contact_me.php" class="nav-link">CONTACT</a>
                        </li>
                        <li class='nav-item'>
                            <a href="/login.php" class="nav-link">LOGIN</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
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
                                <a href="mailto:siranjofuw@gmail.com?Subject=LET'S%20TALK%20BUSINESS">siranjofuw@gmail.com</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="fa fa-phone"></i>
                                <a href="tel:254790983123">(254)-790-983-123</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="main-content-left">
                    <h2>Profile</h2>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non necessitatibus porro eius nobis
                        officiis corrupti commodi provident impedit quibusdam velit.
                    </p>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non necessitatibus porro eius nobis
                        officiis corrupti commodi provident impedit quibusdam velit.
                    </p>
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
                        <a class="btn btn-sm action-btn first" href="#" download target="_blank">
                            <i class="fa fa-download">Download CV</i>
                        </a>
                    </p>
                    <div class="hire-me">
                        <h2>Your are a click away!</h2>
                        <p class="text-light">Are you looking for website/blog?</p>
                        <button class="btn action-btn">Get it Here</button>
                    </div>
                    <div class="recent-articles">
                        <h2>Recent Articles</h2>
                        <div class="cards articles">
                            <a href="#" class="card article">
                                <h3>Article One</h3>
                            </a>
                            <a href="#" class="card article">
                                <h3>Article One</h3>
                            </a>
                            <a href="#" class="card article">
                                <h3>Article One</h3>
                            </a>
                            <a href="#" class="card article">
                                <h3>Article One</h3>
                            </a>
                        </div>
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