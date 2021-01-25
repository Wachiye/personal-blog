CREATE TABLE IF NOT EXISTS `users`(
    `user_id` INT  AUTO_INCREMENT,
    `full_name` VARCHAR(255),
    `username` VARCHAR(16) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(15),
    `password` VARCHAR(64),
    `type` VARCHAR(16) NOT NULL DEFAULT 'user',
     `image` VARCHAR(255) ,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(user_id)
);

CREATE TABLE IF NOT EXISTS `articles`(
    `article_id` INT AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `subtitle` VARCHAR(255),
    `content` TEXT NOT NULL,
    `excerpt` TEXT ,
    `category` VARCHAR(64) NOT NULL DEFAULT 'uncategorized',
    `tags` VARCHAR(255) NOT NULL DEFAULT 'uncategorized',
    `image` VARCHAR(255) NOT NULL,
    `comments` INT DEFAULT 0,
    `views` INT DEFAULT 0,
    `likes` INT DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(article_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE IF NOT EXISTS `messages`(
    `message_id` INT AUTO_INCREMENT,
    `subject` VARCHAR(255) NOT NULL,
    `from_name` VARCHAR(255) NOT NULL,
    `from_email` VARCHAR(100) NOT NULL,
    `from_phone` VARCHAR(15) NOT NULL,
    `message` TEXT NOT NULL,
    `status` INT DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(message_id)
);

CREATE TABLE IF NOT EXISTS `samples`(
    `sample_id` INT AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `link` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(sample_id)
);

CREATE TABLE IF NOT EXISTS `settings`(
    `setting_key` VARCHAR(255) NOT NULL UNIQUE,
    `value` TEXT NOT NULL,
     `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(setting_key)
);

CREATE TABLE IF NOT EXISTS `services`(
    `service_id` INT AUTO_INCREMENT,
     `service_name` VARCHAR(255) NOT NULL UNIQUE,
    `description` TEXT NOT NULL,
    `price` DOUBLE(18,2) DEFAULT 0.00,
     `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(service_id)   
);

CREATE TABLE IF NOT EXISTS `page_views`(
    `page_name` VARCHAR(255) NOT NULL UNIQUE,
    `views` INT DEFAULT 0,
     `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(page_name)
);