<?php
include 'config.php';
include 'displayBlog.php';
include 'processForm.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

processForm();
displayBlog();
?>