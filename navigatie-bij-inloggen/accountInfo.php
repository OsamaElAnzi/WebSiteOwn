<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style1.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="outer-box">
        <h1>Account Info</h1>
        <p>Email: <?php echo $_GET['email'] ?>
            <a href="accVerwijderen.php?email=<?php echo $_GET['email']; ?>">
                <span class="material-symbols-outlined" style="background-color:red; border-radius:3px; color:black;">
                    delete
                </span>
            </a>
        </p>
        <a href="wijzigWachtwoord.php?email=<?php echo $_GET['email'] ?>" style="padding-bottom:10px;">Wijzig wachwoord</a>
    </div>
</body>

</html>