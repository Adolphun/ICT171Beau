<?php
session_start();

include 'config.php';
include 'displaycalendar.php';
include 'addTask.php';
include 'licencefooter.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
displaycalendar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['taskIndex'])) {
        $taskIndex = $_POST['taskIndex'];
        // Remove the task from the tasks list
        if (isset($_SESSION['tasks'][$taskIndex])) {
            $removedTask = $_SESSION['tasks'][$taskIndex];
            $_SESSION['totalHours'][$removedTask['day']] += $removedTask['duration'];
            unset($_SESSION['tasks'][$taskIndex]);
        }
    } elseif (isset($_POST['taskNameEntry']) && isset($_POST['taskDurationEntry']) && isset($_POST['dayEntry'])) {
        $taskName = $_POST['taskNameEntry'];
        $taskDuration = $_POST['taskDurationEntry'];
        $day = $_POST['dayEntry'];

        // Validate input
        if (!is_string($taskName) || empty($taskName)) {
            echo "Invalid task name.";
            return;
        }
        if (!is_numeric($taskDuration) || $taskDuration < 0 || $taskDuration > 24) {
            echo "Invalid task duration.";
            return;
        }

        // Check if task can be added
        if ($_SESSION['totalHours'][$day] < $taskDuration) {
            echo "Not enough hours remaining for this day.";
            return;
        }

        $_SESSION['totalHours'][$day] -= $taskDuration;
        // Add task to tasks list
        $_SESSION['tasks'][] = array('name' => $taskName, 'duration' => $taskDuration, 'day' => $day);
        $_SESSION['taskAdded'] = true;

        addTask();
    }
}

addLicenceFooter();