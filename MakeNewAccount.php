<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("rainwater.jpg");
            /* Voeg hier je afbeeldingspad toe */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(15px);
            /* Pas de vervaging aan naar wens */
            z-index: -1;
            /* Plaatst het pseudo-element achter de andere inhoud */
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
        h3 {
            background-color: white;
            color: black;
            opacity: 0.5;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>


    <div class="loader"></div>
    <h3>Bezig met je account...</h3>

</body>

</html>
<?php
include 'DBrelated.php';

function makeAccount()
{
    if (isset($_POST['aanMakenVanAccount'])) {
        
        // Retrieve and sanitize input
        $username = $_POST['username/e-mail'];
        $password = $_POST['password']; // Assuming password is already validated elsewhere

        // Check for empty fields
        if (empty($username) || empty($password)) {
            echo "Username and password cannot be empty.";
            return;
        }

        // Hash the password
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Add database connection and insert new account data here
        $conn = conn();
        if ($conn === null) {
            echo "Failed to connect to the database.";
            return;
        }
        try {
            $checkQuery = "SELECT COUNT(*) FROM gegevens WHERE GebruikersNaam = :username";
            $stmt = $conn->prepare($checkQuery);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
    
            // Fetch the count of rows matching the given username
            $rowCount = $stmt->fetchColumn();
    // test
            if ($rowCount > 0) {
                header("Location: AanMaakAcc.html?alert=1");
                exit();
            } else {
                // Prepare the INSERT query
                $insertQuery = "INSERT INTO gegevens(GebruikersNaam, Wachtwoord) VALUES (:username, :password)";
                $stmt = $conn->prepare($insertQuery);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
    
                // Execute the INSERT query
                $stmt->execute();
                header('Refresh:5; url=LogIn.html', true, 303);
            } 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
       
    }
}
makeAccount();
?>