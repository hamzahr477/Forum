<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum FSTS</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style-accueil.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>

<body>
    <!--======== Navbar =======-->
      <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="navbar-menu-left-side239">
                        <ul>
                            <?php
                             if (session_status() == PHP_SESSION_NONE) {
                                   session_start();
                               }
                            if(isset($_SESSION['id'])){
                                $Uid=$_SESSION['id'];
                                ?>
                                <li><a href="deconnexion.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Deconection</a></li>
                             <li><a href="user_question.php?"><i class="fa fa-user" aria-hidden="true"></i>
                                <?php
                                $sqlu="SELECT Nom , Prenom from login where Id = $Uid";
                                require_once('dbco.php');
                                $res=mysqli_query($dbco,$sqlu);
                                $row=mysqli_fetch_array($res);
                                $Username=ucfirst($row['Nom'])." ".ucfirst($row['Prenom']);
                                echo $Username;
                                if(isset($_SESSION['admin'])) echo ' (Espace administrateur)';
?>
                             </a></li>
                            <?php
                            }else{
                                ?>
                                <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>
                             <li><a href="signup.php"><i class="fa fa-user" aria-hidden="true"></i>Inscription</a></li>
                                <?php
                            }
                           
                            ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ==========header mega navbar=======-->
    <div class="top-menu-bottom932">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="#"><img src="image/fsts_logo.png" alt="Logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"> </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Accueil.php">Accueil</a></li>
                        
                        <li><a href="post.php"><?php if(isset($_SESSION['admin']))
                            echo "Partager dans le blog";
                            else echo "Poser des questions"; 
                        ?></a></li>
                        
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilisateurs <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="user.php" >tous les utilisateurs </a></li>
                            </ul>
                        </li>
                    
                        <li class="dropdown"> <a href="#" data-toggle="dropdown" role="button" >Catégories <span class="caret"></span></a>
                        <ul class="dropdown-menu animated zoomIn">
                        <li class="dropdowncat" > 
                                <a href="#" data-toggle="dropdown" role="button" >
                                Parcours
                                    <i class="fa fa-caret-down"></i></a>
                                
                                <div style="color: black" class="dropdown-cont">
                                    <ul class="dropdownlink">
                                      <li>
                                        <a href="category.php?category=Parcours(MIP)">MIP</a>
                                      </li>  
                                      <li>
                                        <a href="category.php?category=Parcours(BCG)">BCG</a>
                                      </li>  
                                      <li>
                                        <a href="category.php?category=Parcours(GEGM)">GEGM</a>
                                      </li>  
                                    </ul>
                            </div>
                        </li>
                                <li><a href="category.php?category=Evenement+scolaire" >Evenement scolaire</a></li>
                                <li><a href="category.php?category=Clubs" >Clubs</a></li>
                                <li><a href="category.php?category=Apres+le+parcours" >Aprés le parcours</a></li>
                                <li><a href="category.php?category=Aide+et+discussion" >Aide et discussion</a></li>
                            </ul>
                        </li>
                         <li><a href="blog.php" >Blog</a></li>

                        <li><a href="contact_us.php" >Contactez-nous</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    
    
    
    <!--======= welcome section on top background=====-->
    <section class="welcome-part-one">
        <div class="container">
            <div  class=" welcome-demop102 text-center">
                <h1 style="color:#DAA520; font-weight: bold; opacity: 1">Bienvenue parmi nous </h1>
                <div class="myelement">
                    <p>Bienvenue à notre nouveau Forum! Dans le cadre de nos efforts continus afin d’améliorer nos services tout en reconnaissant qu’Internet constitue la principale source d’information pour la plupart de vous, nous sommes heureux de présenter notre forum qui affiche un air nouveau et comporte une meilleure fonctionnalité afin de répondre à toutes vos questions sur notre faculté FSTS. 
                    <br></p>
                 <?php
                 if(!isset($_SESSION['id'])){
                    ?>
                    <div style=" position: absolute; left: 0; right: 0;margin-top: 80px; margin-left: auto; margin-right: auto;" >
                        <a  href="login.php">
                        <button style="; background: #DAA520" type="button" class="join92">Rejoindre maintenat</button>
                    </a>
                    </div>

                    <?php
                 }
                 ?> 
                </div>
                <h4>Vous avez des questions ? vous allez trouver la reponse ici ! </h4>
                    
                    
        </div>
    </section>
    
    
    <!-- ======content section/body=====-->
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="main">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1">Dernières Questions</label>
                        <input id="tab2" type="radio" name="tabs">
                        <label for="tab2">Plus répondus</label>
                        <input id="tab3" type="radio" name="tabs">
                        <label for="tab3">Pas résolu</label>
                        <input id="tab4" type="radio" name="tabs">
                        <label for="tab4">Sans réponse</label>
                        <?php if(isset($_SESSION['id'])){
                            ?>
<input id="tab5" type="radio" name="tabs">
                        <label for="tab5"><?php if(isset($_SESSION['admin'])) echo "Mes posts";else echo 'Mes questions' ?></label>
                            <?php
                        }
                        ?>
                               <!--Recent Question Content Section -->
                           <section id="content1"> 
                            <?php
                           require('dbco.php');
                           require('phpf/horaire.php');
    $result = mysqli_query($dbco,"SELECT post.Id_Post,Id ,Titre, Description , Resolu,Categorie, tmp_post ,Nom,Prenom  FROM post , login where post.Id_User=login.Id and Categorie NOT in('Blog')  ORDER by `tmp_post` DESC LIMIT 0, 10");
    while($post = mysqli_fetch_array($result)){
                                           $Pid= $post['Id_Post'] ;
                                        $comment_query= "SELECT count(*) as nbr FROM commentaires where Id_Post=$Pid";
                                        $result2 = mysqli_query($dbco, $comment_query);
                                        $comments = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                        ?>
                        <div style="max-height: 300px" class="question-type2033">
                            <div class="row">
                                <div style=" float: right; padding: 25px">
                                    <div style="float: right; ">
                                        <div class="left-user12923 left-user12923-repeat">
                                        <i class="<?php if($post['Resolu']==1) echo 'fa fa-check'; else  echo 'fa fa-times'; ?>" aria-hidden="true"> </i> </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div  style="text-align: center;width: 100px" class="left-user12923 left-user12923-repeat">
                                        <a href="user_question.php?Uid=<?php echo$post['Id'];?>"> <object style="border-radius: 50%;    margin-bottom: 10px;" width="60px" height="60px" data="<?php $ext=$post['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

                             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object> </a> <a href="user_question.php?Uid=<?php echo  $post['Id'];?>" style="width: 100%; text-decoration: none"><h5><?php echo  " ".$post['Nom']." ".$post['Prenom'];?></h5> </a> </div>
                                </div>

                                <div class="col-md-9">

                                    <div class="right-description893">
                                        <div id="que-hedder2983">
                                            <h3><a  href="post-deatils.php?qst_id=<?php echo  $post['Id_Post'];?>" ><?php $susp='';$titre=htmlentities(ucfirst($post['Titre'])); if(strlen($titre)>50) $susp="...";  echo substr($titre,0,50).$susp;?></a></h3> </div>
                                        <div style="word-wrap: break-word;" class="ques-details10018">
                                            <p><?php $susp=''; if(strlen($post['Description'])>200) $susp="...";  echo htmlentities(substr($post['Description'],0,200)).$susp ;?></p>
                                        </div>

                                        <hr>
                                        <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i> </a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> <?php echo time_elapsed_string($post['tmp_post']);?></i></a><a href=""><i class="fa fa-comment" aria-hidden="true" ><?php echo  " ".$comments['nbr'];?></i> <a href="<?php echo 'category.php?category='.$post['Categorie'] ?>"><i class="fa fa-question-circle-o" aria-hidden="true"> <?php echo $post['Categorie'] ?></i></a> 
                                        </a> </div>
                                    </div>
                                </div>
                                <div>
                                  
                                </div>
                                
                            </div>
                        </div>
                                            <?php }
                                                mysqli_close($dbco);
 ?>    
                        </section>
                        <!--  End of content-1------>
                        
                        <section id="content2">
                           <!--Most Response Content Section -->
                            <?php
                           require('dbco.php');
    $result = mysqli_query($dbco,"SELECT post.Id_Post,Id ,Titre, Description , Categorie, Resolu, tmp_post ,Nom,Prenom ,count(Id_Commantaire)  FROM commentaires, post , login where commentaires.Id_Post=post.Id_Post and post.Id_User=login.Id and Categorie NOT in('Blog') GROUP by  post.Id_Post  ORDER by `count(id_Commantaire)`   DESC LIMIT 0, 10");
    while($post = mysqli_fetch_array($result)){
                                           $Pid= $post['Id_Post'] ;
                                        $comment_query= "SELECT count(*) as nbr FROM commentaires where Id_Post=$Pid";
                                        $result2 = mysqli_query($dbco, $comment_query);
                                        $comments = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                        ?>
                        <div class="question-type2033">
                            <div class="row">
                                <div style="float: right;padding: 25px ">
                                        <div class="left-user12923 left-user12923-repeat">
                                        <i class="<?php if($post['Resolu']==1) echo 'fa fa-check'; else  echo 'fa fa-times'; ?>" aria-hidden="true"> </i> </div>
                                    </div>
                                <div  class="col-md-1">
                                    <div  style="text-align: center;width: 100px" class="left-user12923 left-user12923-repeat">
                                        <a href="user_question.php?Uid=<?php echo$post['Id'];?>"><object style="border-radius: 50%;    margin-bottom: 10px;" width="60px" height="60px" data="<?php $ext=$post['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

                             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object> </a> <a href="user_question.php?Uid=<?php echo  $post['Id'];?>" style="text-decoration: none"><h5><?php echo  " ".$post['Nom']." ".$post['Prenom'];?></h5> </a> </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="right-description893">
                                        <div id="que-hedder2983">
                                            <h3><a  href="post-deatils.php?qst_id=<?php echo  $post['Id_Post'];?>" ><?php $susp='';$titre=htmlentities(ucfirst($post['Titre'])); if(strlen($titre)>50) $susp="...";  echo substr($titre,0,50).$susp;?></a></h3> </div>
                                        <div style="word-wrap: break-word;" class="ques-details10018">
                                            <p><?php $susp=''; if(strlen($post['Description'])>200) $susp="...";  echo htmlentities(substr($post['Description'],0,200)).$susp ;?></p>
                                        </div>
                                        <hr>
                                        <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i> </a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> <?php echo time_elapsed_string($post['tmp_post']);?></i></a><a href=""><i class="fa fa-comment" aria-hidden="true" ><?php echo  " ".$comments['nbr'];?></i> <a href="<?php echo 'category.php?category='.$post['Categorie'] ?>"><i class="fa fa-question-circle-o" aria-hidden="true"> <?php echo $post['Categorie'] ?></i></a> 
                                        </a> </div>
                                    </div>
                                </div>
                                <div>
                                   
                                </div>
                                
                            </div>
                        </div>
                                            <?php }
                                                mysqli_close($dbco);
 ?>            
                        </section>
                        
                        <!----end of content-2----->
                        
                        <section id="content3">
                              <!--Recently answered Content Section -->
                            <?php
                           require('dbco.php');
    $result = mysqli_query($dbco,"SELECT post.Id_Post,Id ,Titre, Description , Resolu,Categorie, tmp_post ,Nom,Prenom  FROM post , login where post.Id_User=login.Id AND Resolu=0  and Categorie NOT in('Blog')  ORDER by `tmp_post` DESC LIMIT 0, 10");
    while($post = mysqli_fetch_array($result)){
                                           $Pid= $post['Id_Post'] ;
                                        $comment_query= "SELECT count(*) as nbr FROM commentaires where Id_Post=$Pid";
                                        $result2 = mysqli_query($dbco, $comment_query);
                                        $comments = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                        ?>
                        <div class="question-type2033">
                            <div class="row">
                                <div style="float: right;padding: 25px ">
                                        <div class="left-user12923 left-user12923-repeat">
                                        <i class="<?php if($post['Resolu']==1) echo 'fa fa-check'; else  echo 'fa fa-times'; ?>" aria-hidden="true"> </i> </div>
                                    </div>
                                <div class="col-md-1">
                                    <div  style="text-align: center;width: 100px" class="left-user12923 left-user12923-repeat">
                                        <a href="user_question.php?Uid=<?php echo$post['Id'];?>"><object style="border-radius: 50%;    margin-bottom: 10px;" width="60px" height="60px" data="<?php $ext=$post['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

                             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object> </a> <a href="user_question.php?Uid=<?php echo  $post['Id'];?>" style="text-decoration: none"><h5><?php echo  " ".$post['Nom']." ".$post['Prenom'];?></h5> </a> </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="right-description893">
                                        <div id="que-hedder2983">
                                            <h3><a  href="post-deatils.php?qst_id=<?php echo  $post['Id_Post'];?>" ><?php $susp='';$titre=htmlentities(ucfirst($post['Titre'])); if(strlen($titre)>50) $susp="...";  echo substr($titre,0,50).$susp;?></a></h3> </div>
                                        <div style="word-wrap: break-word;" class="ques-details10018">
                                            <p><?php $susp=''; if(strlen($post['Description'])>200) $susp="...";  echo htmlentities(substr($post['Description'],0,200)).$susp ;?></p>
                                        </div>
                                        <hr>
                                        <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i> </a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> <?php echo time_elapsed_string($post['tmp_post']);?></i></a><a href="#"><i class="fa fa-comment" aria-hidden="true" ><?php echo  " ".$comments['nbr'];?></i> <a href="<?php echo 'category.php?category='.$post['Categorie'] ?>"><i class="fa fa-question-circle-o" aria-hidden="true"> <?php echo $post['Categorie'] ?></i></a> 
                                        </a> </div>
                                    </div>
                                </div>
                                <div>
                                   
                                </div>
                                
                            </div>
                        </div>
                                            <?php }
                                                mysqli_close($dbco);
 ?>
                        </section>
                        <!--End content-3 -->
                        
                        
                        
                                 <section id="content4">
                                  <!--No answered Content Section -->
                                  <?php
                           require('dbco.php');
    $result = mysqli_query($dbco,"SELECT post.Id_Post, Id ,Titre, Description ,Categorie, Resolu, tmp_post ,Nom,Prenom FROM post , login where post.Id_User=login.Id and post.Id_Post and Categorie NOT in('Blog') and Id_Post not in (select Id_Post from commentaires ) ORDER by `tmp_post` LIMIT 0, 10
");
    while($post = mysqli_fetch_array($result)){
                                           $Pid= $post['Id_Post'] ;
                                        $comment_query= "SELECT count(*) as nbr FROM commentaires where Id_Post=$Pid";
                                        $result2 = mysqli_query($dbco, $comment_query);
                                        $comments = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                        ?>
                        <div class="question-type2033">
                            <div class="row">
                                <div style="float: right; padding: 25px">
                                        <div class="left-user12923 left-user12923-repeat">
                                        <i class="<?php if($post['Resolu']==1) echo 'fa fa-check'; else  echo 'fa fa-times'; ?>" aria-hidden="true"> </i> </div>
                                    </div>
                                <div class="col-md-1">
                                    <div  style="text-align: center;width: 100px" class="left-user12923 left-user12923-repeat">
                                        <a href="user_question.php?Uid=<?php echo$post['Id'];?>"><object style="border-radius: 50%;    margin-bottom: 10px;" width="60px" height="60px" data="<?php $ext=$post['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

                             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object> </a> <a href="user_question.php?Uid=<?php echo$post['Id'];?>" style="text-decoration: none"><h5><?php echo  " ".$post['Nom']." ".$post['Prenom'];?></h5> </a> </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="right-description893">
                                        <div id="que-hedder2983">
                                            <h3><a  href="post-deatils.php?qst_id=<?php echo  $post['Id_Post'];?>" ><?php $susp='';$titre=htmlentities(ucfirst($post['Titre'])); if(strlen($titre)>50) $susp="...";  echo substr($titre,0,50).$susp;?></a></h3> </div>
                                        <div style="word-wrap: break-word;" class="ques-details10018">
                                            <p><?php $susp=''; if(strlen($post['Description'])>200) $susp="...";  echo htmlentities(substr($post['Description'],0,200)).$susp ;?></p>
                                        </div>
                                        <hr>
                                        <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i> </a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> <?php echo time_elapsed_string($post['tmp_post']);?></i></a><a href="#"><i class="fa fa-comment" aria-hidden="true" ><?php echo  " ".$comments['nbr'];?></i> <a href="<?php echo 'category.php?category='.$post['Categorie'] ?>"><i class="fa fa-question-circle-o" aria-hidden="true"> <?php echo $post['Categorie'] ?></i></a> 
                                        </a> </div>
                                    </div>
                                </div>
                                <div>
                                 
                                </div>
                                
                            </div>
                        </div>
                                            <?php }
                                                mysqli_close($dbco);
 ?>
                             <!--End of content-4-->
                        </section>
                        <?php
                        if(isset($_SESSION['id'])){
                            ?>
                            <section id="content5">
                              <!--Recent Question Content Section -->
                            <?php
                           require('dbco.php');
    $result = mysqli_query($dbco,"SELECT post.Id_Post,login.Id ,Titre, post.Description , Resolu,Categorie, tmp_post ,Nom,Prenom  FROM  post , login where post.Id_User=login.Id   and login.Id=$Uid  ORDER by `tmp_post` DESC LIMIT 0, 10");
    while($post = mysqli_fetch_array($result)){
                                           $Pid= $post['Id_Post'] ;
                                        $comment_query= "SELECT count(*) as nbr FROM commentaires where Id_Post=$Pid";
                                        $result2 = mysqli_query($dbco, $comment_query);
                                        $comments = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                        ?>
                        <div class="question-type2033">
                            <div class="row">

                                <div class="col-md-1">
                                    <div  style="text-align: center;width: 100px" class="left-user12923 left-user12923-repeat">
                                        <a href="user_question.php?Uid=<?php echo$post['Id'];?>"><object style="border-radius: 50%;    margin-bottom: 10px;" width="60px" height="60px" data="<?php $ext=$post['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

                             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object> </a> <a href="user_question.php?Uid=<?php echo  $post['Id'];?>" style="text-decoration: none"><h5><?php echo  " ".$post['Nom']." ".$post['Prenom'];?></h5> </a> </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="right-description893">
                                        <div id="que-hedder2983">
                                            <h3><a  href="post-deatils.php?qst_id=<?php echo  $post['Id_Post'];?>" ><?php $susp='';$titre=htmlentities(ucfirst($post['Titre'])); if(strlen($titre)>50) $susp="...";  echo substr($titre,0,50).$susp;?></a></h3> </div>
                                        <div style="word-wrap: break-word;" class="ques-details10018">
                                            <p><?php $susp=''; if(strlen($post['Description'])>200) $susp="...";  echo htmlentities(substr($post['Description'],0,200)).$susp ;?></p>
                                        </div>
                                        <hr>
                                        <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i> </a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> <?php echo time_elapsed_string($post['tmp_post']);?></i></a><a href="#"><i class="fa fa-comment" aria-hidden="true" ><?php echo  " ".$comments['nbr'];?></i> <a href="<?php echo 'category.php?category='.$post['Categorie'] ?>"><i class="fa fa-question-circle-o" aria-hidden="true"> <?php echo $post['Categorie'] ?></i></a> 
                                        </a> </div>
                                    </div>
                                </div>
                                <div>
                                <div style=" padding: 25px">
                                    
                                </div>   
                                </div>
                                
                            </div>
                        </div>
                                            <?php }
                                                mysqli_close($dbco);
 ?>    

                            <!--End of content-5-->
                        </section>
                            <?php
                        }?>
                        
               
                    </div>
                </div>
                <!--end of col-md-9 -->
                 <aside class="col-md-3 sidebar97239">
                    <div class="status-part3821">
                        <h4>statistique</h4> <a href="#"><i class="fa fa-question-circle" aria-hidden="true"> Question(<?php
                           require('dbco.php');
                                $result = mysqli_query($dbco,"SELECT count(*)  FROM  post where Categorie not in ('Blog')");
                               $statistiq= mysqli_fetch_array($result);
                               echo $statistiq['count(*)'];
                                   mysqli_close($dbco); ?>)</i></a> <i class="fa fa-comment" aria-hidden="true"> Réponse(<?php
                           require('dbco.php');
    $result = mysqli_query($dbco,"SELECT count(*)  FROM  commentaires ");
   $statistiq= mysqli_fetch_array($result);
   echo $statistiq['count(*)'];
      mysqli_close($dbco);  ?>)</i> </div>
                    <div class="categori-part329">
                        <h4>Categories</h4>
                        <ul>
                            <li>
                             <a href="category.php?category=Parcours(MIP)">MIP</a>
                            </li>  
                            <li>
                            <a href="category.php?category=Parcours(BCG)">BCG</a>
                            </li>  
                            <li>
                            <a href="category.php?category=Parcours(GEGM)">GEGM</a>
                            </li>  
                            <li><a href="category.php?category=Evenement+scolaire" target="_blank">Evenement scolaire</a></li>
                            <li><a href="category.php?category=Clubs" target="_blank">Clubs</a></li>
                            <li><a href="category.php?category=Apres+le+parcours" target="_blank">Aprés le parcours</a></li>
                            <li><a href="category.php?category=Aide+et+discussion" target="_blank">Aide et discussion</a></li>
                        </ul>
                    </div>
                    <!--             social part -->
                    <div class="social-part2189">
                        <h4>Trouvez nous facilement</h4>
                     
                 </strong> </a>
                        </li>
                        <li class="facebook-two">
                            <a href="#" target="_blank"> <strong>
                    <span>Subscribe</span>
                         <i class="fa fa-facebook" aria-hidden="true"></i>
       
                     <br>
                     <small> Facebook </small>
                     
                 </strong> </a>
                        </li>
                        <li class="twitter-three">
                            <a href="#" target="_blank"> <strong>
                    <span>Subscribe</span>
                <i class="fa fa-twitter" aria-hidden="true"></i>
       
                     <br>
                     <small>twitter </small>
                     
                 </strong> </a>
                        </li>
                        <li class="youtube-four">
                            <a href="#" target="_blank"> <strong>
                    <span>Subscribe</span>
               <i class="fa fa-youtube" aria-hidden="true"></i>
       
                     <br>
                     <small> youtube </small>
                     
                 </strong> </a>
                        </li>
                    </div>
                    <!--              login part-->
                   <?php if(!isset($_SESSION['id'])){
                                ?>
                    <div class="login-part2389">
                        <h4>Connexion</h4>
                        <div class="input-group300"> <span><i class="fa fa-user" aria-hidden="true"></i></span>
                            <form  action="login.php" method="POST">
                                <input type="text" name="email" class="namein309" placeholder="Nom d'utilisateur / e-mail"> </div>
                        <div class="input-group300"> <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <input type="password"name="password" class="passin309" placeholder="Mot de passe"> </div>
                        <a href="#">
                            <button name="submit" type="submit" class="userlogin320">Connexion</button>
                        </a>
                        <div class="rememberme">
                            <label>
                                 <a href="signup.php" class="resbutton3892">S'inscrire</a> 
                                 <br>
                            </form>
                            </div>
                    </div>
                  <?php } ?>
                    

                    <!--          start tags part-->
                    <div class="tags-part2398">
                        <h4>Tags</h4>
                        <ul>
                            <li><a href="#">fsts</a></li>
                            <li><a href="#">parcours</a></li>
                            <li><a href="#">examens</a></li>
                            <li><a href="#">inscription</a></li>
                            <li><a href="#">cours</a></li>
                            <li><a href="#">clubs</a></li>
                            <li><a href="#">etudiants</a></li>
                            <li><a href="#">intégration</a></li>
                            
                        </ul>
                    </div>
                    <!--          End tags part-->
                    <!--        start recent post  -->
                    <div class="recent-post3290">
                        <h4>Derniers postes</h4>
                        <?php
                           require('dbco.php');
    $result = mysqli_query($dbco,"SELECT post.Id_Post ,Titre, Description , tmp_post FROM post   ORDER by `tmp_post` DESC LIMIT 0, 3");
    $i=0;
    while($post = mysqli_fetch_array($result)){                                        
                                $i=$i+1;        ?>
                        <div style="word-wrap: break-word;width: 200px" class="post-details021"> <a href="post-deatils.php?qst_id=<?php echo  $post['Id_Post'];?>"><h5><?php $susp='';$titre=htmlentities(ucfirst($post['Titre'])); if(strlen($titre)>30) $susp="...";  echo substr($titre,0,30).$susp;?></h5></a>
                            <p><?php $susp=''; if(strlen($post['Description'])>100) $susp="...";  echo htmlentities(substr($post['Description'],0,100)).$susp ;?></p> <small style="color: #848991"><?php echo  $post['tmp_post'];?></small> </div>
                        <?php if($i<3){ ?><hr><?php }} ?>
                        
                    </div>
                    <!--       end recent post    -->
                </aside>
            </div>
        </div>
    </section>
    <!--    footer -->
  <br>
  <br>
    <section class="footer-part">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="info-part-one320">
                             <a  href="#"><img src="image/logofst.png" alt="Logo"></a>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="info-part-one320">
                        <h4>A propos FSTS</h4><br>
                        
                        <p>
                         Cet établissement est destiné à s’intégrer dans le pôle technologique et industriel des villes de Casablanca, Settat et Berrechid ,pour être, une pépiniére de techniciens et de cadres de haut niveau .</p>
                        <h4>Qui nous sommes ? </h4>
                        <p>Bienvenue,nous sommes des étudiants de licence Génie informatique à fsts, nous avons créé ce site web afin de poser toutes questions que vous avez sur Fsts et avoir tous les informations sur nous .</p>

                         
                       
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="info-part-three320">
                        <h4>Contact Fsts informations</h4>
                        <div class="news-info209">
                           
                            <p>FST de Settat, Km 3, B.P. : 577 Route de Casablanca</p>  </div>
                         <div class="news-info209">
                           
                            <p>Tél : 0523.40.07.36</p>
                              </div>

                            <div class="news-info209">
                            <p>Fax : 0523.40.09.69</p>  </div>

                            <div class="news-info209">
                            <p>Email : contact_fsts@uhp.ac.ma</p>  </div>

                    </div>
                </div>

                 <div class="col-md-3">
                    <div class="info-part-three320">
                        <h4>Contactez-nous</h4>
                        <div class="news-info209">
                           
                            <p>FST de Settat, Km 3, B.P. : 577 Route de Casablanca</p>  </div>
                         <div class="news-info209">
                           
                            <p>Tél : 06-66-66-45-48</p>
                              </div>

                            <div class="news-info209">
                            <p>Fax : 0525-25-65-85</p>  </div>

                            <div class="news-info209">
                            <p>Email : supportforum@gmail.com</p>  </div>

                    </div>
                </div>
               
               
               
        </div>
    </section>
    <section class="footer-social">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright 2020 Des Questions ? | <strong>Fsts</strong></p>
                </div>
               
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/editor.js"></script>
    <script>
        $(document).ready(function () {
            $("#txtEditor").Editor();
        });
    </script>
</body>

</html>