CREATE DATABASE IF NOT EXISTS `portfolio`;

-- USERS TABLE
CREATE TABLE IF NOT EXISTS `portfolio`.`users`(
    `user_id` INT  AUTO_INCREMENT,
    `full_name` VARCHAR(255),
    `username` VARCHAR(16) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(64),
    `type` VARCHAR(16) NOT NULL DEFAULT 'user',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(user_id)
);

-- DUMP USERS
INSERT INTO `portfolio`.`users`(user_id, full_name,username, email, type, password)
VALUES(1, 'Portfolio Admin', 'admin', 'admin@gmail.com','admin',md5('123456')),
(2, 'Portfolio Author', 'author', 'author@gmail.com','author',md5('123456')),
(3, '', 'subscriber', 'subscriber@gmail.com','subscriber', '');

-- ARTICLES TABLE
CREATE TABLE IF NOT EXISTS `portfolio`.`articles`(
    `article_id` INT AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `subtitle` VARCHAR(255),
    `slag` VARCHAR(255) UNIQUE,
    `content` TEXT NOT NULL,
    `excerpt` TEXT ,
    `category` VARCHAR(64) NOT NULL DEFAULT 'uncategorized',
    `tags` VARCHAR(255) NOT NULL DEFAULT 'uncategorized',
    `comments` INT DEFAULT 0,
    `views` INT DEFAULT 0,
    `likes` INT DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(article_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- DUMP ARTICLES
INSERT INTO `portfolio`.`articles`(article_id, user_id, title, subtitle, content, excerpt, category, tags)
VALUES(1,1,'PHP-Knowing It All','All you need to know about PHP','a php function is a tiny program that will perform a particular task. the include() function takes whatever is inside the brackets and pulls it into the page at the place where the include() function is located. php has two similar
functions include() and require(). they both pull a file into a page so that the file is included in the displayed page. the
difference is in the way they react to a missing or faulty file. If the file to be included is missing or corrupt, include() will
not halt the execution of a page.', 'the include() function takes whatever is
inside the brackets and pulls it into the page at the place where the include() function is located','programming','php,include,learn, function'),
(2,1,'Datebase Design','database design and a practical way of testing it','Databases can be used to store products, details of customers, records of members of a society or a club, and much more. They can store names, passwords, addresses, e-mail addresses, registration dates, blog entries, and telephone
numbers. Databases can be regarded as folders containing tables of data. The table of data, like all tables, has columns
and rows; however, the rows in database tables are called records.', 'The table of data, like all tables, has columns
and rows; however, the rows in database tables are called records','programming','mysql,database,design, testing');

-- MESSAGES
CREATE TABLE IF NOT EXISTS `portfolio`.`messages`(
    `message_id` INT AUTO_INCREMENT,
    `from_name` VARCHAR(255) NOT NULL,
    `from_email` VARCHAR(100) NOT NULL,
    `message` TEXT NOT NULL,
    `reply` TEXT,
    `reply_by` INT,
    `reply_date` DATETIME,
    `status` INT DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(message_id),
    FOREIGN KEY (reply_by) REFERENCES users(user_id)
);

-- DUMP MESSAGES
-- dummy messages
INSERT INTO `portfolio`.`messages`(message_id, from_name, from_email, message, status)
VALUES(1, 'Wachiye Siranjofu 3','wachiye3@gmail.com','i would like to be an author on your site. where do i start?',0),
(2, 'Wachiye Siranjofu','wachiye1@gmail.com','i am having trouble login in to  my account. my username is wachiye1 .please help me.',0),
(3, 'Alex McKings','alex@alexdes.com','Hey, I love the contents on your site. Its amazing. i am a professional designer and i would like to join your team to help in creating better designs. Am available at any time. Waiting to here from you',0),
(4, 'Web Tester','xx@gmail.com','testing this message. testing this message',1);

-- HIRE ME table
CREATE TABLE IF NOT EXISTS `portfolio`.`hire_me`(
    `hire_id` INT AUTO_INCREMENT,
    `from_name` VARCHAR(255) NOT NULL,
    `from_email` VARCHAR(100) NOT NULL,
    `project` VARCHAR(30) NOT NUll DEFAULT 'Website Development',
    `description` TEXT NOT NULL,
    `budget` DOUBLE(18,2) DEFAULT 0.00,
    `attachment` TEXT,
    `status` INT DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(hire_id)
);

-- SAMPLES TABLE
CREATE TABLE IF NOT EXISTS `portfolio`.`samples`(
    `sample_id` INT AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `slag` VARCHAR(255)  UNIQUE,
    `content` TEXT NOT NULL,
    `github_url` varchar(255) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(sample_id)
);

-- DUMB SAMPLES
INSERT INTO `portfolio`.`samples`(sample_id,title, content, github_url)
VALUES(1, 'Library System In PHP','Building a libary system in php','https://www.github.com/Wachiye/personal-blog'),
(2, 'E-commerce System In PHP','Building an e-commerce system in php','https://www.github.com/Wachiye/personal-blog'),
(3, 'Student Management System In PHP','Building a student management system in php','https://www.github.com/Wachiye/personal-blog'),
(4, 'Library System In PHP','Building a libary system in php','https://www.github.com/Wachiye/personal-blog');

-- SETTINGS TABLE
CREATE TABLE IF NOT EXISTS `portfolio`.`settings`(
    `setting_key` VARCHAR(255) NOT NULL UNIQUE,
    `value` TEXT NOT NULL,
     `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(setting_key)
);

-- DUMP SETTINGS
INSERT INTO `portfolio`.`settings`(setting_key, value)
VALUES('site_title','Wachiye Jeremiah Siranjofu'),
('site_tag_line','My Future Lies In The Web Browser'),
('description','All about Wachiye Jeremiah Siranjofu'),
('site_email','example@gmail.com'),
('site_phone',' 254712312312'),
('facebook_url','https://www.facebook.com/jeremiah.siranjofuwachiye'),
('twitter_url','https://www.twitter.com/j_wachiye'),
('linkedin_url','https://www.linkedin.com/'),
('github_url','https://www.github.com/Wachiye');

-- SERVICES TABLE
CREATE TABLE IF NOT EXISTS `portfolio`.`services`(
    `service_id` INT AUTO_INCREMENT,
     `service_name` VARCHAR(255) NOT NULL UNIQUE,
    `description` TEXT NOT NULL,
    `price` DOUBLE(18,2) DEFAULT 0.00,
     `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(service_id)   
);

-- DUMB SERVICES
INSERT INTO `portfolio`.`services`(service_id, service_name, description, price)
VALUES(1, 'Web Design','Professional and efficient web designing incluiding prototyping, graphic design and wireframing that supports every interaction you wish to have on your web. We design for web.', 120000.00),
(2, 'Web Development','Experts in web development that entails every functional requirement need on the web including Database and paymnet system integrations', 250000.00),
(3, 'Android Development','Building standardized android applications, coversion of websites to android application, IOT and many more features.', 350000.00),
(4, 'Desktop Development','Design and Develpment of desktop application to solve daily problems.',420000.00);

-- PAGE VIEWS TABLE
CREATE TABLE IF NOT EXISTS `portfolio`.`page_views`(
    `page_name` VARCHAR(255) NOT NULL UNIQUE,
    `views` INT DEFAULT 0,
     `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(page_name)
);

-- DUMP PAGE VIEWS
INSERT INTO `portfolio`.`page_views`(page_name, views)
VALUES('home_page',108),
('about_page',88),
('samples_page',106),
('articles_page',70),
('contact_page',67);


-- EXPERIENCES TABLES
CREATE TABLE IF NOT EXISTS `portfolio`.`experiences`(
    `experience_id` INT AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL UNIQUE,
    `company` TEXT NOT NULL,
    `start_year` INT,
    `end_year` int ,
    `tasks` TEXT,
    PRIMARY KEY(experience_id)   
);

-- DUMP EXPERINCES
INSERT INTO `portfolio`.`experiences`(experience_id, title, company, start_year, end_year, tasks)
VALUES (1, 'Software Project Manager','Real Teachnologies LTD', 2016, 2018 , 'Project Planning, Project Management'),
        (2, 'Senior Frontend Developer','Real Teachnologies LTD', 2015, 2016 , 'Team Leading, Requirements Analysis, Framework Selection');

-- EDUCTAION TABLES
CREATE TABLE IF NOT EXISTS `portfolio`.`education`(
    `education_id` INT AUTO_INCREMENT,
    `course` VARCHAR(255) NOT NULL UNIQUE,
    `institution` TEXT NOT NULL,
    `location` VARCHAR(255),
    `start_year` INT,
    `end_year` int ,
    `grade` TEXT,
    PRIMARY KEY(education_id)   
);

-- DUMP EXPERINCES
INSERT INTO `portfolio`.`education`(education_id, course, institution, location, start_year, end_year, grade)
VALUES (1, 'Bsc. Computer Science','Egerton University','Njoro, Nakuru', 2017, null, 'In Final Year'),
    (2, 'Secondary School Education (KCSE)','Arch Bishop Anyolo Secondary School','Tongaren, Bungoma', 2013, 2014 , 'AGP 74 (A-)'),
    (3, 'Primary School Education (KCPE)','Baraton Primary School','Baraton, Kitale', 2015, 2016 , '297/500 Marks');

-- SKILLS TABLE
CREATE TABLE IF NOT EXISTS `portfolio`.`skills`(
    `skill_id` INT AUTO_INCREMENT,
    `category` VARCHAR(255) NOT NULL UNIQUE,
    `skills` TEXT NOT NULL,
    PRIMARY KEY(skill_id)   
);

-- DUMP SKILLS
INSERT INTO `portfolio`.`skills`(skill_id, category, skills)
VALUES (1, 'Languages','PHP, NodeJs, Java, C, C++, Python, Visual Basic, C#'),
    (2, 'Programming Tools','Git, Heroku, Vs Code, IntelliJ, Sublime Text, Visual Studio, Eclipse, Android Studio'),
    (3, 'Databases','MySQL, Oracle, MongoDB, Microsoft Access'),
    (4, 'Protyping/Design Tools','JustInMind, Figma, Adobe Photoshop, InVision'),
    (5, 'Web Development','Rest APIs, MEAN, MERN, PHP+Laravel, Spring Boot, ReactJ, Bootstrap');