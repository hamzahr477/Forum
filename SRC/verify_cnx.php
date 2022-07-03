<?php

 if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  if(isset($_SESSION['id'])){
  require_once('dbco.php');
  $Uid=$_SESSION['id'];
  $verifier_susp="select Etat from login where Id=$Uid";
  $res=mysqli_query($dbco,$verifier_susp);
  $res=mysqli_fetch_array($res);
    if($res['Etat']=='susp'){
      session_unset();
      session_destroy();
      echo "<dialog>
      Erreur, veuillez actualiser
      <a href='/P1/'><input type='button' value='Close' /></a>
    </dialog>";
      }
      }


?>