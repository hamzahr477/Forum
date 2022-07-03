<?php 
 require_once(__DIR__.'/../dbco.php');

function createRandomPassword() { 
    global $dbco ;
    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    $valide=false;
    while(!$valide){
     $key = md5(2418*2);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey; 
$query1=mysqli_query($dbco,"SELECT code from reset_password where code='$key'");
        if (mysqli_num_rows($query1)==0){
            $valide=true;
        }   
    }
    return $key; 

} 
function createRandomPassword1() { 
    global $dbco ;
    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    $valide=false;
    while(!$valide){
     $key = md5(2418*2);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey; 
$query1=mysqli_query($dbco,"SELECT Code from verifier_email where Code='$key'");
        if (mysqli_num_rows($query1)==0){
            $valide=true;
        }   
    }
    return $key; 

} 
?>