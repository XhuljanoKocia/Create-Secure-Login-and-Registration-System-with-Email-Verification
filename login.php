<?php require_once("Include/session.php"); ?>
<?php require_once("Include/functions.php"); ?>
<?php require_once("Include/styles.css"); ?>
<?php require_once("Include/db.php"); ?>

<?php
  //Getting the email and password value entered on submit form
  if(isset($_POST["Submit"])){
    $Email = mysqli_real_escape_string($Connection, $_POST["Email"]);
    $Password = mysqli_real_escape_string($Connection, $_POST["Password"]);

    //Checking if any of the fields is empty
    if(empty($Email) || empty($Password)){
      $_SESSION["message"] = "All fields should be filled out!";
      Redirect_To("login.php");
    } else {
        if(ConfirmingAccountActiveStatus()){ //Only the users who have the active status to ON can login
          $Found_Account = Login_Attempt($Email, $Password); //If fields aren't empty and email and password are correct we redirect the user to welcome page
          if($Found_Account){
              $_SESSION["User_Id"] = $Found_Account['id']; //We user session superglobal to access all the user information from the database so that we can access them on the welcome page
              $_SESSION["User_Name"] = $Found_Account['username'];
              $_SESSION["User_Email"] = $Found_Account['email'];

              Redirect_To("welcome.php");
          } else {
              $_SESSION["message"] = "Invalid Email or Password!"; //If any of the fields don't match we redirect the user to the login page again showing a message
              Redirect_To("login.php");
          }
        } else {
          $_SESSION["message"] = "Account confirmation required!"; //If the account confirmation is not done we redirect the user to the login page again showing a message
          Redirect_To("login.php");
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
  <title>Login</title>
</head>
<body>
  <div>
    <?php echo Message(); ?>
    <?php echo SuccessMessage(); ?>
  </div>
  <div id="centerpage">
    <!-- We create a simple login form -->
    <form action="login.php" method="post">
      <fieldset>
        <span class="FieldInfo">Email:</span><br><input type="email" name="Email" value=""><br>
        <span class="FieldInfo">Password:</span><br><input type="password" name="Password" value=""><br>
        <input type="Submit" name="Submit" value="Login"><br>
    </form>
  </div>
</body>
</html>