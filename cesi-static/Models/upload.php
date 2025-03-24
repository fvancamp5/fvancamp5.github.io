<?php

if (isset($_FILES['file'])) {
    //echo "File upload request detected.<br>";
    $filename = $_FILES['file']['name'];
    // echo "Filename: $filename<br>";
    $filetype = $_FILES['file']['type'];
    $filesize = $_FILES['file']['size'];
    $filepath = "../Views/uploads/" . $filename;
    $allowedTypes = array('application/pdf', 'image/jpeg', 'image/png', 'application/docx');

    if (!in_array($filetype, $allowedTypes)) {
        header("Location: /Views/invalid.html");
        die("Error: File type is not allowed.");
    }

    if ($filesize == 0) {
        header("Location: /Views/invalid.html");
        die("Error: File is empty.");
    } elseif ($filesize > 2 * 1024 * 1024) {
        header("Location: /Views/invalid.html");
        die("Error: File is too big.");
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) {
        header("Location: /Views/success.html");
        exit();
    } else {
        header("Location: /Views/invalid.html");
        die("Error: Failed to move uploaded file.");
    }
} else {
    die("No file was uploaded.");
}

?>