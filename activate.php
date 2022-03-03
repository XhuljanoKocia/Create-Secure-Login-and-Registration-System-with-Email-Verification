<?php require_once("Include/session.php"); ?>
<?php require_once("Include/functions.php"); ?>
<?php require_once("Include/db.php"); ?>

<?php
    global $Connection;
    if(isset($_GET['token'])){ //We check if we have a token value into our URL
        $TokenFromURL = $_GET['token']; //If we do we assing it a variable
        $Query = "UPDATE admin_panel SET active = 'ON' WHERE token = '$TokenFromURL'"; //We make a query so that we update the active colon to ON only for the user that the url token matches with the token into the database
        $Execute = mysqli_query($Connection, $Query);

        if($Execute){
            $_SESSION["successmessage"] = "Account activated successfully!"; //If the query is good we show a success msg
            Redirect_To("login.php");
        } else {
            $_SESSION["message"] = "Something went wrong, please try again!"; // If not we show and error msg and redirect to registration page
            Redirect_To("user_registration.php");
        }
    }
?>