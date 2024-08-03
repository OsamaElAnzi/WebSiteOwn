<?php

include 'DBrelated.php';

function acccountCheckenOfBestaat()
{
    if (isset($_POST['terug'])) {
        header('Location: index.html');
        exit();
    }
    if (isset($_POST['submitCheckIfAccountExsist'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (str_contains($email, '@')) {

            //controle of databse bestaat
            $conn = conn();
            if ($conn) {
                echo "connection successful\n";
                $stmt = $conn->prepare("SELECT * FROM gegevens WHERE Email = :email AND Wachtwoord = :password");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                if ($stmt) {
                    echo 'check voldaan van ' . $email . ' en ' . $password . "\n";
                } else {
                    echo 'Error: ' . $stmt->errorInfo();
                }
                if ($stmt->rowCount() == 1) {
                    echo $stmt->rowCount();
                    header('Location: home.php?email=' . $email);
                    exit();
                } else {
                    header('location: logIn.html?alert=1');
                }
            } else {
            echo "Database connection failed.";
            }
        } else {
            echo "$email bevat geen @";
        }
    }
}

acccountCheckenOfBestaat();
// verificatie nodig
?>