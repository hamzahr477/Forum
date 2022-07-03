<?php

if (session_status() == PHP_SESSION_NONE) {
                                   session_start();
                               }
   if(isset($_SESSION['id'])){
                  $Uid=$_SESSION['id'];
                  if(isset($_POST['delete-post']) && isset($_POST['Pid'])){
                  	if(!empty($_POST['Pid'])){
                  		require_once("dbco.php");
                  		$Pid=$_POST['Pid'];
                  		$query="SELECT count(*) FROM post where Id_Post = $Pid and Id_User=$Uid ";
                  		$res=mysqli_query($dbco,$query);
                  		$row=mysqli_fetch_array($res) ;
                  		if($row['count(*)']==1  || isset($_SESSION['admin'])){
                  		$query="DELETE  FROM post where Id_Post = $Pid";
                  		if(mysqli_query($dbco,$query)){
                  			echo "Suprimé";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/accueil.php';\",3000);</script>";
                  		}
                  		else{
                  			echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/accueil.php';\",3000);</script>";
                  		}
                  		}else{
                  			echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/accueil.php';\",3000);</script>";
                  		}
                  	}else{
                  			echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/accueil.php';\",3000);</script>";
                  		}
                  }else{
                    if(isset($_GET['Action']) && isset($_GET['Cid'])){
                    if(!empty($_GET['Cid']) && $_GET['Action']=='commentdelete'){
                      require_once("dbco.php");
                      $Cid=$_GET['Cid'];
                      $Pid=$_GET['Pid'];
                      $href="http://localhost/P1/post-deatils.php?qst_id=$Pid";
                      $query="SELECT count(*) FROM commentaires where Id_Commantaire = $Cid and Id_User=$Uid ";
                      $res=mysqli_query($dbco,$query);
                      $row=mysqli_fetch_array($res) ;
                      if($row['count(*)']==1  || isset($_SESSION['admin'])){
                      $query="DELETE  FROM commentaires where Id_Commantaire = $Cid";
                      if(mysqli_query($dbco,$query)){
                        echo "Suprimé";
echo "<script>setTimeout(\"location.href = '$href';\",3000);</script>";
                      }
                      else{
                        echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = '$href';\",3000);</script>";
                      }
                      }else{
                        echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = '$href';\",3000);</script>";
                      }
                    }else{
                        echo "Il y a un probléme, veuillez réessayer plus tard";
                        echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/accueil.php';\",3000);</script>";

                      }
                  }else{
                        echo "Il y a un probléme, veuillez réessayer plus tard";
                        echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/accueil.php';\",3000);</script>";

                      }
                  }
              }
              else {

                        echo "Il y a un probléme, veuillez réessayer plus tard";
echo "<script>setTimeout(\"location.href = 'http://Localhost/P1/accueil.php';\",3000);</script>";
                      
              }

        


?>