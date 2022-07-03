<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  require('modele-top.php');
?>   
    
    

<body>
    <?php

   function checkemail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
   }
   else{
     return FALSE;
   }
   }
   function validStrLen($str, $min, $max){
    $len = strlen($str);
    if($len < $min){
        return FALSE;
    }
    elseif($len > $max){
        return FALSE;
    }
    return TRUE;
}
 ?>
       <?php


    if(isset($_POST['submit']))
{
    if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['titre']) AND !empty($_POST['texte']))
    {
         $email=$_POST['email'];
        if (checkemail($email) ==true) {
        
       require_once('Mailer.php');

    
$dest='soukaina.hanouar@gmail.com';
$entetes='from:' .$_POST['email'];
$objet=$_POST['titre'];
$message=$_POST['texte'];
$objet="Support forumFst -".$entetes." objet : ".$objet;
if(mailer($dest,$objet,$message)){
  $good_message="L'email à été envoyer avec succée.";
}
else $msg="Erreur, SVP  non correct résseyer plus tard.";
}
    else 
        $msg="email non correct";
}
else
    {
        $msg="Tous les champs doivent être complétés !";
    }
}
?>


  
    
<section class="header-descriptin329">
                       <div class="container">
                       <h2 style="color:#DAA520 ">Contact</h2>
                        <ol class="breadcrumb breadcrumb839">
  <li><a href="#">Acceuil</a></li>
  <li class="active">Contact-nous</li>
</ol>
    </div>
</section>
     
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                <div class="ask-question-input-part032">

                      <?php
                        if(isset($msg)){
                        ?>
                        <div class="alert" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $msg;
                         
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
        
                      <h4>Contact </h4>
                 <hr>
  
 
                    <form action="" method="POST" onsubmit="return myValidation()">
                    <div class="username-part940">
                        <span class="form-description43">Votre Nom* </span><input type="text" id="username" name="username" class="username029" placeholder="Enter Votre Nom" value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>" />
                        

 </div>
 <div class="email-part320">
     <span class="form-description442">E_mail* </span><input type="text" id="email" name="email" class="email30" placeholder="Enter Votre Email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" />  
                        </div>
                        <div class="question-title39">
                            <span class="form-description433">Objet d'envoit* </span><input id="objet" type="text" name="titre" class="question-ttile32" placeholder="Ecrire Votre question" value="<?php if(isset($_POST['titre'])) { echo $_POST['titre']; } ?>">
                        </div>
        <div class="question-title39">
                            <span class="form-description43313">Détails* </span>
<textarea class="question-details3112" name="texte" id="details" placeholder="Type de Description et Détail ."><?php if(isset($_POST['texte'])) { echo $_POST['texte']; } ?></textarea>

                         
                       
                        </div>


                        <div class="publish-button2389">
                    <input class="publis1291" type="submit"  id="sub" name="submit" value="Envoyer Email" onclick="validate()">
                    
                </div>
 

                        

                        

                                             
                     
</form>


               
               </div>
<section class="google-map390">
     <div  style="width:100%" class="container">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3344.9703285339465!2d-7.618693685328918!3d33.030912178304355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda61aabf2a6a8b9%3A0xe6a579c28d993de9!2sFacult%C3%A9%20des%20Sciences%20et%20Techniques!5e0!3m2!1sfr!2sma!4v1599338280105!5m2!1sfr!2sma" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
         </div>
  </section>
             </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/npm.js"></script>
    <script src='js/validator.js'></script>
    
</body>

</html>
<?php
require('modele-bottom.php');  
?>
