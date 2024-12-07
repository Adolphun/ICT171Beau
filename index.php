<?php
include 'config.php';
include 'processForm.php';
include 'displayBlog.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

processForm();
displayBlog();
?>