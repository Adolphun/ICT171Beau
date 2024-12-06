<?php
function processForm() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['entryTitle'];
        $content = $_POST['entryContent'];
        $date = date('Y-m-d H:i:s');
        $imagePath = '';

        // Handle image upload
        if (isset($_FILES['entryImage']) && $_FILES['entryImage']['error'] == UPLOAD_ERR_OK) {
            $imagePath = 'uploads/' . basename($_FILES['entryImage']['name']);
            move_uploaded_file($_FILES['entryImage']['tmp_name'], $imagePath);
        }

        // Add entry to session
        $_SESSION['blogEntries'][] = array(
            'title' => $title,
            'content' => $content,
            'date' => $date,
            'image' => $imagePath
        );
    }
}
?>