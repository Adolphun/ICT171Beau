<?php
// hours for day
if (!isset($_SESSION['totalHours'])) {
    $_SESSION['totalHours'] = array("Monday" => 24, "Tuesday" => 24, "Wednesday" => 24, "Thursday" => 24, "Friday" => 24, "Saturday" => 24, "Sunday" => 24);
}
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
}