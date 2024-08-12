<?php

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    
    // Sanitize email input
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    include '../DBrelated.php';
    $conn = conn();
    if ($conn === null) {
        echo "Failed to connect to the database.";
        return;
    }
    
    // Corrected SQL query and use of prepared statements
    $query = "DELETE FROM gegevens WHERE email = :email";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../style/style.css">
        </head>
        <body>
            <div class="box">
                <img src="../foto/animatiePrullenbak.gif" alt="GIF">
                <h2>Account succesvol verwijderd!</h2>
            </div>
        </body>
        </html>
        <?php
    } catch (PDOException $e) {
        echo "Error deleting record: ". $e->getMessage();
    }
} else {
    echo "Error: No email provided.";
}

