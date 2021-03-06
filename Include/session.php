<?php
  session_start();

  //Creating a function so we can call it everytime we have an error message for the user filling the registration form
  function Message(){
    if(isset($_SESSION["message"])){
      $Output = "<div class=\"message\">";
      $Output .= htmlentities($_SESSION["message"]);
      $Output .= "</div>";
      $_SESSION["message"] = null;
      return $Output;
    }
  }

  //We add a new function to create a new style for the success message
  function SuccessMessage(){
    if(isset($_SESSION["successmessage"])){
      $Output = "<div class=\"successmessage\">";
      $Output .= htmlentities($_SESSION["successmessage"]);
      $Output .= "</div>";
      $_SESSION["successmessage"] = null;
      return $Output;
    }
  }
?>