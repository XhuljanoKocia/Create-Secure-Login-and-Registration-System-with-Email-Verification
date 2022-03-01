<?php
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
?>