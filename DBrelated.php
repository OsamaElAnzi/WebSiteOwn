<?php
function conn() {
    //bruh dit is niet de bedoeling

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // echo "Connection established";
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

