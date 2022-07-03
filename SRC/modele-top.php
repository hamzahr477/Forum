<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
          <script src="js/syslike.js"></script>

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum FSTS</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style-accueil.css" rel="stylesheet" type="text/css">

    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>

<body>
     <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="navbar-menu-left-side239">
                        <ul>
                            <?php
                            require_once("verify_cnx.php");
                            require_once("insriScript.php");
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
               
              
                <!-- Collect the nav links, forms, and other content for toggling -->
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
                        <li><a href="post.php" ><?php if(isset($_SESSION['admin']))
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
                                
                                <div class="dropdown-cont">
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
    
    
<!--===breadcrumb=====-->