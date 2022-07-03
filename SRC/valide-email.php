<?php
require_once('dbco.php');
$emessage='';
if (isset($_GET["key"]) && isset($_GET["action"]) ){
  if($_GET["action"]=="activation"){
    $key = $_GET["key"];
  $query = mysqli_query($dbco,
  "SELECT * FROM `verifier_email` WHERE `Code`='$key';");
  $row = mysqli_num_rows($query);
  if ($row==""){
  $emessage .= '<h2>Lien invalide</h2>
<p>Le lien est invalide / expiré. Soit vous n\'avez pas copié le bon lien
à partir de l\'e-mail, ou vous avez déjà utilisé la clé auquel cas elle est
désactivé.</p>';
}else{
  $row = mysqli_fetch_array($query);
  $email=$row['Email'];
  $query1="UPDATE login set verifie=1 where Email='$email'";
  $res = mysqli_query($dbco,$query1);
  if ($res){
    $emessage = 'Email verifie...';
  }else{
    $emessage='Error 404';
  }}
  }else   if($_GET["action"]=="validermodifemail"){
    if (session_status() == PHP_SESSION_NONE) {
                                   session_start();
                               }
    if(isset($_SESSION['id'])){
    $key = $_GET["key"];
  $query = mysqli_query($dbco,
  "SELECT * FROM `verifier_email` WHERE `Code`='$key';");
  $row = mysqli_num_rows($query);
  if ($row==""){
  $emessage .= '<h2>Lien invalide</h2>
<p>Le lien est invalide / expiré. Soit vous n\'avez pas copié le bon lien
à partir de l\'e-mail, ou vous avez déjà utilisé la clé auquel cas elle est
désactivé.</p>';
}else{
  $row = mysqli_fetch_array($query);
  $oldemail=$row['Email'];
  $query1="UPDATE login set Email='$oldemail' where Id=".$_SESSION['id'];
  $res = mysqli_query($dbco,$query1);
  if ($res){
    $emessage = 'Email modifier...';
  }else{
    echo $query1;
    $emessage='Error 404';
  }}} else $emessage='Error 404';

  }

  
}
  
  echo $emessage;
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/accueil.php';\",3000);</script>";
  ?>


