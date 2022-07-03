 <?php if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  if(isset($_SESSION['id'])){
                header("Location: http://Localhost/P1/Accueil.php");

                      }
                        
                        ?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/loginstyle.css">

  
</head>

<body>

  <?php
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
function search_for_login($dbco,$login){
  $i=1;
  $num=0;
  $login1=$login;
  $sql="SELECT Email FROM login where Login= '$login1' ";
  $estlogin=mysqli_query($dbco, $sql);
  $i=mysqli_num_rows($estlogin);
  while($i!=0){
    $login1=$login."$num";
      $sql="SELECT Email FROM login where Login= '$login1' ";
      $estlogin=mysqli_query($dbco, $sql);
      $i=mysqli_num_rows($estlogin);
    $num=$num+1;
  }

  return $login1;
  
}
  if(isset($_POST['submit'])){

    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['Telephone']) && isset($_POST['pays']) && isset($_POST['password']) && isset($_POST['cpassword'])){
      if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['Telephone']) && !empty($_POST['pays']) && !empty($_POST['password']) && !empty($_POST['cpassword']) ){
                    require_once('dbco.php');

              $email=$_POST['email'];
              $sqlmail="SELECT * FROM login where Email= '$email'";
        $extmail=mysqli_query($dbco, $sqlmail);
        $mailexist=mysqli_num_rows($extmail);
        if(ctype_alpha($_POST['nom']) && ctype_alpha($_POST['prenom'])){
        if($mailexist<1){
          $telephone=$_POST['Telephone'];
      $nom=mysqli_real_escape_string($dbco, $_POST['nom']);
      $prenom=mysqli_real_escape_string($dbco, $_POST['prenom']);
      $pays=mysqli_real_escape_string($dbco, $_POST['pays']);
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        if($password==$cpassword){
          if(validate_phone_number($telephone) == true){
              $sqlmail="SELECT Email FROM login where Email= '$email' ";
              $extmail=mysqli_query($dbco, $sqlmail);
              $mailexist=mysqli_num_rows($extmail);
              $password=md5($password);
                if($mailexist==0){
                $login=search_for_login($dbco,$nom.$prenom);
              $sql="INSERT INTO Login(Email,Login,Nom,Prenom,Password,Phone_number) VALUES('$email','$login','$nom','$prenom','$password','$telephone')";
               $res=mysqli_query($dbco, $sql);
               if($res==1){
                $sql="SELECT Id from login WHERE Login='$login'";
               $res=mysqli_query($dbco, $sql);
               $row=mysqli_fetch_array($res);
               $Id=$row['Id'];
               $sql="INSERT INTO membre_infos(Id,Pays) VALUES('$Id','$pays')";
               $res=mysqli_query($dbco, $sql);
               if($res==1){
                require_once('mailer.php');
                require_once('phpf/random.php');
                $key=createRandomPassword1();
                 $good_message= "l inscription est effectué, Nous avons envoyé un lien d'activation pour verifier votre e-mail !!";
                mailer($_POST['email'],'inscription au forum',$fname=$_POST['nom'].' '.$lname=$_POST['prenom']." bienvnue, 
                   Nous sommes heureux de vous avoir avec nous! <br>Pour verifer votre email entre en lien <a href='http://Localhost/P1/valide-email.php?key=$key&action=activation' > Lien </a> " );
                $query1=mysqli_query($dbco,"INSERT into verifier_email VALUES ('$key','$email')");
                  if(!$query1){
                    $good_message='';
                      $error_message= 'Erreur 404!!';
                    }
                }
                else{
                  $sql="DELETE FROM `login` WHERE `Login` = '$login'";
               $res=mysqli_query($dbco, $sql);
                          $error_message= "Error 404 not found!!";
                }
               }
               else{
                        $error_message= "Error 404 not found!!";
               }
               }
                else{
                  $error_message="Ce mail est deja exists <a href=\"/P1/login.php\"  class='mdpoubl' style='color:white; text-decoration:none;'>connectez-vous </a></p></CENTER>";
                }
                }
                else {
                $error_message="numero est pas valid";
                  }
              }
        else{
          $error_message="  les deux mots de passe sont pas identique";
            }
          }else $error_message="Ce e-mail est deja inscrit <a href='login.php'>Connectez vous!!</a> ";
        }else $error_message="Le nom et prenom sont invalide";

        }

      
      else{
        $error_message= "SVP!! verifiez que vous avez rempli toute les champs";
          }
        }
        else{
        $error_message= "Error 404 not found!!";
          }

        }
    ?>
  </form>
<div class="modal-wrap">

  <div class="modal-bodies">
    <div class="modal-body modal-body-step-1 is-showing">
      <div class="title">INSCRIPTION</div>
      <form action="" method="POST" onsubmit = "return myValidation();">
        <input id="nom" name="nom" type="text" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; else echo''; ?>" placeholder="Nom*"/>
        <input   id="prenom" name="prenom" type="text" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; else echo''; ?>" placeholder="Prenom*"/>
        <input  id="email" name="email" type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo''; ?>" placeholder="E-Mail*"/>
        <input  id="Telephone" name="Telephone" type="text" value="<?php if(isset($_POST['Telephone'])) echo $_POST['Telephone']; else echo''; ?>" placeholder="Telephone*"/>
        <?php
        include("country.html");
        ?>
          <input id="password" type="password" name="password" placeholder="Mot de passe*"/>
            <input id="cpassword" type="password" name="cpassword" placeholder="Confirmer le mot de passe*"/>
               <div class="col-md-4">
                        
                    </div>
        <div class="text-center">
          <button class="button" id="sub" name="submit" type="submit" value="inscri" >Inscription</button>

        </div>
        <?php
                        if(isset($error_message)){
                        ?>
                        <div class="alert" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $error_message;
                         ?>
                        </div>
                        <?php 
                        }
                        else if(isset($good_message)){
                          ?>
                          <div class="alertg" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $good_message;
                         ?>
                        </div>
                          <?php
                        }

                        ?>
      </form>
    </div>

 
  </div>
</div>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src='js/validator.js'></script>
</body>
</html>
