<?php
function displaycalendar() {
    ?>
    <html>
    <head>
        <title>Beau's Task Calendar</title>
    </head>
    <body>
        <h1>Task Calendar</h1>
        <?php
        // If a task was added, display a success message
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
        foreach ($_SESSION['tasks'] as $index => $task) {
            echo "<p>Task: {$task['name']}, Duration: {$task['duration']} hours, Day: {$task['day']}</p>";
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='taskIndex' value='$index'>";
            echo "<input type='submit' value='Remove Task'>";
            echo "</form>";
        }
        ?>
        <h2>Calendar:</h2>
        <table>
            <tr>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
            <tr>
                <?php
                foreach ($days as $day) {
                    echo "<td>{$_SESSION['totalHours'][$day]} hours remaining</td>";
                }
                ?>
            </tr>
        </table>
    </body>
    </html>
    <?php
}