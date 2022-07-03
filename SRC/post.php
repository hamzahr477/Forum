<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  require('modele-top.php');
?>

<!--                php -->
<?php
require_once('dbco.php');
$emessage='';
if(isset($_POST['submit'])){
  if(isset($_SESSION['admin'])){
    $categorie='Blog';
  }
  else if(isset($_POST['categorie'])){
    $categorie=$_POST['categorie'];
  }
    if(isset($_POST['titre'])  && isset($_POST['description'])){
        if(!empty($_POST['titre']) && !empty($categorie) && !empty($_POST['description'])){
           $titre=mysqli_real_escape_string($dbco,$_POST['titre']);
           $Id=$_SESSION['id'];
        $categorie=mysqli_real_escape_string($dbco,$categorie);
        $description=mysqli_real_escape_string($dbco,$_POST['description']);
        htmlentities($description);
        $file_name='NOT EXIST';
        if (isset($_FILES["fileToUpload"])){
            if(!empty($_FILES["fileToUpload"]["name"])){
               $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    $emessage= "Votre fichier est trop volumineux.";
                    $uploadOk = 0;
                }
                if($imageFileType == "zip" || $imageFileType == "rar" || $imageFileType == "exe" || $imageFileType == "PIF" ) {
                    $emessage= "Ce fichier n'est pas autorisé";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                  }
                else {          
                $file_name=$_FILES["fileToUpload"]["name"];
                    $sql1 = "INSERT INTO post (`Id_Post`, `Id_User`, `Categorie`, `Titre`, `Description`, `Fichier`,`Extension`, `tmp_post`) VALUES (NULL, '$Id', '$categorie', '$titre', '$description', '$file_name','$imageFileType', current_timestamp())";
                     if ($res=mysqli_query($dbco, $sql1)) {
                       $last_id = mysqli_insert_id($dbco);
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$last_id.".".$imageFileType)) {
                    header("Location: http://Localhost/P1/post-deatils.php?qst_id=$last_id");
                       ob_end_flush();
                } else {
                    $querydel="DELETE from post WHERE Id_Post=$last_id";
                    $emessage= "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
                       } else {
                          $emessage= "Error: " . $sql1 . "<br>" . mysqli_error($dbco);
                      }
               
                }
            } 
            }
            
        }
        if(!isset($_FILES["fileToUpload"]) || empty($_FILES["fileToUpload"]["name"]) ){
            $sql1 = "INSERT INTO post (`Id_Post`, `Id_User`, `Categorie`, `Titre`, `Description`, `Fichier`, `tmp_post`) VALUES (NULL, '$Id', '$categorie', '$titre', '$description', '$file_name', current_timestamp())";
                     if ($res=mysqli_query($dbco, $sql1)) {
                        $last_id = mysqli_insert_id($dbco);
                    header("Location: http://Localhost/P1/post-deatils.php?qst_id=$last_id");
                       ob_end_flush();
                       } else {
                          $emessage= "Error: " . $sql1 . "<br>" . mysqli_error($dbco);
                      }
        }
        
    }else $emessage= "SVP remplisez tout les champs requis";
        
    }
        }

?>
    <section class="header-descriptin329">
        <div class="container">
            <h2 style="color:#DAA520 "><?php if(isset($_SESSION['admin']))
                            echo "Partager dans le blog";
                            else echo "Poser des questions"; 
                        ?></h2>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="Acceuil.php">Acceuil</a></li>
                <li class="active"><?php if(isset($_SESSION['admin']))
                            echo "Post";
                            else echo "Question"; 
                        ?> </li>
            </ol>
        </div>
    </section>

<!--                end of php -->
    <section class="main-content920">
        <div class="container">
            <div class="row">
                
                <div class="col-md-9">

                <div class="ask-question-input-part032">

<?php

if(!isset($_SESSION['id'])){
?>

<div style="background: red;" class="question-box">
                    <center>
                       <a href="login.php"> <button  class="login-button"> S'IDENTIFIER
                            
                        </button></a>
                    </center>
                </div>

<?php
}
?>





                      <h4><?php if(isset($_SESSION['admin']))
                            echo "Poser une Post";
                            else echo "Poser une question"; 
                        ?></h4>
                 <hr>
                    <form  method="POST" enctype="multipart/form-data" >
                        
                        <table width="100%">
                         <tr>
                          <div class="question-title39">
                            <th width="25%">
                                <span class="form-description433"><?php if(isset($_SESSION['admin']))
                            echo "Titre de Post";
                            else echo "Titre de Question"; 
                        ?> </span>
                            </th>
                            <th>
                            <input type="text" name="titre" class="question-ttile32" value="<?php if(isset($_POST['titre'])) echo $_POST['titre']; else echo''; ?>" placeholder="Écrivez le titre de votre <?php if(isset($_SESSION['admin']))
                            echo "Post";
                            else echo "Question"; 
                        ?>">   
                            </th>
                        </div>  
                        </tr>
                        <?php
                        if(!isset($_SESSION['admin'])){
                          ?>
                         <tr>
                        <div class="categori49">
                            <th>
                                <span class="form-description43305">Catégorie* </span>
                            </th>
                            <th>
                             <select style="margin-top: 20px; width: 75%"  name="categorie" value="<?php if(isset($_POST['categorie'])) echo $_POST['categorie']; else echo'';?>" class="list-category53">
                                      <option <?php if(isset($_POST['categorie'])) if($_POST['categorie']=="Parcours(MIP)") echo 'selected'  ?> value="Parcours(MIP)">Parcours(MIP)
                                      <option <?php if(isset($_POST['categorie'])) if($_POST['categorie']=="Parcours(BCG)") echo 'selected'  ?>  value="Parcours(BCG)">Parcours(BCG)
                                      <option <?php if(isset($_POST['categorie'])) if($_POST['categorie']=="Parcours(GEGM)") echo 'selected'  ?> value="Parcours(GEGM)">Parcours(GEGM)
                                      <option <?php if(isset($_POST['categorie'])) if($_POST['categorie']=="Evenment scolaire") echo 'selected'  ?> value="Evenment scolaire">Evenment scolaire
                                      <option <?php if(isset($_POST['categorie'])) if($_POST['categorie']=="Apres le parcours") echo 'selected'   ?> value="Apres le parcours">Apr&eacute;s le parcours
                                      <option <?php if(isset($_POST['categorie'])) if($_POST['categorie']=="clubs") echo 'selected'  ?> value="clubs">Clubs
                                      <option <?php if(isset($_POST['categorie'])) if($_POST['categorie']=="Aide et discussion") echo 'selected'  ?> value="Aide et discussion">Aide et discution
                                      </select>

                            </th>
                              
                        </div>
                            
                        </tr>
                          <?php
                        }
                        ?>
                        

                        <tr>
                            <div class="button-group-addfile3239">

                                <th>
                                    <span class="form-description23993">Attactment</span>
                                    
                                </th>
                                <th>
                                    <input style="  margin-top: 20px;" type="file" name="fileToUpload" id="fileToUpload" class="question-ttile3226">
                                </th>
                              
        
                        </div>
                        </tr> 
                        <tr>
                            <th>
                                    <span class="form-description23993"><?php if(isset($_SESSION['admin']))
                            echo "Post";
                            else echo "Question"; 
                        ?> </span>
                                    
                                </th>
                            <th>
                              <div >
                            <textarea type="text"  style="resize: none;

    padding: 10px 20px;
  border: 1px solid #483D8B;
  border-radius: 3px;
  display: block;
  width: 75%;
  height: 150px;
  margin-top: 20px;
  box-sizing: border-box;
  outline: none;
" name="description" ><?php if(isset($_POST['description'])) echo $_POST['description']; else echo'';?></textarea> 
                        </div>   
                            </th>
                           
                        </tr>
                          
                        </table>
                        
                        <div class="details2-239">
                        

                        <div class="publish-button2389">
                            <input class="publis1291" type="submit"  name="submit" value="Publier">
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
                        
                </div>
                </form>
               
                </div>
             
              
                </div>

<!--                end of col-md-9 -->

<?php
require('modele-bottom.php');
?>