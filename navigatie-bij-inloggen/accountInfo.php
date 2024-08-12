<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo $email;
} else {
    echo "Geen email opgegeven";
    exit(); // stop the script execution here to avoid potential security issues
}
?>
