<?php
function addTask() {
    // Get the values
    $taskName = $_POST["taskNameEntry"];
    $taskDuration = $_POST["taskDurationEntry"];
    $day = $_POST["dayEntry"];

    // Convert the day string to an int because thats why.
    $dayNum = 0;
    if ($day === "Monday") {
    } else if ($day === "Tuesday") {
        $dayNum = 2;
    } else if ($day === "Wednesday") {
        $dayNum = 3;
    } else if ($day === "Thursday") {
        $dayNum = 4;
    } else if ($day === "Friday") {
        $dayNum = 5;
    } else if ($day === "Saturday") {
        $dayNum = 6;
    } else if ($day === "Sunday") {
        $dayNum = 7;
    } else {
        // Invalid day entered
        echo "Invalid day entered";
        return;
    }

    // Convert the task duration string to an integer
    $taskDuration = intval($taskDuration);
    $taskDurationHours = floor($taskDuration / 60);

    // Clear the input fields
    $_POST["taskNameEntry"] = "";
    $_POST["taskDurationEntry"] = "";
    $_POST["dayEntry"] = "";

    // Update the summary label
    echo "Task added successfully";
}