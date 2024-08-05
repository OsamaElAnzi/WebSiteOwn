<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
    <?php 
    
    // Get the full URL or the path with the query string
    $fullUrl = $_SERVER['REQUEST_URI'];
    
    // Parse the URL to extract the query string (the part after ?)
    $parsedUrl = parse_url($fullUrl, PHP_URL_QUERY);
    
    // The parsed query string is your email
    $email = $parsedUrl;
    ?>
        <input type="hidden" id="email" name="email" value="<?php echo $email ?>">
        <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Nieuw wachtwoord" required>
        <input type="password" id="bevestigWachtwoord" name="bevestigWachtwoord" placeholder="Bevestig wachtwoord" required>
        <button type="submit" name="wijzigen">Wijzig wachtwoord</button>
    </form>
</body>
</html>

<?php

if (isset($_POST['wijzigen']) && $email) {
    $wachtwoord = $_POST['wachtwoord'];
    $bevestigWachtwoord = $_POST['bevestigWachtwoord'];

    if ($wachtwoord === $bevestigWachtwoord) {

        include 'DBrelated.php';
        $conn = conn();

        // Prepare the SQL query using placeholders
        $query = "UPDATE `gegevens` SET `Wachtwoord` = :wachtwoord WHERE `Email` = :email";
        $stmt = $conn->prepare($query);
        
        // Execute the prepared statement with bound parameters
        $stmt->execute([
            ':wachtwoord' => $wachtwoord,
            ':email' => $email
        ]);

        // Redirect or inform the user of the successful update
        header("Location:logIn.html?alert=3");
        echo "Wachtwoord is succesvol gewijzigd.";
    } else {
        echo "Wachtwoorden komen niet overeen.";
    }
}
?>
