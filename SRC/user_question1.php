<?php require('modele-top.php');
$e=0;
if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
if(isset($_SESSION['id'])){
    $Uid=$_SESSION['id'];
}
if(isset($_GET['uid'])){
   $Uid=$_GET['uid'];
}
if(isset($Uid)){
$query1="SELECT Nom, Prenom , Login, Email , Phone_number, Date_singup, Date_de_naissance , Pays, Ville, Etablissement ,description, Sexe ,Type from  login , membre_infos where login.Id=membre_infos.id and login.Id=$Uid ";
$query2="SELECT * from post where Id_User=$Uid GROUP BY Id_User";
$query3="SELECT * from commentaires where Id_User=$Uid GROUP BY Id_User";
require_once('dbco.php');
$result = mysqli_query($dbco, $query1);
$user_exist=mysqli_num_rows($result);
if($user_exist=1){

    $donnes_user=mysqli_fetch_array($result);
    $result = mysqli_query($dbco, $query2);
    $nbrpost=mysqli_num_rows($result);
    $result =mysqli_query($dbco, $query3);
    $nbrcmt=mysqli_num_rows($result);

if (!empty($donnes_user) && !empty($nbrpost) &&!empty($nbrcmt) ) {

 $e=0;
 }} }
if($e==1){

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
}else {
   ?>

 <!-- ======breadcrumb ======-->
    <section class="header-descriptin329">
        <div class="container">
            <h2 style="color:#DAA520" >User Deatils</h2>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="Accueil.php">Accueil</a></li>
                <li class="active">User Details</li>
            </ol>
        </div>
    </section>
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <!--    body content-->
                <div class="col-md-9">
                    <div class=" about-user2039">
                        <div class="user-title3930">
                            <h3>About <a href="#"><?php echo ucfirst($donnes_user['Nom'])." ".ucfirst($donnes_user['Prenom'])?></a>
                     
                        <span class="badge229">
                        <a href="#"><?php echo ucfirst($donnes_user['Type'])?></a>
                        <?php
                        if(isset($_SESSION['id'])){
                        
                        if($Uid==$_SESSION['id']){
                            ?>
                        <a href="info.php" >modifier ou ajouter mes informations</a>
                        <a href="changerM.php" >modifier le mot de passe</a>
                            <?php
                        }    
                        }
                        ?>
                        </span>
                        </h3>
                            <hr> </div>
                        <div style="float: left;" class="user-image293">
                         <object style="border-radius: 50%;" width="120px" height="120px" data="<?php echo 'imgusers/'.$Uid.'?anyV' ?>" type="image/png">
 
             <img  src="image/images.png?vdsv" style="border-radius: 50%;width:120px ;height:120px"  alt="" >
         </object> </div>
                        <br><div  class="user-list10039">
                            <div style="margin-left: 20px " class="ul-list-user-left29">
                                <ul>
                                    <li><i class="fa fa-plus" aria-hidden="true"></i> <strong>inscrit depuis:</strong> <?php echo $donnes_user['Date_singup'] ?></li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Pays:</strong> <?php echo $donnes_user['Pays'] ?></li>
                                    <li><i class="fa fa-building" aria-hidden="true"></i> <strong>Ville:</strong> <?php echo $donnes_user['Ville'] ?></li>
                                    
                                </ul>
                            </div>
                            <div style="margin-left: 40px " >
                                <ul>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i> <strong>Numéro de téléphone:</strong> <?php echo $donnes_user['Phone_number'] ?></li>
                                    <?php
                                    if(isset($_SESSION['id'])){
                                        if($_SESSION['id']==$Uid){
                                            ?>
                                    <i class="fa fa-id-badge" aria-hidden="true"></i> <strong>Login:</strong> <?php echo $donnes_user['Login'] ?></li><?php
                                        }
                                    }
                                    ?>
                                    <li><i class="fa fa-university" aria-hidden="true"></i> <strong>Etablissement:</strong><?php echo $donnes_user['Etablissement'] ?> </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="user-description303">
                            <p> <?php echo $donnes_user['description'] ?> </p> </div>
                        <div class="user-social3903">
                            
                        </div>
                    </div>
                    <br>
                    <div class="status-part3821">
                        <h4>statistique </h4> 
                        <a href=""><i class="fa fa-question-circle" aria-hidden="true"> 
                            <?php
                                if($donnes_user['Type']=='admin'){
                                    ?>
                                                                    Postes ( <?php echo $nbrpost ?> )
                                    <?php
                                }else{
                                     ?>
                                                                    Questions ( <?php echo $nbrpost ?> )
                                    <?php
                                }
                                ?>
                        </i></a> <i class="fa fa-comment" aria-hidden="true"> Commentaires(<?php echo $nbrcmt ?>)</i> </div>
                    
                    
                </div>
                <!--                end of col-md-9 -->
                <!--           strart col-md-3 (side bar)-->
    <?php 
}

?>

   
                <?php
require('modele-bottom.php');
                ?>