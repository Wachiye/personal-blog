--dummy users
INSERT INTO users(user_id, full_name,username, email, phone, type, password, image)
VALUES(1, 'Wachiye Siranjofu', 'wachiye', 'wachiye@gmail.com','254790983123','admin',md5('4sirah@123'),'me.jpeg'),
(2, 'Wachiye Siranjofu 2', 'wachiye2', 'wachiye2@gmail.com','254792983123','author',md5('4sirah2@123'),'me.jpeg'),
(3, 'Wachiye Siranjofu 3', 'wachiye3', 'wachiye3@gmail.com','254793983123','user',md5('4sirah3@123'),'me.jpeg'),
(4, '', 'wachiye4', 'wachiye4@gmail.com','','subscriber','','');

--dummy articles
INSERT INTO articles(article_id, user_id, title, subtitle, content, excerpt, category, tags, image)
VALUES(1,1,'PHP-Knowing It All','All you need to know about PHP','a php function is a tiny program that will perform a particular task. the include() function takes whatever is
inside the brackets and pulls it into the page at the place where the include() function is located. php has two similar
functions include() and require(). they both pull a file into a page so that the file is included in the displayed page. the
difference is in the way they react to a missing or faulty file. If the file to be included is missing or corrupt, include() will
not halt the execution of a page.', 'the include() function takes whatever is
inside the brackets and pulls it into the page at the place where the include() function is located','programming','php,include,learn, function','code.jpeg'),
(2,1,'Datebase Design','database design and a practical way of testing it','Databases can be used to store products, details of customers, records of members of a society or a club, and much
more. They can store names, passwords, addresses, e-mail addresses, registration dates, blog entries, and telephone
numbers. Databases can be regarded as folders containing tables of data. The table of data, like all tables, has columns
and rows; however, the rows in database tables are called records.', 'The table of data, like all tables, has columns
and rows; however, the rows in database tables are called records','programming','mysql,database,design, testing','code.jpeg');

--dummy messages
INSERT INTO messages(message_id, subject, from_name, from_email, from_phone, message, status)
VALUES(1, 'REQUEST FOR AUTHORSHIP','Wachiye Siranjofu 3','wachiye3@gmail.com','254793983123','i would like to be an author on your site. where do i start?',0),
(2, 'ERROR LOGIN IN','Wachiye Siranjofu','wachiye1@gmail.com','254791983123','i am having trouble login in to  my account. my username is wachiye1 .please help me.',0),
(3, 'DESIGNING YOUR SITE','Alex McKings','alex@alexdes.com','254705042345','Hey, I love the contents on your site. Its amazing. i am a professional designer and i would like to join your team to help in creating better designs. Am available at any time. Waiting to here from you',0),
(4, 'TESTING MESSAGE','Web Tester','xx@gmail.com','254711111111','testing this message. testing this message',1);

--dummy samples
INSERT INTO samples(sample_id,title, content, link, image)
VALUES(1, 'Library System In PHP','Building a libary system in php','http://localhost:80/samples.php','code.jpeg'),
(2, 'E-commerce System In PHP','Building an e-commerce system in php','http://localhost:80/samples.php','code.jpeg'),
(3, 'Student Management System In PHP','Building a student management system in php','http://localhost:80/samples.php','code.jpeg'),
(4, 'Library System In PHP','Building a libary system in php','http://localhost:80/samples.php','code.jpeg');

--dummy setting
INSERT INTO settings(setting_key, value)
VALUES('site_title','Wachiye Jeremiah Siranjofu'),
('site_tag_line','My next move will always be the best'),
('site_description','All about Wachiye Jeremiah Siranjofu'),
('site_email','siranjofuw@gmail.com'),
('site_phone',' 254790983123');

--dummy services
INSERT INTO services(service_name, description, price)
VALUES('web design','Professional and efficient web designing incluiding prototyping, graphic design and wireframing that supports every interaction you wish to have on your web. We design for web.', 10000.00),
('web development','Experts in web development that entails every functional requirement need on the web including Database and paymnet system integrations', 20000.00),
('adnroid development','Building standardized android applications, coversion of websites to android application, IOT and many more features.', 15000.00),
('desktop development','Design and Develpment of desktop application to solve daily problems.');
