<?php
function conn() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "accounts"; // Specify the database name

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // echo "Connection established";
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}
?>
