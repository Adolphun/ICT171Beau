<?php
function displayBlog() {
    ?>
    <html>
    <head>
        <title>My Blog</title>
    </head>
    <body>
        <h1>My Blog</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="entryTitle">Title:</label>
            <input type="text" name="entryTitle" id="entryTitle" required><br><br>
            <label for="entryContent">Content:</label><br>
            <textarea name="entryContent" id="entryContent" rows="10" cols="50" required></textarea><br><br>
            <label for="entryImage">Image:</label>
            <input type="file" name="entryImage" id="entryImage" accept="image/*"><br><br>
            <input type="submit" value="Add Entry">
        </form>
        <hr>
        <?php
        // Display blog entries
        foreach ($_SESSION['blogEntries'] as $entry) {
            echo "<h2>{$entry['title']}</h2>";
            echo "<p><em>{$entry['date']}</em></p>";
            echo "<p>{$entry['content']}</p>";
            if (!empty($entry['image'])) {
                echo "<img src='{$entry['image']}' alt='Blog Image' style='max-width: 100%; height: auto;'><br><br>";
            }
            echo "<hr>";
        }
        ?>
    </body>
    </html>
    <?php
}
?>