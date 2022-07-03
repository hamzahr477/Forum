<?php

   function checkemail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
   }
   else{
     return FALSE;
   }
   }
  
  function validStrLen($str, $min, $max){
    $len = strlen($str);
    if($len < $min){
        return FALSE;
    }
    elseif($len > $max){
        return FALSE;
    }
    return TRUE;
}

function validate_phone_number($phone)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }
}

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d;
};
function checkpassword($password,$Id){
    require('dbco.php');
    $query="SELECT Id from login where Id=$Id and BINARY Password='$password'";
    $sqlres=mysqli_query($dbco, $query);
    $passcorrect=mysqli_num_rows($sqlres);
    if($passcorrect==1){
        return TRUE;
    }
    return FALSE;
};
function checkemailalradyexist($email,$Id){
    require('dbco.php');
    $query="SELECT count(*) from login where Email='$email' and  Id NOT IN ('$Id')";

    $sqlres=mysqli_query($dbco, $query);
    $sqlres=mysqli_fetch_array($sqlres);
    $passcorrect=$sqlres['count(*)'];
    if($passcorrect>0){
        return FALSE;
    }
    return TRUE;
}


?>

