<?php
// Function to add a task
function addTask() {
    // Get the values from the input fields
    $numTasksStr = $_POST["numTasksEntry"];
    $taskNameStr = $_POST["taskNameEntry"];
    $taskDurationStr = $_POST["taskDurationEntry"];
    $dayStr = $_POST["dayEntry"];

    // Convert the day string to an integer
    $day = 0;
    if ($dayStr === "Monday") {
    } else if ($dayStr === "Tuesday") {
        $day = 2;
    } else if ($dayStr === "Wednesday") {
        $day = 3;
    } else if ($dayStr === "Thursday") {
        $day = 4;
    } else if ($dayStr === "Friday") {
        $day = 5;
    } else if ($dayStr === "Saturday") {
        $day = 6;
    } else if ($dayStr === "Sunday") {
        $day = 7;
    } else {
        // Invalid day entered
        echo "Invalid day entered";
        return;
    }

    // Convert the task duration string to an integer
    $taskDuration = intval($taskDurationStr);
    // Convert minutes to hours
    $taskDurationHours = floor($taskDuration / 60);

    // Add your task processing logic here

    // Clear the input fields
    $_POST["numTasksEntry"] = "";
    $_POST["taskNameEntry"] = "";
    $_POST["taskDurationEntry"] = "";
    $_POST["dayEntry"] = "";

    // Update the summary label
    echo "Task added successfully";
}

// Call the addTask function when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addTask();
}
?>
