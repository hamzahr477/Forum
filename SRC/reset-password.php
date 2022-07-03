<?php
require_once('dbco.php');
$gmessage='';
$emessage='';
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) 
 && $_GET["action"]=="reset"){
  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $query = mysqli_query($dbco,
  "SELECT * FROM `reset_password` WHERE `Code`='$key' and `Email`='$email' and resete='0';");
  $row = mysqli_num_rows($query);
  if ($row==""){
  $emessage .= '<h2>Lien invalide</h2>
<p>Le lien est invalide / expiré. Soit vous n\'avez pas copié le bon lien
à partir de l\'e-mail, ou vous avez déjà utilisé la clé auquel cas elle est
désactivé.</p>
<p><a href="forgotpass.php">
Cliquez ici </a> pour réinitialiser le mot de passe.</p>';

 }else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau mot de passe</title>

    <!-- Font Awesome -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/loginstylef.css">
   <link rel="stylesheet" href="css/loginstyle.css">

</head>
<body>
  <div class="modal-wrap">

  <div class="modal-bodies">
    <div class="modal-body modal-body-step-1 is-showing">
      <a href="index.php" ><img src="image/logo1.png" alt="Logo"></a>

      <div class="title">
      Neauveau mot de passe</div>
      <div class="description"><?php
      if(empty($email)){
         echo"veillez entrer un nuaveau mot de passe";
      } else echo "remplire tous les champs"; ?></div>
      <br>
  <form class="text-center" method="post" onsubmit="return document.getElementById('pass1').value==document.getElementById('pass2').value;" action=""  name="update">
  <input type="hidden" name="action" value="update" />
  <br >
  <input type="password" id="pass1" name="pass1" placeholder="Entrez le nouveau mot de passe" maxlength="15" required />
  <input type="password" id="pass2" name="pass2" placeholder="Rentrez mot de passe" maxlength="15" required/>
  <br >
  <input type="hidden" name="email" value="<?php echo $email;?>"/>
  <input type="hidden" name="key" value="<?php echo $key;?>"/>
  <input class="button" type="submit" onclick="if(document.getElementById('pass1').value!=document.getElementById('pass2').value) alert('Les deux mots de passe ne sont pas identique')" value="Modifier le mot de passe" />
  </form>
<?php
}else{
$emessage = "<h2>Ce lien a été expiré</h2>
<p>Le lien a expiré. Vous essayez d'utiliser le lien expiré qui
comme valable seulement 24 heures (1 jours après la demande).<br /><br /></p>";
            }
      }
if($emessage!=""){
  echo "<div class='error'>".$emessage."</div><br />";
  } 
} // isset email key validate end
 

if(isset($_POST["email"]) && isset($_POST["action"]) &&
 ($_POST["action"]=="update") && isset($_POST["key"])) {
   $Key=$_POST["key"];
  $query = mysqli_query($dbco,
  "SELECT * FROM `reset_password` WHERE `Code`='".$Key."' and `Email`='".$email."';"
  );
  $row = mysqli_num_rows($query);
  if ($row==""){
    $error='Erreur 404!!';
  }else{
    $error="";
$pass1 = mysqli_real_escape_string($dbco,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($dbco,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
$len= strlen($pass1);
if($len<8 || $len>20){
  $emessage.= "<p>Le mot de passe doit étre entre 8 et 20 carractére<br /><br /></p>";
}
else if ($pass1!=$pass2 ){
$emessage.= "<p>Les deux mots de passe ne sont pas identique<br /><br /></p>";
  }
  else{
$pass1 = md5($pass1);
$res= mysqli_query($dbco,"UPDATE login SET Password='$pass1' WHERE Email='$email'");
if($res){
  $gmessage="Votre mot de passe a été modifie <a href='login.php' >Connexion</a>";
  mysqli_query($dbco,"UPDATE `reset_password` SET resete=1 WHERE `Code`='".$Key."';");

}

 
 
   } 
  }

}
?>
<?php
                        if($emessage!=''  && isset($_POST["action"]) && ($_POST["action"]=="update")){
                        ?>
                        <div style="height: 40px" class="alert" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $emessage;
                         ?>
                        </div>
                        <?php 
                        }else if($gmessage!='' && isset($_POST["action"]) && ($_POST["action"]=="update") ){

                        ?>
                        <div style="height: 40px" class="alertg" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $gmessage;
                         ?>
                         <?php } ?>
      </div>
    </div>
  </div>
</div>
</body>
