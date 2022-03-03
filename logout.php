<?php require_once("Include/session.php"); ?>
<?php require_once("Include/functions.php"); ?>

<?php
    $_SESSION["User_Id"] = null; //Checking if we have a user ID active

    $ExpireTime = time() - 86400; //Setting the cookie 1 day back
    setcookie("SettingEmail", null, $ExpireTime); //Unsetting the cookie for both email and username
    setcookie("SettingName", null, $ExpireTime);

    session_destroy(); //We destroy the session

    Redirect_To("login.php"); //Redirecting back to login page
?>