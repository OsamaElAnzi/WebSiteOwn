<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    include 'DBrelated.php';
    $conn = conn();
    if ($conn === null) {
        echo "Failed to connect to the database.";
        return;
    }
    try {
        $checkQuery = "SELECT COUNT(*) FROM gegevens WHERE Email = :email";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch the count of rows matching the given email
        $rowCount = $stmt->fetchColumn();
// test
        if ($rowCount > 0) {
            //de email bestaat hier word het wachtwoord geupdated 
            $mail = new PHPMailer(true);
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'osamaelanzi0@gmail.com';                     //SMTP username
            $mail->Password   = 'hszlizomsjbnpnbl';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('osamaelanzi0@gmail.com', 'Osama El Anzi');
            $mail->addAddress($email, $email);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nieuw wachtwoord aanmaken';
            $mail->Body    = 'Hi,<br>
                                Maak hier uw nieuwe wachtwoord aan.<br>
                                <a href="http://localhost/WebSiteOwn/wijzigWachtwoord.php?'.$email.'">Maak aan!<a>';

            $mail->send();
            echo 'Message has been sent';
        } elseif ($rowCount == 0) {
            //email bestaat niet 
            header("Location: AanMaakAcc.html?alert=2");
            exit();
        } 
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    //Create an instance; passing `true` enables exceptions
    
} else {
    header('Location: WWHerstellen.html');
    exit(0);
}
