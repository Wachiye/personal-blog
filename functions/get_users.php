<?php
 if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}
require_once ROOT_PATH . 'config/db.config.php';
$db = new DBAccess();
$query = 'SELECT * FROM users';
$users = $db->query($query);
if($users)
    return $users;
else{
    return $mysqli_error();
}

?>