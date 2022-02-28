<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    //Blowfish algorithm will work only if the string is 22 or more characters long else it will output *0
    $Password = "Trunks";
    $BlowFish_Hash_Format = "$2y$10$";
    $Salt = "MYNAMEisxxhuljanokocia";

    echo "Length: ". strlen($Salt);

    $Formatting_Blowfish_With_Salt = $BlowFish_Hash_Format . $Salt;
    $Hash = crypt($Password, $Formatting_Blowfish_With_Salt);

    echo "<br>";
    echo $Hash;
  ?>
</body>
</html>