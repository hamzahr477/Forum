<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
      <link href="css/style.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/loginstyle.css">

  
</head>

<body>
  <?php
$emessage='';
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  if(isset($_SESSION['id'])){
                header("Location: http://Localhost/P1/Accueil.php");

                      }
                        
                        ?>
      </form>
    <?php
  if(isset($_POST['submit'])){
  if(!empty($_POST['email']) && !empty($_POST['password']))
  {
    $email=htmlspecialchars($_POST["email"]);
    $password=md5($_POST['password']);
    require_once('dbco.php');
        $sqlmail="SELECT * FROM login where Email= '$email' or Login= '$email' ";
        $extmail=mysqli_query($dbco, $sqlmail);
        $mailexist=mysqli_num_rows($extmail);
      if($mailexist!=0){
            $sqlverif="SELECT * FROM login , membre_infos where login.Id=membre_infos.Id and (Email='$email' or Login= '$email' )  AND BINARY Password='$password' ";
        $extcompte=mysqli_query($dbco, $sqlverif);
        $res=mysqli_num_rows($extcompte);
            if ($res!=0) {
                $userinfo=mysqli_fetch_array($extcompte);
                if($userinfo['verifie']!=0){
                if($userinfo['Etat']!='susp'){
                if($userinfo['Type']=='admin')
                   $_SESSION['admin']=$userinfo['Login'];
                $_SESSION['id']=$userinfo['Id'];
                $_SESSION['email']=$userinfo['Email'];
                $_SESSION['Nom']=$userinfo['Nom'];
                $_SESSION['Prenom']=$userinfo['Prenom'];
                if($userinfo['premiere_inscription']!=0)
                header("Location: http://Localhost/P1/Accueil.php");
            else header("Location: http://Localhost/P1/info.php");}else{
              $emessage="Votre compte a été suspendu";
            }} else{
              $emessage="Votre email n'est pa verifier,<a href='verifie-email.php'> vérifiez votre email";
            }

            }
            else{
              $emessage="mdp ou email est incorect";
            }
        }
     else{
          $emessage="Ce compte est n'exists pas";
        }
    
  }
  elseif (empty($_POST['email'])) {
    $emessage="saisi votre email SVP!!";
  }
  elseif(empty($_POST['pass'])) {$emessage="saisire votre MDP!!";}
  else
    {$emessage="l inscription est effectué!!";}

}

  ?>
<div class="modal-wrap">

  <div class="modal-bodies">
    <div style="padding-right: 20px;padding-left: 20px ;padding-bottom: 100px;width: 500px" class="modal-body modal-body-step-1 is-showing">
          <center><a><img style="text-align: center;" src="image/logo1.png" alt="Logo"></a></center>  

      <div class="title">CONNEXION</div>
      <div class="description">Bienvenu, Connectez-vous!</div>
      <form name="f" method="POST" onsubmit ="return myValidation();" action="">
        <input type="text" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo''; ?>" placeholder="Adress mail / login"  />
        <input type="password" id="password" name="password" placeholder="Mot de passe"/>
        <div style="padding-bottom: 20px"><a href="forgotpass.php" class="mdpoubl">mot de pass oublié</a></div>
        
        <div class="text-center">
          <button type="submit" name="submit"   id="sub" value="login" style="    border: none;" class="button">Connexion</button>
            <a href="signup.php" ><div  style="border: none;" class="button">Créé un compte</div></a>
        </div>
        <?php
                        if($emessage!=''){
                        ?>
                        <div class="alert" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $emessage;
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
