<?php

include 'DBrelated.php';

function acccountCheckenOfBestaat() {
    if (isset($_POST['submitCheckIfAccountExsist'])) {
        $username = $_POST['username/e-mail'];
        $password = $_POST['password'];
        
        //controle of databse bestaat
        $conn = conn();
        
        if ($conn) {
            echo "connection successful\n";
            $stmt = $conn->prepare("SELECT * FROM gegevens WHERE GebruikersNaam = :username AND Wachtwoord = :password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            if ($stmt) {
                echo 'check voldaan van ' . $username . ' en ' . $password . "\n";
            } else {
                echo 'Error: '. $stmt->errorInfo();
            }
            if ($stmt->rowCount() == 1) {
                echo $stmt->rowCount();
                header('Location: home.php?username='.$username);
                exit();
            } else {
                echo 'test fout';
            }
        } else {
            echo "Database connection failed.";
        }
    }
}

acccountCheckenOfBestaat();
// verificatie nodig
?>