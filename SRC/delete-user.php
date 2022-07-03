<?php

if (session_status() == PHP_SESSION_NONE) {
                                   session_start();
                               }
   if(isset($_SESSION['admin'])){
                  $Uid=$_SESSION['id'];
                  if(isset($_POST['Uid']) && isset($_POST['password'])){
                  	if(!empty($_POST['Uid'])){
                      if(isset($_POST['signal'])){
                      $password=md5($_POST['password']);
                  		require_once("dbco.php");
                  		$Uoid=$_POST['Uid'];
                  		$query="SELECT count(*) FROM login where Password = '$password' and Id=$Uid ";
                  		$res=mysqli_query($dbco,$query);
                  		$row=mysqli_fetch_array($res) ;
                  		if($row['count(*)']==1){
                  		$query="UPDATE login set etat='susp' where Id = $Uoid";
                  		if(mysqli_query($dbco,$query)){
                  			echo "Ce utilisateur a été signaler";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/user.php';\",3000);</script>";
                  		}
                  		else{
                        echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/user.php';\",3000);</script>";
                  		}
                  		}else{
                        echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/user.php';\",3000);</script>";
                  		}
                    }else if(isset($_POST['annul-signal'])){
                      $password=md5($_POST['password']);
                      require_once("dbco.php");
                      $Uoid=$_POST['Uid'];
                      $query="SELECT count(*) FROM login where Password = '$password' and Id=$Uid ";
                      $res=mysqli_query($dbco,$query);
                      $row=mysqli_fetch_array($res) ;
                      if($row['count(*)']==1){
                      $query="UPDATE login set etat='active' where Id = $Uoid";
                      if(mysqli_query($dbco,$query)){
                        echo "le signal est annulé";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/user.php';\",3000);</script>";
                      }
                      else{
                        echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/user.php';\",3000);</script>";
                      }
                      }else{
                        echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/user.php';\",3000);</script>";
                      }
                    }
                  	}else{
                        echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/user.php';\",3000);</script>";
                  		}
                  }else{
                  			echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/user.php';\",3000);</script>";
                  		}
              }


?>