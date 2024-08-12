<?php

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="./style/navigatie.css">
</head>
<body>
    <nav>
        <a href="home.php?email=<?php echo $email;?>"><span class="material-symbols-outlined">home</span></a> 
        <a href="./navigatie-bij-inloggen/accountInfo.php?email=<?php echo $email ?>"><span class="material-symbols-outlined">account_circle</span></a><!-- info over je account. mogelijkheden: delete acc 1/1, change email 1/0, change password 1/0  -->
        <a href="logUit.php"><span class="material-symbols-outlined">logout</span></a> <!-- uitloggen zoals normaal 1/0 -->
        <a href="#"><span class="material-symbols-outlined">search</span></a> <!-- hier foto's opzoeken 1/0 -->
        <a href="#"><span class="material-symbols-outlined">help_outline</span></a> <!-- hier uitleg met hover of klik maar met javascript 1/0-->
        <a href="settings.php"><span class="material-symbols-outlined">settings </span></a> <!-- overzicht over wat je allemaal kan doen -->
    </nav>
    <div id="container">
        <p>welkom <?php echo $email;?></p>
    </div>
</body>
</html>