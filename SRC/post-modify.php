
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
$categorie='';
if(isset($_POST['submit']) && isset($_GET['idP'])){
    if(isset($_POST['titre'])  && isset($_POST['description'])){
      if(isset($_SESSION['admin'])) $categorie='Blog';
      else if(isset($_POST['categorie'])) $categorie=$_POST['categorie'];
        if(!empty($_POST['titre']) && !empty($_GET['idP']) && !empty($categorie) && !empty($_POST['description'])){
                      $Resolu=0;
          if(isset($_POST['Resolu'])){
            $Resolu=1;
          }
            $Pid=$_GET['idP'];
            $titre=htmlentities($_POST['titre']);
           $Id=$_SESSION['id'];
        $categorie=mysqli_real_escape_string($dbco,$categorie);
        $description=htmlentities(mysqli_real_escape_string($dbco,$_POST['description']));
            $sql1 = "UPDATE post  SET
            `Categorie`='$categorie',
            `Titre`='$titre',
            `Description`= '$description',
            `Resolu` = '$Resolu' where `Id_Post` = '$Pid'";
          if ($res=mysqli_query($dbco, $sql1)) {
                       header("Location: http://localhost/p1/post-deatils.php?qst_id=".$Pid);
                       ob_end_flush();
                     } else $emessage= "Error: " . $sql1 . "<br>" . mysqli_error($dbco);
           
                       
        
        
    }else $emessage= "SVP remplisez tout les champs requis";
        
    }
        }
        $e=0;
  if(isset($_GET['idP']) && isset($_SESSION['id'])){
    if(!empty($_GET['idP'])){
      $Udi=$_SESSION['id'];
      $Pid=$_GET['idP'];
        $query="SELECT * FROM post , login ,membre_infos where post.Id_User=login.Id and login.Id=membre_infos.Id and Id_Post=$Pid and login.Id=$Udi";
        $res=mysqli_query($dbco,$query);
            $postexist=mysqli_num_rows($res);
            if($postexist==1){
                            $e=1;
            $donnees=mysqli_fetch_array($res);
            ?>
             <section class="header-descriptin329">
        <div class="container">
            <h2 style="color:#DAA520 ">Modifier</h2>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="index.php">Acceuil</a></li>
                <li class="active"><a href="<?php echo "post-deatils.php?qst_id=".$Pid ?>"><?php echo  htmlentities(ucfirst($donnees['Titre'])) ?></a> </li>
                <li class="active">Modifier </li>
            </ol>
        </div>
    </section>

<!--                end of php -->


   <section class="main-content920">
        <div class="container">
            <div class="row">
                
                <div class="col-md-9">

                <div class="ask-question-input-part032">


                      <h4>Modifier votre <?php if(isset($_SESSION['admin'])) echo 'post';else echo 'question'; ?> </h4>
                 <hr>
                    <form  method="POST" enctype="multipart/form-data" >
                        
                        <table width="100%">
                         <tr>
                          <div class="question-title39">
                            <th width="25%">
                                <span class="form-description433">Titre De Question* </span>
                            </th>
                            <th>
                            <input type="text" name="titre" class="question-ttile32" value="<?php if(isset($_POST['titre'])) echo htmlentities($_POST['titre']); else echo htmlentities($donnees['Titre']); ?>" placeholder="Écrivez le titre de votre question">   
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
                             <select style="margin-top: 20px; width: 75%"  name="categorie" value="<?php if(isset($_POST['categorie'])) echo $_POST['categorie']; else echo '';?>" class="list-category53">
                                      <option <?php if(isset($_POST['categorie'])) {if($_POST['categorie']=="Parcours(MIP)") echo 'selected';} else if($donnees['Categorie']=="Parcours(MIP)") echo 'selected'  ?> value="Parcours(MIP)">Parcours(MIP)
                                      <option <?php if(isset($_POST['categorie'])) {if($_POST['categorie']=="Parcours(BCG)") echo 'selected';} else  if($donnees['Categorie']=="Parcours(BCG)") echo 'selected'  ?>  value="Parcours(BCG)">Parcours(BCG)
                                      <option <?php if(isset($_POST['categorie'])) {if($_POST['categorie']=="Parcours(GEGM)") echo 'selected';} else  if($donnees['Categorie']=="Parcours(GEGM)") echo 'selected'  ?> value="Parcours(GEGM)">Parcours(GEGM)
                                      <option <?php if(isset($_POST['categorie'])) {if($_POST['categorie']=="Parcours(Evenment scolaire)") echo 'selected';} else  if($donnees['Categorie']=="Evenment scolaire") echo 'selected'  ?> value="Evenment scolaire">Evenment scolaire
                                      <option <?php if(isset($_POST['categorie'])) {if($_POST['categorie']=="Parcours(Apres le parcours)") echo 'selected';} else  if($donnees['Categorie']=="Apres le parcours") echo 'selected'   ?> value="Apres le parcours">Apr&eacute;s le parcours
                                      <option <?php if(isset($_POST['categorie'])) {if($_POST['categorie']=="Parcours(clubs)") echo 'selected';} else  if($donnees['Categorie']=="clubs") echo 'selected'  ?> value="clubs">Clubs
                                      <option <?php if(isset($_POST['categorie'])) {if($_POST['categorie']=="Parcours(Aide et discution)") echo 'selected';} else  if($donnees['Categorie']=="Aide et discution") echo 'selected'  ?> value="Aide et discution">Aide et discution
                                      </select>

                            </th>
                              
                        </div>
                            
                        </tr>
                      <?php } ?>
                         
                        <tr>
                            <th>
                                    <span class="form-description23993">Question*</span>
                                    
                                </th>
                            <th>
                              <div class="question-title39">
                            <textarea type="text"  style="resize: none;

    padding: 10px 20px;
  border: 1px solid  #483D8B;
  border-radius: 3px;
  display: block;
  width: 75%;
  height: 150px;
  margin-top: 20px;
  box-sizing: border-box;
  outline: none;
" name="description" ><?php if(isset($_POST['description'])) echo htmlentities($_POST['description']); else echo htmlentities($donnees['Description']);?></textarea> 
                        </div>   
                            </th>
                           
                        </tr>
                        <?php
                        if(!isset($_SESSION['admin'])){
                          ?>
<tr>
                            <div class="button-group-addfile3239">

                                <th>
                                    <span class="form-description23993">Résolu ?</span>
                                    
                                </th>
                                <th>
                                    <input type="checkbox" name="Resolu" id="Resolu" <?php if(isset($_POST['Resolu'])) {if($_POST['Resolu']==1) echo 'checked' ;} else if($donnees['Resolu']==1) echo 'checked' ?>  value=1>
                                </th>
                              
        
                        </div>
                        </tr>

                          <?php
                        }
                        ?>
                        
                          
                        </table>
                        
                        <div class="details2-239">
                        

                        <div class="publish-button2389">
                            <input class="publis1291" type="submit"  name="submit" value="Modifier">
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


            <?php
          }

    }
  }
 
if($e==0){
    ?>
    <section class="header-descriptin329">
        <div class="container">
            <h3>Page not Found</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="#">Error 404</a></li>
                <li class="active">
                    
                </li>
            </ol>
        </div>
    </section>
    <!--    body content-->
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <section class="category2781">
                        <div class="question-type2033">
                            <div class="row">
                                <div class="col-md-1">
                                <div >
                                  Error 
                                </div>
                        </div>
                    </section>
                </div>
                <!-- end of col-md-9 -->
    <?php

    }
    ?>

<!--                end of php -->
 

<!--                end of col-md-9 -->

<?php
require('modele-bottom.php');
?>