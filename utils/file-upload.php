<?php
    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    function uploadFile($file, $filename){
        $target_dir = ROOT_PATH . "uploads/";

        $target_file = $target_dir . $filename;
        // Check file size
        if ($file["size"] > 2000000) {
            return -1;
        }

        // Check if file already exists and delete
        if (file_exists($target_file)) {
            unlink($target_file);
        }
        
        // upload file to disk
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return 1;
        } else {
            return 0;
        }
    }
?>