<?php
include 'DBrelated.php';
function makeAccount() {
    if (isset($_POST['aanMakenVanAccount'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // add database connection and insert new account data here
        conn()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO gegevens (GebruikersNaam, Wachtwoord) VALUES ('$username', '$password')";
        conn()->exec($sql);
    }
}

?>