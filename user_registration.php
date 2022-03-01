<?php require_once("Include/styles.css"); ?>
<<<<<<< HEAD
<?php require_once("Include/db.php"); ?>
=======
>>>>>>> d789fcea59ca735d9e18f5d8fad5eefb0d922a6b
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