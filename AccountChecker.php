<?php
include 'DBrelated.php';

function acccountCheckenOfBestaat() {
    if (isset($_POST['submitCheckIfAccountExsist'])) {
        $username = $_POST['username/e-mail'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM gegevens WHERE username = '$username' AND password = '$password'";
        $conn = conn();
        
        // maak login verificatie  
    }
}
acccountCheckenOfBestaat();
?>