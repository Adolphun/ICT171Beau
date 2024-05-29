<?php
session_start();

include 'config.php';
include 'displayCalendar.php';
include 'processForm.php';
include 'addTask.php';
include 'addLicenceFooter.php';

displayCalendar();

// Process the form if it was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['taskNameEntry']) && isset($_POST['taskDurationEntry']) && isset($_POST['dayEntry'])) {
        addTask();
    }
}

addLicenceFooter();