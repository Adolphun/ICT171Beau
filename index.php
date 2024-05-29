<?php
session_start();

include 'config.php';
include 'displaycalendar.php';
include 'processForm.php';
include 'addTask.php';
include 'addLicenceFooter.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
displaycalendar();
processForm();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['taskNameEntry']) && isset($_POST['taskDurationEntry']) && isset($_POST['dayEntry'])) {
        addTask();
    }
}

addLicenceFooter();