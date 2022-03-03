<?php require_once("Include/session.php"); ?>
<?php require_once("Include/functions.php"); ?>

<?php
    $_SESSION["User_Id"] = null; //Checking if we have a user ID active

    session_destroy(); //We destroy the session

    Redirect_To("login.php"); //Redirecting back to login page
?>