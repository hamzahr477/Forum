<?php
$error ='';
$gmessage='';
include('phpf/validator.php');
if(isset($_POST['submit']) && isset($_POST['email'])){
if($_POST['submit']=='verifier-email'&& !empty($_POST['email']))
{ //keep it inside
    $email=htmlspecialchars($_POST["email"]);
    if(checkemail($email)){
     require_once('dbco.php');
    $query = mysqli_query($dbco,"SELECT * FROM login WHERE email='$email'");
    if (mysqli_num_rows($query)==1)
    {   
        require('phpf/random.php');
      $code= createRandomPassword1();
        $message="Bonjour, pour verifier votre compte veuillez entre à ce lien <br> 
        <a href='http://Localhost/P1/valide-email.php?key=$code&action=activation' > Lien </a>";
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
        $mail->Subject="Verifier l'email";
        $mail->Body=$message;
        if(!$mail->send()){
          $error="Erreur, veuillez esseyer plus tard.";
        }
        else {
        $startDate = time();
        $query1=mysqli_query($dbco,"INSERT into verifier_email VALUES ('$code','$email')");
        if($query1){
        	$gmessage= 'Le lien d\'activation a été envoyé.' ;
        }
        else $error= 'Erreur 404!!' ;

      }
        } else $error="Ce e-meil n'esiste pas";

} else $error="Ce emeil est invalide";
}else $error="Entrez votre email";
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Ask Me</title>
      <link href="css/style.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/loginstyle.css">

  
</head>

<body>

<div class="modal-wrap">

  <div class="modal-bodies">
    <div style="padding-right: 20px;padding-left: 20px ;padding-bottom: 100px;width: 500px" class="modal-body modal-body-step-1 is-showing">
          <center><a><img style="text-align: center;" src="image/logo1.png" alt="Logo"></a></center>  

      <div class="title">VERIFICATION</div>
      <div class="description">Pour verifier votre e-mail</div>
      <form name="f" method="POST" onsubmit ="return myValidation();" action="">
        <input type="text" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo''; ?>" placeholder="Adress mail "  />
        
        <div class="text-center">
          <button type="submit" name="submit" id="sub" value="verifier-email" style="    border: none;" class="button">Envoyer</button>
        </div>
        <?php
                        if($error!=''){
                        ?>
                        <div class="alert" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $error;
                         ?>
                        </div>
                        <?php 
                        }if($gmessage!=''){
                        ?>
                        <div class="alertg" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $gmessage;
                         ?>
                        </div>
                        <?php 
                        }
                        ?>
      </form>
    </div>
  </div>
</div>


      <script src='js/validator.js'>

           </script>


</body>
</html>
