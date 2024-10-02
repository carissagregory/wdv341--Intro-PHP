<?php

    //1. define the location where you plan to store the uploaded file
    $hostImageFolder = "uploadedImages/";
    echo basename($_FILES["inImage"]["name"]);

    $hostImagePath = $hostImageFolder . basename($_FILES["inImage"]["name"]);

    echo "<h3>$hostImagePath</h3>";

    //move the uploaded file to my directory on the host/localhost
    if (move_uploaded_file($_FILES["inImage"]["tmp_name"], $hostImagePath)) {
        echo "File uploaded successfully!";
    } else {
        echo "Failed to upload the file.";
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
</body>
</html>