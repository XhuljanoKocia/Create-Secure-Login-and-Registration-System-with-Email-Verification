<?php require_once("Include/session.php"); ?>
<?php require_once("Include/functions.php"); ?>
<?php require_once("Include/styles.css"); ?>
<?php require_once("Include/db.php"); ?>

<?php
  //We get all the information from the user once he completes the form via POST superglobal method and use mysqli_real_escape_string to prevent sql injection
  if(isset($_POST["Submit"])){
    $Email = mysqli_real_escape_string($Connection, $_POST["Email"]);

    //Adding some validation so the user doesn't enter false or leaving empty fields on the forgot password form
    if(empty($Email)){
      $_SESSION["message"] = "Email Required!";
      Redirect_To("recover_account.php");
    } elseif(!CheckEmail($Email)){
      $_SESSION["message"] = "This Email is not found!";
      Redirect_To("user_registration.php");
    } else {
      $Query = "SELECT * FROM admin_panel WHERE email = '$Email'"; //We check if the email entered exists in our database
      $Execute = mysqli_query($Connection, $Query);

      //We fetch all the data of that user if the email does exists
      if($admin = mysqli_fetch_array($Execute)){
        $admin["username"];
        $admin["token"];

        $subject = "Reset Password";
        $body = 'Hi ' . $admin["username"] . ', here is the link to reset your password http://localhost/login-and-register/user_registration/reset_password.php?token='.$admin["token"];
        $senderEmail = "From:gyroballtrunks@gmail.com";
        if(mail($Email, $subject, $body, $senderEmail)){
          $_SESSION["successmessage"] = "Check Email for Reset Link!";
          Redirect_To("login.php");
        } else {
          $_SESSION["message"] = "Something went wrong, please try again!";
          Redirect_To("user_registration.php");
        }
      } else {
        $_SESSION["message"] = "Something went wrong, please try again!";
        Redirect_To("user_registration.php");
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
  <title>Forgot Password</title>
</head>
<body>
  <div>
    <?php echo Message(); ?>
    <?php echo SuccessMessage(); ?>
  </div>
  <div id="centerpage">
    <!-- We create a simple registration form -->
    <form action="recover_account.php" method="post">
      <fieldset>
        <span class="FieldInfo">Email:</span><br><input type="email" name="Email" value=""><br>
        <input type="Submit" name="Submit" value="Submit"><br>
    </form>
  </div>
</body>
</html>