<?php require_once("Include/styles.css"); ?>
<?php require_once("Include/db.php"); ?>

<?php
  //We get all the information from the user once he completes the form via POST superglobal method and use mysqli_real_escape_string to prevent sql injection
  if(isset($_POST["Submit"])){
    $Username = mysqli_real_escape_string($_POST["Username"]);
    $Email = mysqli_real_escape_string($_POST["Email"]);
    $Password = mysqli_real_escape_string($_POST["Password"]);
    $ConfirmPassword = mysqli_real_escape_string($_POST["ConfirmPassword"]);
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