
<?php
$error ='';
$gmessage='';
include('phpf/validator.php');
if(isset($_POST['submit']) && isset($_POST['email'])){
if($_POST['submit']=='Send'&& !empty($_POST['email']))
{
    //keep it inside
   $email=$_POST['email'];
    if(checkemail($email)){
     require_once('dbco.php');
    $query = mysqli_query($dbco,"SELECT * FROM login WHERE email='$email'");
    if (mysqli_num_rows($query)==1)
    {   
        require('phpf/random.php');
      $code= createRandomPassword();
        $message="Bonjour, pour changer votre mot de passe veuillez entre à ce lien <br> 
        <a href='http://Localhost/P1/reset-password.php?email=$email&key=$code&action=reset' > Lien </a>";
        require('phpf/phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer;
        $mail->Host='smtp.gmail.com';
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='hayar.h.fst@uhp.ac.ma';
        $mail->Password='HAMZA@hambh';
        $mail->addReplyTo($email);
        $mail->isHTML(true);
        $mail->setFrom($email,"my name");
        $mail->addAddress($email,"hamza");
        $mail->Subject='Password recovry';
        $mail->Body=$message;
        if(!$mail->send()){
          $error="Erreur, veuillez esseyer plus tard.";
        }
        else {$gmessage= 'email envoyé';
        $startDate = time();
        $date = date('Y-m-d H:i:s', strtotime('+1 day', $startDate));
        $query1=mysqli_query($dbco,"INSERT into reset_password VALUES ('$code','$email','0','$date')");
      }
        } else $error="Ce e-meil n'existe pas";

} else $error="Ce emeil est invalide";
}else $error="Entrez votre email";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mot de pass oublié</title>

    <!-- Font Awesome -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/loginstylef.css">
   <link rel="stylesheet" href="css/loginstyle.css">
   <link rel="stylesheet" href="css/style-accueil.css">

</head>
<body>

    <!-- Material form login -->
    
<div class="modal-wrap">

  <div class="modal-bodies">
    <div class="modal-body modal-body-step-1 is-showing">
      <a href="index.php" ><img src="image/logo1.png" alt="Logo"></a>
      <br><br>
      <div class="title">
      Mot de passe oublié</div>
      <div class="description"></div>
      <br><br>
      <form class="text-center"action="forgotpass.php" onsubmit="return ValidateEmail(document.getElementById('email').value);" method="POST">
                        <!-- Email -->
                        <div >
                            <input type="email"name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>"  placeholder="E-mail">
                        </div>
                        
                      
                      
        
        <div class="text-center">
         <button class="button"type="submit" name="submit" onclick="if(!ValidateEmail(document.getElementById('email').value)) alert('E-mail invalide');" value="Send">envoyer le lien </button>
        </div>


      </form>
   <?php

                        if($gmessage!=''){
                        ?>
                        <div class="alertg" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $gmessage;
                         ?>
                        </div>
                        <?php 
                        } if($error!=''){
                        ?>
                        <div class="alert" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $error;
                         ?>
                        </div>
                        <?php 
                        }

  ?>
    </div>

 
  </div>
</div>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
                       
          
</body>
<script src="js/validator.js" type="text/javascript"></script>
</html>








