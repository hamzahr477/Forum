<?php
if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
require_once('dbco.php');
if(isset($_SESSION['id'])){
$user_Id=$_SESSION['id'];
	$setuserinscri1="select premiere_inscription from membre_infos where id=$user_Id";
	$resul1=mysqli_query($dbco,$setuserinscri1);
	$premierinscri=mysqli_fetch_array($resul1);
	if($premierinscri['premiere_inscription']==0){
	$setuserinscri1="update membre_infos set premiere_inscription=1 where Id=$user_Id";
		$resul1=mysqli_query($dbco,$setuserinscri1);

	}
}


?>