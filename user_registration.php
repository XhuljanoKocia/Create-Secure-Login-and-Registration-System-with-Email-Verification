<?php require_once("Include/session.php"); ?>
<?php require_once("Include/functions.php"); ?>
<?php require_once("Include/styles.css"); ?>
<?php require_once("Include/db.php"); ?>

<?php
  //We get all the information from the user once he completes the form via POST superglobal method and use mysqli_real_escape_string to prevent sql injection
  if(isset($_POST["Submit"])){
    $Username = mysqli_real_escape_string($Connection, $_POST["Username"]);
    $Email = mysqli_real_escape_string($Connection, $_POST["Email"]);
    $Password = mysqli_real_escape_string($Connection, $_POST["Password"]);
    $ConfirmPassword = mysqli_real_escape_string($Connection, $_POST["ConfirmPassword"]);

    //Adding some validation so the user doesn't enter false or leaving empty fields on the registration form
    if(empty($Username) && empty($Email) && empty($Password) && empty($ConfirmPassword)){
      $_SESSION["message"] = "All fields should be filled out!";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Now</title>
</head>
<body>
  <div><?php echo Message(); ?></div>
  <div id="centerpage">
    <!-- We create a simple registration form -->
    <form action="user_registration.php" method="post">
      <fieldset>
        <span class="FieldInfo">Username:</span><br><input type="text" name="Username" value=""><br>
        <span class="FieldInfo">Email:</span><br><input type="email" name="Email" value=""><br>
        <span class="FieldInfo">Password:</span><br><input type="password" name="Password" value=""><br>
        <span class="FieldInfo">Confirm Password:</span><br><input type="password" name="ConfirmPassword" value=""><br>
        <input type="Submit" name="Submit" value="Register"><br>
    </form>
  </div>
</body>
</html>