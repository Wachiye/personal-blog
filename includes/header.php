<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }
    require_once ROOT_PATH . 'functions/get_settings.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $site['description'] ?> ">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/css/portfolio.common.css">
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    <title><?php echo $site['site_title'] ?></title>
</head>

<body>
    <div class='wrapper'>
    <?php include_once ROOT_PATH . 'includes/nav.php' ; ?>