<?php require_once("Include/session.php"); ?>
<?php require_once("Include/functions.php"); ?>
<?php Confirm_Login(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php
        //We check all the information we got from the login page
        echo "My id is " . $_SESSION["User_Id"] . "with the name of " . $_SESSION["User_Name"] . "with the email" . $_SESSION["User_Email"];
    ?>

    <h1>Welcome</h1>
    <a href="logout.php">Logout Now</a>
</body>
</html>