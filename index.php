<?php
session_start();

// hours for day
if (!isset($_SESSION['totalHours'])) {
    $_SESSION['totalHours'] = array("Monday" => 24, "Tuesday" => 24, "Wednesday" => 24, "Thursday" => 24, "Friday" => 24, "Saturday" => 24, "Sunday" => 24);
}
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
}

// Display the calendar input form
function displayCalendar() {
    ?>
    <html>
    <head>
        <title>Beau's Task Calendar</title>
    </head>
    <body>
        <h1>Task Calendar</h1>
        <?php
        // If a task was added, display a success message this better work!!!
        if (isset($_SESSION['taskAdded']) && $_SESSION['taskAdded']) {
            echo "<p>Task added successfully!</p>";
            // Reset task added status
            $_SESSION['taskAdded'] = false;
        }
        ?>
        <form method="POST" action="">
            <label for="taskNameEntry">Task Name:</label>
            <input type="text" name="taskNameEntry" id="taskNameEntry" required><br><br>
            <label for="taskDurationEntry">Task Duration (in hours):</label>
            <input type="number" name="taskDurationEntry" id="taskDurationEntry" min="0" max="24" required><br><br>
            <label for="dayEntry">Day:</label>
            <select name="dayEntry" id="dayEntry" required>
                <?php
                $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                foreach ($days as $day) {
                    echo "<option value='$day'>$day</option>";
                }
                ?>
            </select><br><br>
            <input type="submit" value="Add Task">
        </form>
        <?php
        // Display how many hours left for each day
        foreach ($_SESSION['totalHours'] as $day => $hours) {
            echo "<p>$day: $hours hours remaining</p>";
        }
        // Display tasks
        echo "<h2>Tasks:</h2>";
        foreach ($_SESSION['tasks'] as $task) {
            echo "<p>Task: {$task['name']}, Duration: {$task['duration']} hours, Day: {$task['day']}</p>";
        }
        ?>
    </body>
    </html>
    <?php
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskName = $_POST['taskNameEntry'];
    $taskDuration = $_POST['taskDurationEntry'];
    $day = $_POST['dayEntry'];
    $_SESSION['totalHours'][$day] -= $taskDuration;
    // Add task to tasks list
    $_SESSION['tasks'][] = array('name' => $taskName, 'duration' => $taskDuration, 'day' => $day);
    $_SESSION['taskAdded'] = true;
}

displayCalendar();

// Function to add a task
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
    // Convert minutes to hours because I couldn't figure out a way to do that in PHP
    $taskDurationHours = floor($taskDuration / 60);

    // Clear the input fields
    $_POST["taskNameEntry"] = "";
    $_POST["taskDurationEntry"] = "";
    $_POST["dayEntry"] = "";

    // Update the summary label
    echo "Task added successfully";
}

