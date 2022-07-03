<?php
require_once('verify.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Awesome -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/loginstylef.css">

</head>
<script>
  function ValidateLength(inputText,max,min) {
  
    if (inputText.length>max) {
        return false;
    }else if (inputText.length<min) {
        return false;
    }else return true;
};
function myValidation(){
var password=document.getElementById("password").value;
if(ValidateLength(password,16,8)){
  return true;
}
else
{
  alert("Mot de passe entre 8 et 16 caractére");
  
}
return false
;

};



</script>
<body>
  <?php
  $Id=$_SESSION['id'];
  $good_message='';
  $emessage='';
  if(isset($_POST['submit'])){
    
    
  if(!empty($_POST['apassword']) && !empty($_POST['password']) && !empty($_POST['cpassword']))
  {
    
    $password=md5($_POST['apassword']);
    require_once('dbco.php');
        $query1="SELECT count(*) FROM login where Password='$password' and Id=$Id";
        $resultats=mysqli_query($dbco, $query1);
        $donnee=mysqli_fetch_array($resultats);
      if ($donnee['count(*)']==1) {

        if ($_POST['password'] == $_POST['cpassword']) {
          $Password1=md5($_POST['password']);

          $query="UPDATE `login` SET `Password` = '$Password1' WHERE `login`.`Id` = $Id";
                              if(!mysqli_query($dbco, $query)){
                              $emessage= "error not found";
                             }
              else

                $good_message="Le mot de passe bien changer";

        
      }
      else
      {

        $emessage= "les deux nouveau mot de passe ne sont pas identique";
      }
    }
    else
    {

      $emessage= "L'ancien mot de passe n'est pas correcte";
    }

        
      }
      else
      {
       $emessage= "Tout les champs doivent etre remplie";
      }
    }
  
  ?>
 
      <!-- Material form register -->
  <div class="modal-wrap">

  <div class="modal-bodies">
    <div class="modal-body modal-body-step-1 is-showing">
      <a  ><img src="image/logo1.png" alt="Logo"></a>
      <br><br>
      <div class="title">
    
      Neauveau mot de passe</div>
      <div class="description">Changer votre  mot de passe!</div>
      <br>

                        <!-- Form -->
                        <form class="text-center"  id="initial" method="POST" onsubmit = "return myValidation();">
                   
                        
                            <div class="form-row">
                                <div class="col">

                            <!-- Password -->
                            <div class="md-form">
                                <input type="password" name="apassword" class="form-control" placeholder="Entrer l'ancien Mot de Passe" >
                                
                            </div>
                            <div class="md-form">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nouveau Mot de Passe">
                                
                            </div>
                            <div class="md-form">
                              <input type="password" name="cpassword"  class="form-control" placeholder="Confirmer le Nouveau Mot de Passe">
                            </div>
                            <!-- Sign up button -->
                            <button class="button " type="submit" name="submit">Enregistrer</button>
                            <!-- Social register -->
                         
                            <!-- Terms of service -->
                            </div>
               
        <?php
                          if(!empty($emessage)){

                        ?>
                        <div class="alert" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $emessage;
                         ?>
                        </div>
                        <?php 
                        }
                          if(!empty($good_message)){
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
                        <!-- Form -->
                    </div>
                    <div class="text-center">
                
                
              <a class="button"  style="text-decoration: none" href="user_question.php" >Retoure</a>
             
              </div>
                </div>
                <!-- Material form register -->
            </div>
        </div>
    </div>

</body>
</html>

