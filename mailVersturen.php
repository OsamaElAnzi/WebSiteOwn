<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
if (isset($_POST['email'])) {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'abaya4youcontact@gmail.com';                     //SMTP username
        $mail->Password   = 'kdbxnapyhbwbzimx';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('abaya4youcontact@gmail.com', 'ING BANK');
        $mail->addAddress('hamachsaliha@gmail.com', 'mama');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'ALERT!';
        $mail->Body    = 'Beste mevrouw hammach,<br>
                            er is zo juist 500EUR van uw bankrekeningnummer gepakt.<br>
                            wij vragen u vriendelijk de bank te bellen.<br>
                            met vriendelijke groet,<br>
                            ING';

        $mail->send();
        echo 'Message has been sent';
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header('Location: WWHerstelle.php');
    exit(0);
}
?>