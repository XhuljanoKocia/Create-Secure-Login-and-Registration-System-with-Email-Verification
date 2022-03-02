<?php require_once("Include/session.php"); ?>
<?php require_once("Include/functions.php"); ?>
<?php require_once("Include/styles.css"); ?>
<?php require_once("Include/db.php"); ?>

<?php
  if(isset($_POST["Submit"])){
    $Email = mysqli_real_escape_string($Connection, $_POST["Email"]);
    $Password = mysqli_real_escape_string($Connection, $_POST["Password"]);

    if(empty($Email) || empty($Password)){
      $_SESSION["message"] = "All fields should be filled out!";
      Redirect_To("login.php");
    } else {
        $Found_Account = Login_Attempt($Email, $Password);
        if($Found_Account){
            Redirect_To("welcome.php");
        } else {
            $_SESSION["message"] = "Invalid Email or Password!";
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