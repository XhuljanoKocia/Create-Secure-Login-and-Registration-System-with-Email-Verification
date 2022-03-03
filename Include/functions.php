<?php require_once("Include/db.php"); ?>
<?php
  //Redirect function
  function Redirect_To($NewLocation){
    header("Location: " . $NewLocation);
    exit;
  }

  //Password encryption using blowfish algorithm
  function Password_Encryption($Password){
    $BlowFish_Hash_Format = "$2y$10$";
    $Salt_Length = 22;
    $Salt = Generate_Salt($Salt_Length);
    $Formatting_Blowfish_With_Salt = $BlowFish_Hash_Format . $Salt;
    $Hash = crypt($Password, $Formatting_Blowfish_With_Salt);
    return $Hash;
  }
  
  function Generate_Salt($length){
    $Unique_Random_String = md5(uniqid(mt_rand(), true));
    $Base64_String = base64_encode($Unique_Random_String);
    $Modified_Base64_String = str_replace('+', '.', $Base64_String);
    $Salt = substr($Modified_Base64_String, 0, $length);
    return $Salt;
  }

  function Password_Check($Password, $Existing_Hash){
    $Hash = crypt($Password, $Existing_Hash);
    if($Hash === $Existing_Hash){
      return true;
    } else {
      return false;
    }
  }

  //We control if the email entered in the registration form already exists in out database or not
  function CheckEmail($Email){
    global $Connection;
    $Query = "SELECT * FROM admin_panel WHERE email = '$Email'";
    $Execute = mysqli_query($Connection, $Query);
    if(mysqli_num_rows($Execute) > 0){
      return true;
    } else {
      return false;
    }
  }

  //Login function, checking if the email and password match with our database
  function Login_Attempt($Email, $Password){
    global $Connection;
    $Query = "SELECT * FROM admin_panel WHERE email = '$Email'"; //We select the data from the database using the email parameter
    $Execute = mysqli_query($Connection, $Query);
    if($admin = mysqli_fetch_assoc($Execute)){ //We fetch all the data from the database reguarding that email address and assign it to a variable $admin
      if(Password_Check($Password, $admin["password"])){ //We can verify the password from the $admin variable superglobal that we got from the email
        return $admin;
      }
    } else {
      return null;
    }
  }

  //Checking if we have any user on the database that has the value of active ON
  function ConfirmingAccountActiveStatus(){
    global $Connection;
    $Query = "SELECT * FROM admin_panel WHERE active = 'ON'";
    $Execute = mysqli_query($Connection, $Query);
    if(mysqli_num_rows($Execute) > 0){
      return true;
    } else {
      return false;
    }
  }

  function login(){
    if(isset($_SESSION["User_Id"])){ //Checking if we have a user ID session open
      return true;
    }
  }

  function Confirm_Login(){
    if(!login()){
      $_SESSION["message"] = "You have to Login!"; //If we don't have a user ID we redirect them to login page so that they can't access anything without loging in
      Redirect_To("login.php");
    }
  }
?>