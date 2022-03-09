<?php
 if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
}
require_once ROOT_PATH . '../config/db.config.php';
$db = new DBAccess();
$query = 'SELECT * FROM users WHERE DateDiff("d", created_at, Date()) < 7';
$query .= " ORDER BY created_at DESC";

$recent_users = $db->query($query);

if($recent_users)
    return $recent_users;
else{
    return mysqli_error($db->db);
}

?>