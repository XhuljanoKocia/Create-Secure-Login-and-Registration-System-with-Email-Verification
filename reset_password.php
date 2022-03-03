<?php require_once("Include/session.php"); ?>
<?php require_once("Include/functions.php"); ?>
<?php require_once("Include/styles.css"); ?>
<?php require_once("Include/db.php"); ?>

<?php
  if(isset($_GET['token'])){ //We check if we have a token value into our URL
    $TokenFromURL = $_GET['token']; //If we do we assing it a variable

    if(isset($_POST["Submit"])){
        $Password = mysqli_real_escape_string($Connection, $_POST["Password"]);
        $ConfirmPassword = mysqli_real_escape_string($Connection, $_POST["ConfirmPassword"]);

        //Adding some validation so the user doesn't enter false or leaving empty fields on the registration form
        if(empty($Password) || empty($ConfirmPassword)){
            $_SESSION["message"] = "All fields should be filled out!";
            } elseif($Password !== $ConfirmPassword){
            $_SESSION["message"] = "Password and confirm password do not match!";
            } elseif(strlen($Password) < 4){
            $_SESSION["message"] = "Password should be at least 4 character long!";
            } else {
            //Adding the user information into the database
            $Hashed_Password = Password_Encryption($Password); //We encrypt the password that is entered in the register form
            $Query = "UPDATE admin_panel SET password = '$Hashed_Password' WHERE token = '$TokenFromURL'"; //We make a query so that we update the active colon to ON only for the user that the url token matches with the token into the database
            $Execute = mysqli_query($Connection, $Query);

            if($Execute){
                $_SESSION["successmessage"] = "Password changed successfully!"; //If the query is good we show a success msg
                Redirect_To("login.php");
            } else {
                $_SESSION["message"] = "Something went wrong, please try again!"; // If not we show and error msg and redirect to login page
                Redirect_To("login.php");
            }
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New Password</title>
</head>
<body>
  <div>
    <?php echo Message(); ?>
    <?php echo SuccessMessage(); ?>
  </div>
  <div id="centerpage">
    <!-- We create a simple registration form -->
    <form action="reset_password.php?token=<?php echo $TokenFromURL; ?>" method="post">
      <fieldset>
        <span class="FieldInfo">New Password:</span><br><input type="password" name="Password" value=""><br>
        <span class="FieldInfo">Confirm Password:</span><br><input type="password" name="ConfirmPassword" value=""><br>
        <input type="Submit" name="Submit" value="Submit"><br>
    </form>
  </div>
</body>
</html>