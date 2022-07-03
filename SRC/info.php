<?php
// On démarre la session AVANT d'écrire du code HTML
require_once('verify.php');
 
?>
 
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Informations personnelles</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/loginstyle.css">
      <link rel="stylesheet" href="css/style.css">


  
</head>

<body onload='document.form1.Email.focus()'>
   <?php
   require_once('dbco.php');
   require('phpf/uploadimg.php');
   require('phpf/validator.php');  
    //requête d'affichage
   $Id=$_SESSION['id'];
    $query1 = "SELECT login.Id, Login, Email, Nom,Prenom ,Phone_number ,Date_singup  ,'Date_de_naissance' ,Pays, Ville,Etablissement ,Sexe ,Email_visible ,description, premiere_inscription FROM login , membre_infos where login.Id=$Id and login.Id=membre_infos.Id ";
    $resultats=mysqli_query($dbco,$query1);
    $donnees=mysqli_fetch_array($resultats);
    //traiteme 
    $emessage='';
    $good_message='';
 if(isset($_POST['submit1'])){
    if(isset($_POST['sexe']) && isset($_POST['ville']) && isset($_POST['daten']) && isset($_POST['etablissement'])){

      if(!empty($_POST['sexe']) && !empty($_POST['ville']) && !empty($_POST['daten']) && !empty($_POST['etablissement'])){

        $date=$_POST['daten'];
        $sexe=$_POST['sexe'];
        $ville=$_POST['ville'];
        $etablissement=$_POST['etablissement'];
        if(isset($_POST['descriptif'])){
          $description=$_POST['descriptif'];
        }
        if(validateDate($date)){
          if(strlen($ville)>2 || strlen($ville)<40){
            if(strlen($etablissement)>2 || strlen($etablissement)<40){
              $query="UPDATE `membre_infos` SET  `Date_de_naissance` = '$date', `Ville` = '$ville', `Etablissement` = '$etablissement', `Sexe` = '$sexe', `description` = '$description', `premiere_inscription` = '1' WHERE `membre_infos`.`Id` = $Id";
                             $res=mysqli_query($dbco, $query);
                             if($res!=1){
                              $emessage="error note found $res";
                             }
                             else{
                              $emessage=uploadimg($Id);
                              if($emessage=='TRUE'){
                                $emessage='';
                               header("Location: http://Localhost/P1/");
                              }
                              } 
            }
            else $emessage="Nom d'etablissement doit etre sup à 1 et inf à 40 ";

        } else $emessage="la date est incorrect! ";
       }else $emessage="le chemp de ville doit etre sup à 1 et inf à 40 ";
      }else $message="SVP remplisez tout les champs requis";
    }
  }
  else  if(isset($_POST['submit2'])){
    $res=!empty($_POST['ville']);
    if(isset($_POST['sexe']) && isset($_POST['ville']) && isset($_POST['daten']) && isset($_POST['etablissement']) && isset($_POST['email']) && isset($_POST['num']) && isset($_POST['pays']) && isset($_POST['password'])){

      if(!empty($_POST['sexe']) && !empty($_POST['email']) && !empty($_POST['num']) && !empty($_POST['pays']) && !empty($_POST['password'])){
        $date=$_POST['daten'];
        $sexe=$_POST['sexe'];
        $ville=$_POST['ville'];
        $etablissement=$_POST['etablissement'];
        $telephone=$_POST['num'];
        $email=$_POST['email'];
        $pays=$_POST['pays'];
        $password=md5($_POST['password']);
        if(isset($_POST['descriptif'])){
          $description=$_POST['descriptif'];
        }
        if(checkemail($email) && checkemailalradyexist($email,$Id)){
          $sql_query=mysqli_query($dbco,"SELECT COUNT(*) FROM login where Email='$email'");
          $exist=mysqli_fetch_array($sql_query);
          $gmessage='';
          if($exist['COUNT(*)']==0){
            require_once('mailer.php');
            require('phpf/random.php');
            $key=createRandomPassword1();
            if(!mailer($email,"Activation d'email","Bonjour, pour valider la modification de votre cliquez sur ce <a href='http://Localhost/P1/valide-email.php?key=$key&action=validermodifemail'>LIEN</a>")){
          $error="Erreur, veuillez esseyer plus tard.";
                                              echo 'hhh';

        }
        else {

        $query1=mysqli_query($dbco,"INSERT into verifier_email VALUES ('$key','$email')");
        if($query1){
          $gmessage= "verifier votre couriere pour valider la modification d'email" ;
        }
        else $emessage= 'Erreur 404!!' ;

      }
                    }
          if(validate_phone_number($telephone)){
          if(empty($date) || (!empty($date) && validateDate($date))){
            if($date=='') $date='NULL';
            else $date="'$date'";
          if(empty($ville) || (!empty($ville) && strlen($ville)>2 || strlen($ville)<40)){
            if(empty($etablissement) || (!empty($etablissement) && strlen($etablissement)>2 || strlen($etablissement)<40)){
              if(checkpassword($password,$Id)){
              $query="UPDATE `membre_infos` SET  `Pays` = '$pays', `Ville` = '$ville',`Date_de_naissance` = $date, `Etablissement` = '$etablissement', `Sexe` = '$sexe', `description` = '$description', `premiere_inscription` = '1' WHERE `membre_infos`.`Id` = $Id";
                             if(!mysqli_query($dbco, $query)){
                              $emessage="error not found";
                             }else{
                              $query="UPDATE `login` SET  `Phone_number` = '$telephone' WHERE `login`.`Id` = $Id";
                              if(!mysqli_query($dbco, $query)){
                              $emessage="error not found";
                             }else{
                              $emessage=uploadimg($Id);
                              if($emessage=='TRUE'){
                                $emessage='';
                              $good_message="vous information été modifié ".$gmessage;
                            }
                             } 

                      }
                      }else $emessage="le mot de pass est incorrect ";
            }
            else $emessage="Nom d'etablissement doit etre sup à 1 et inf à 40 ";

        } else $emessage="la date est incorrect! ";
       }else $emessage="le chemp de ville doit etre sup à 1 et inf à 40 "; 
     }else $emessage="le telephone est incorrect "; 
        }else $emessage="l'email est incorrect "; 
      }else $emessage="SVP remplisez tout les champs requis";
    }
  }
  if(isset($_POST['submit3'])){
    $extension=array('.jpg','.gif','.png','.jpeg');
    foreach ($extension as $val) {
      $path="imgusers/".$Id.$val;
      if(file_exists($path)){
        if( unlink($path)){$good_message="l'image a été suprimé";}  
      }

    }
        
  }



  ?>
  
<div class="modal-wrap">

  <div class="modal-bodies">
    <div class="modal-body modal-body-step-1 is-showing">
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
                          else if($good_message!=''){
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
      <div class="title">Mes informations</div>
      
      <form name="form1" onsubmit = "return myValidation();" action=""  method="POST" enctype="multipart/form-data">
       <center>
        <div>
            <object style="border-radius: 50%;" width="120px" height="120px" data="<?php echo 'imgusers/'.$Id.'?anyV' ?>" type="image/png">
 
             <img  src="image/images.png?vdsv" style="border-radius: 50%;"  alt="" width="120px" height="120px">
         </object>
         <br>
           <label style="
           margin: 0px;
           font-size: 15px;
           width: 190px;
           margin-bottom: 5px;
           background-color: green;
  border: none;
  color: white;
  padding: 5px;
  text-decoration: none;
  cursor: pointer;" for="files" class="btn">Select Image</label>

        <input id="files" style="
        width: 0.1px;
        visibility:hidden;
        " type="file" name="fileToUpload" id="fileToUpload" value="choisie une image" capture >
        <?php

        if (file_exists("imgusers/".$Id.".jpg") || file_exists("imgusers/".$Id.".png") || file_exists("imgusers/".$Id.".jpeg") || file_exists("imgusers/".$Id.".gif")) {
          ?>
<input type="submit" name="submit3" style="  background-color: red;
  border: none;
  color: white;
  font-size: 15px;
  width: 50;
  padding: 5px;
  text-decoration: none;
  cursor: pointer;" value="Suprimer l'image">
          <?php
           }
        ?>
        
      </div>
      </center>
      <br>
      <div>
        <input type="radio"  id="input1" value="Homme" name="sexe" <?php if(isset($_POST['sexe'])){ {if($_POST['sexe']=='Homme') echo "checked";}}else if($donnees['Sexe']=='Homme') echo "checked"; ?> checked>Homme 
    <input style="margin-left: 10px" type="radio" value="Femme"  id="input2" name="sexe" <?php if(isset($_POST['sexe'])){ {if($_POST['sexe']=='Femme') echo "checked";}}else if($donnees['Sexe']=='Femme') echo "checked";?> >Femme

      </div>
            <br>
            <?php
            if($donnees['premiere_inscription']!=0){
              ?>
<input id="phone" type="text" name="num"
        placeholder="Numéro de téléphone:*" value="<?php if(isset($_POST['num'])) echo $_POST['num']; else echo $donnees['Phone_number']; ?>" />
       <input id="email" type="Email" name="email" placeholder="Email:*" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo $donnees['Email']; ?>"/>
        <?php
        include("country.html");
        ?> 
              <?php
            }
            ?>
             
              <input id="ville" type="text" name="ville" placeholder="Ville:" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; else echo $donnees['Ville']; ?>"/>
          <input id="date" type="date" class="inputdeco" name="daten" placeholder="Date de naissance:*" value="<?php if(isset($_POST['daten'])) echo $_POST['daten']; else echo $donnees[6]; ?>"/>
                        <input id="etablissement" type="text" name="etablissement" placeholder="Etablissement" value="<?php if(isset($_POST['etablissment'])) echo $_POST['etablissment']; else echo $donnees['Etablissement']; ?>"/>
             <textarea name="descriptif" class="inputdeco" id="descriptif" placeholder="Description" cols="45" rows="10" value="<?php if(isset($_POST['descriptif'])) echo $_POST['descriptif']; else echo $donnees['description']; ?>"><?php if(isset($_POST['descriptif'])) echo $_POST['descriptif']; else echo $donnees['description']; ?></textarea>
              <?php
            if($donnees['premiere_inscription']!=0){
              ?>
              <input type="password" id="password"  name="password" placeholder="Mot De Passe:*"/>
              <?php
            }
            ?>
              
              <?php
            if($donnees['premiere_inscription']!=0){
              ?>
              <div class="text-center">
                    <button class="button" id="sub"  name="submit2" style="border: none" type="submit" value="Enregistrer">Enregistrer</button>
                
                </div><br>
              <?php
            }
             else{
            ?>
                <div class="text-center">
                    <button class="button" id="sub" type="submit" style="border: none" name="submit1"  value="premiere_inscription">Suivant</button>
                
                </div><br>
              <?php
            }
            ?>
             
                <div class="text-center">
                
                <?php
            if($donnees['premiere_inscription']!=0){
              ?>
              <a class="button"  style="text-decoration: none" href="user_question.php" >Retoure</a>
              <?php
            }
             else{
            ?>
                <a class="button" style="text-decoration: none" href="Accueil.php" >Ignore</a>
              <?php
            }
            ?>
              </div>
              
      </form>
    </div>

 
  </div>
</div>

  <script src='js/validator.js'>
    
  </script>

    

</body>
</html>
