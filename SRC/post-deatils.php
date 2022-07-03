<?php include('phpf/syslike.php'); 
ob_start();
require('modele-top.php');
?>
    <?php
    $e=0;
    if(isset($_GET["qst_id"])){
        if(!empty($_GET["qst_id"])){
            $Id=$_GET["qst_id"];
            require_once('dbco.php');
            require('phpf/horaire.php');
            $query="SELECT * FROM post , login ,membre_infos where post.Id_User=login.Id and login.Id=membre_infos.Id and Id_Post=$Id";
            $res=mysqli_query($dbco,$query);
            $postexist=mysqli_num_rows($res);
            if($postexist==1){
                            $e=1;
            $donnees=mysqli_fetch_array($res);
            ?>
            <?php

if(isset($_POST['submit2'])){
    if(isset($_SESSION['id'])){
        $emessage='';
        $gmessage='';
        if(isset($_POST['commentaire'])){
        if(!empty($_POST['commentaire'])){
            $commentaire=mysqli_real_escape_string($dbco, $_POST['commentaire']);
            if(!isHTML($commentaire)){
                $Id=$_GET['qst_id'];
                $Uid=$_SESSION['id'];
                $query_set_comment="INSERT INTO `commentaires` (`Id_Commantaire`, `Id_User`, `Id_Post`, `Commentaire`, `Date`) VALUES (NULL, '$Uid', '$Id', '$commentaire', current_timestamp())";
                if(mysqli_query($dbco, $query_set_comment)){
                    $gmessage="Vous avesz fait un commentaire";
                    $_POST = array();
                }
                else $emessage ="Erreur 404 !!";

            }else $emessage="Ce commenter n'est pas acceptable";
          }else $emessage="Veuillez remplis le champs de commentaire";
        }else $emessage ="Erreur 404 !!";
    }else $emessage ="Erreur 404 !!";

}

?>
            <section class="header-descriptin329">
        <div class="container">
            <h3 style="color:#DAA520 "><?php echo htmlentities(ucfirst($donnees['Titre'])) ?></h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="Accueil.php">Accueil</a></li>
                <?php if($donnees['Type']=='admin'){ ?>   
                    <li><a href="blog.php"> Blog</a></li>
                 <?php  } else {?> <li><a href="category.php?category=<?php echo ucfirst($donnees['Categorie']) ?>"><?php echo ucfirst($donnees['Categorie']) ?></a></li>   <?php } ?>
                
                <li class="active"><?php echo htmlentities(ucfirst($donnees['Titre'])) ?></li>
            </ol>
        </div>
    </section>
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                      <?php
                                                 if(isset($emessage)){
                          if(!empty($emessage)){

                        ?>
                        <div class="alert" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $emessage;
                         ?>
                        </div>
                        <?php 
                        }}
                         if(isset($gmessage)){
                          if(!empty($gmessage)){
                          ?>
                          <div class="alertg" id="error">
                         <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <?php
                         echo $gmessage;
                         ?>
                        </div>
                          <?php
                        }}
                        ?>
                    <div class="post-details">

                        <div class="details-header923">

                            <div class="row">

                                <div class="col-md-8">
                                    <div style="word-wrap: break-word;" class="post-title-left129">
                                        <h3><?php echo htmlentities(ucfirst($donnees['Titre']))?></h3> </div>
                                </div>
                                                                <div class="col-md-4">
                            <?php
                            if($donnees['Type']=='user'){
                                ?>
                                    <div class="post-que-rep-rihght320"> <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Question</a>  </div>
                                <?php
                            }
                            else if($donnees['Type']=='admin'){
                                ?>
                                    <div class="post-que-rep-rihght320"> <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Article</a>  </div>
                                <?php
                            }
                            ?>
                                <?php
                            if(isset($_SESSION['id'])){

                           
                              if($donnees['Id']==$_SESSION['id'] ) {
                                ?>
                                    <div style="margin-right: 5px" class="post-que-rep-rihght320"> <a href="<?php echo "post-modify.php?idP="."$Id" ?>"> Modifier </a>  </div><?php } 
                                    if($donnees['Id']==$_SESSION['id'] || (isset($_SESSION['admin'] )&& $donnees['Type']!='admin')  ){ ?>
                                    <button id="show" style="border: none;margin-right: 5px" class="post-que-rep-rihght320"> <a > Supprimer </a>  </button>
                                    <div id="delete-post" class=" hide" style="text-align: center;padding: 20px ;position: absolute; z-index: 100; height: 300px; width: 500px ;background: Azure;
                                    border: 3px solid Darkgrey ; right: 0%">
                                        <h2> Vous voulez de supprimer <?php if(isset($_SESSION['admin'])) echo 'ce post?'; else echo 'cette question?';
                                ?> </h2>
                                        <form action="delete-post.php" method="post">
                                        <input   hidden name="Pid" value="<?php echo $donnees['Id_Post']?>">
                                        <br><br><br>
                                        <input type="button" value="Non" name="" id="hide" style="font-family: sans-serif; width: 100px;font-size: 15px;background-color: green;border: none;color: white;padding: 5px;text-decoration: none;cursor: pointer;">
                                        <button style="width: 100px;font-family: sans-serif; margin-left:20px;font-size: 15px;background-color: red;border: none;color: white;padding: 5px;text-decoration: none;cursor: pointer;" type="submit" name="delete-post" >Oui</button>

                                    </form>
                                        </form>
                                    </div>
                               <script type="text/JavaScript">  
                                        (function() {    
                                            var dialog = document.getElementById('delete-post');    
                                            document.getElementById('show').onclick = function() {    
                                                dialog.classList.remove("hide");
                                            };    
                                            document.getElementById('hide').onclick = function() {   
                                                dialog.classList.add("hide");
                                            };    
                                        })();   
                                        </script>  
                                <?php
                            }}?>
                                
                                                            </div>

                            </div>
                        </div>
                        
                        <div class="post-details-info1982">
                           <div style="word-wrap: break-word"><p><?php  echo htmlentities($donnees['Description'])?></p></div> 
                            <?php
                            if($donnees['Fichier']!='NOT EXIST'){
                                if($donnees['Extension']=='jpg' || $donnees['Extension']=='jpeg' || $donnees['Extension']=='png' || $donnees['Extension']=='gif'){
                                    $Pid=$donnees['Id_Post'];
                        $ext=$donnees['Extension'];
                        echo "<center><img width=500px src='uploads/$Pid.$ext' alt='Image' class='img-responsive'></center>";
                                } else{
                                ?>
                                
                            <P>
                                <a href="<?php $ext=$donnees['Extension']; echo 'uploads/'.$donnees['Id_Post'].'.'.$ext?>" download="<?php echo $donnees['Fichier']?>">
                                    <button style="font-family: sans-serif; margin: 0px;font-size: 15px;width: 50;margin-bottom: 5px;background-color: green;border: none;color: white;padding: 5px;text-decoration: none;cursor: pointer;" >Télécharger le fichier</button>
                                </a>
                            </P><?php
                            } }
                            ?>
                            <hr>
                            <div class="post-footer29032">
                                <div class="l-side2023"> <?php
                                if($donnees['Type']!='admin'){

                                if($donnees['Resolu']){
                                ?>
                                <i class="fa fa-check check2"  aria-hidden="true"> Résolu</i>
                                <?php
                            }
                                else{
                                    ?>
<i class="fa fa-times " style="color: red" aria-hidden="true"> Pas résolu</i> 
                                    <?php
                                }}
                                ?> 
                                 <i class="fa fa-clock-o clock2" aria-hidden="true"> <?php echo time_elapsed_string($donnees['tmp_post']);?></i> <a href="#"><i class="fa fa-commenting commenting2" aria-hidden="true">
                                    <?php
                                    $querycmnt="SELECT count(Id_Commantaire) as nbr from Commentaires WHERE Id_Post=$Id";
                                     $rescmnt=mysqli_query($dbco,$querycmnt);
                                     $rescmnt=mysqli_fetch_array($rescmnt);

                                     echo $rescmnt['nbr'];
                                    ?>
                                Réponse</i></a> </div>
                                <div class="l-rightside39">

                                    <?php
                                    if(isset($_SESSION['id'])){
                                        ?>


                                        <i style="color: #FF7361;  font-size: 1.35em;" <?php if (userLiked($Id)): ?>
                                              class="fa fa-thumbs-up like-btn"
                                          <?php else: ?>
                                              class="fa fa-thumbs-o-up like-btn"
                                          <?php endif ?>
                                          data-id="<?php echo $Id ?>"></i>
                                          <span class="likes" style="margin-right: 7.5px;font-size: 1.2em;"><?php echo getLikes($Id); ?></span>
                                          <i style="color: #FF7361;font-size: 1.35em;"
                                              <?php  if (userDisliked($Id)): ?>
                                                  class="fa fa-thumbs-down dislike-btn"
                                              <?php else: ?>
                                                  class="fa fa-thumbs-o-down dislike-btn"
                                              <?php endif ?>
                                              data-id="<?php echo $Id ?>"></i>
                                            <span class="dislikes" style="margin-right: 5px;font-size: 1.2em;"><?php echo getDislikes($Id); ?></span>  

                                            <?php
                                    }
                                    ?>



                                          
                                  </div>
                            </div>
                        </div>
                    </div>

                    <div class="author-details8392">
                       <div style="bottom: 15px" class="author-img202l"> 
                           <a href="<?php  echo 'user_question.php?uid='.$donnees['Id'] ?>"> <object style="border-radius: 50%;    margin-bottom: 10px;" width="60px" height="60px" data="<?php $ext=$donnees['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object></a>
                            <div class="au-image-overlay text-center"> <a style="color:#fd6372;text-decoration: none " href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a> </div>
                        </div> <span class="author-deatila04re">
                   <h5><a href="<?php echo 'user_question.php?uid='.$ext?>"><?php echo $donnees['Nom']." ".$donnees['Prenom']?></a></h5>
                    <p style="margin-left:80px "><?php $susp=''; if(strlen($donnees['description'])>100) $susp="...";  echo substr($donnees['description'],0,300).$susp ;?></p>
                    
                </span> </div>

                    <div id="comment-box"  class="comment-list12993">
                        <div class="container">
                            <div class="row">
                           
                                <div class="comments-container">
                                    <ul id="comments-list" class="comments-list">
                                        <?php
                                        $comment_query= "SELECT * FROM commentaires , login , membre_infos where commentaires.Id_User=login.Id and membre_infos.Id=login.id and Id_Post=$Id   ORDER by `Date` DESC ";
                                        $result = mysqli_query($dbco, $comment_query);
                                        if (isset($_GET['row']) && $_GET['row']!="") {
                                            $page_no = $_GET['row'];
                                            } else {
                                                $page_no = 1;
                                                }
                                                $total_records_per_page = 12;
                                            $offset = ($page_no-1) * $total_records_per_page;
                                            $previous_page = $page_no - 1;
                                            $next_page = $page_no + 1;
                                            $adjacents = "2"; 
                                            $result_count = mysqli_num_rows($result);
                                            $total_records = $result_count;
                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                            $second_last = $total_no_of_pages - 1; 
                                        $comment_query= "SELECT * FROM commentaires , login , membre_infos where commentaires.Id_User=login.Id and membre_infos.Id=login.id and Id_Post=$Id   ORDER by `Date` DESC LIMIT $offset, $total_records_per_page";
                                        $result = mysqli_query($dbco, $comment_query);
                                        $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        foreach ($comments as $comment){

                                        ?>
                                        <li>
                                             <div class="comment-main-level">
                                                <!-- Avatar -->
                                                <div  class="comment-avatar">

                                                    <a href="<?php  echo 'user_question.php?uid='.$comment['Id'] ?>"> <object style="border-radius: 50%;    margin-bottom: 10px;" width="60px" height="60px" data="<?php $ext=$comment['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object></a>
                          

                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div  class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="
                                                        <?php if($comment['Type']=='user') echo 'comment-name'; else if($comment['Type']=='admin') echo 'comment-name by-author'; ?>
                                                        comment-name"><a href="<?php echo "/p1/user_question.php?idu=".$comment['Id']; ?>"><?php echo $comment['Nom']." ".$comment['Prenom'] ?></a></h6> <span><i class="fa fa-clock-o" aria-hidden="true"><?php echo " ".time_elapsed_string($comment['Date']) ?> </i></span><a href="#cmnt"><i class="fa fa-reply"></i></a> 

                                                         <i <?php userHeart($comment['Id_Commantaire'])?> data-id="<?php echo $comment['Id_Commantaire'] ?>"> </i><i id="<?php echo $comment['Id_Commantaire'] ?>"><?php
                                                        nbrHeart($comment['Id_Commantaire'])?></i><?php
                                                        if(isset($_SESSION['id'])){
                                                        if(isset($_SESSION['admin'])|| $_SESSION['id']==$comment['Id']){
                                                            ?>
                                                            <a href="delete-post.php?Action=commentdelete&Cid=<?php echo $comment['Id_Commantaire'] ?>&Pid=<?php echo $comment['Id_Post'] ?>" style="text-decoration: none; color: #DC143C;float: right">supprimé</a>
                                                            <?php
                                                        }}
                                                        ?>  </div>
                                                    <div class="comment-content"><?php echo $comment['Commentaire'] ?> </div>
                                                </div>
                                            </div>
                                           </li> 

                                      
                                            <?php }   
 ?>    
                                    </ul>
                        
                            </div>
                            </div>
                        </div>
                    </div>
 <center>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?qst_id=".$Pid."&row=$previous_page#comment-box'"; } ?>>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?qst_id=".$Pid."&row=$counter#comment-box'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?qst_id=".$Pid."&row=$counter#comment-box'>$counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?qst_id=".$Pid."&row=$second_last#comment-box'>$second_last</a></li>";
        echo "<li><a href='?qst_id=".$Pid."qst_id=".$Pid."&row=$total_no_of_pages#comment-box'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?qst_id=".$Pid."&row=1#comment-box'>1</a></li>";
        echo "<li><a href='?qst_id=".$Pid."&row=2#comment-box'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?qst_id=".$Pid."&row=$counter#comment-box'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?qst_id=".$Pid."&row=$second_last#comment-box'>$second_last</a></li>";
       echo "<li><a href='?qst_id=".$Pid."&row=$total_no_of_pages#comment-box'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?qst_id=".$Pid."&row=1#comment-box'>1</a></li>";
        echo "<li><a href='?qst_id=".$Pid."row=2#comment-box'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?qst_id=".$Pid."&row=$counter#comment-box'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?qst_id=".$Pid."&row=$next_page#comment-box'"; } ?>>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?qst_id=".$Pid."&row=$total_no_of_pages#comment-box'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
                    </center>
                    <div id="cmnt" class="comment289-box">
                        
                        <h3>Commentaire</h3>
                        <hr>
                        <div class="row  ">
                            <div class="commentaire-side post9320-box ">
                                                  <?php

if(!isset($_SESSION['id'])){
?>
<div class="commentaire-box">

<div style="position: absolute;
  top: 40%;
  right: 60%;
  background: red;  ">
                       <a href="login.php"> <button  class="login-button"> S'IDENTIFIER
                            
                        </button></a>
                    </div>
                </div>

<?php
}
?> 
                                <form action="" method="POST">
                                    <textarea type="text" style=" color: black; height: 150px" required class="comment-input219882" name="commentaire" placeholder="Enter Your Post"> </textarea></div>
                                    <button id='sub' type="submit" name="submit2" class="pos393-submit">Commenter</button>
                                               
                                </form>
                                
                        </div>
                    </div>
                </div>
                <!--                end of col-md-9 -->
            <?php
        }
        }
}
if($e==0){
    ?>
    <section class="header-descriptin329">
        <div class="container">
            <h3 style="color:#DAA520 ">Page not Found</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="index.php">Accueil</a></li>
                <li class="active">Page not Found
                    
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
          
<?php
require('modele-bottom.php');

?>                         
 <script src="js/syslike.js"></script>
