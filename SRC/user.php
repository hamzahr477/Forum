<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  require('modele-top.php');
  require('dbco.php');
  ?>
  <!--===breadcrumb=====-->
    <section class="header-descriptin329">
        <div class="container">
            <h3 style="color:#DAA520 ">Utilisaters</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="Accueil.php">Accueil</a></li>
                <li class="active">utilisateurs</li>
            </ol>
        </div>
    </section>

<!--====body content ===-->
 <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9 user-profile328903">
                  <div style="color:#A9A9A9 ">
                    <h4>
                    <?php
                    if(isset($_GET['search'])){
                      $cherche=$_GET['search'];
                      echo "Cherche à '$cherche'";
                    }
                    ?>
                  </h4>
                  </div>
                   <div  style=" margin-top: 25px;margin-bottom: 0px" class="footer-search">
        <div style=" margin-top:0px" >
            <div class="row">
                <div id="custom-search-input">
                  <form method="GET">
                    <div class="input-group col-md-12"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <input type="text" name="search" class="  search-query form-control user-control30" placeholder="Recherche" value="<?php   if(isset($_GET['search'])){ echo $_GET['search'];}  ?>" /> <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class="glyphicon glyphicon-search"></span> </button>
                        </span>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
   
  <?php
  if(isset($_GET['search'])){
    $arr_cherche=explode(" ", $cherche);
    $val1=$arr_cherche['0'];
    $str_cherche1="Nom LIKE '$val1%' ";
    $str_cherche2='';
    foreach ($arr_cherche as $value) {
      $str_cherche1=$str_cherche1."or Nom LIKE '".$value."%' ";
      $str_cherche2=$str_cherche2."or Prenom LIKE '".$value."%' ";
    }
    $str_final=$str_cherche1.$str_cherche2;
  $query="SELECT login.Id ,Nom,Etat ,Prenom , Type, description from login , membre_infos where login.id=membre_infos.id and ($str_final)";
  }
  else {
$query="SELECT login.Id ,Nom ,Prenom,Etat , Type, description from login , membre_infos where login.id=membre_infos.id  ";  }
 if(!isset($_SESSION['admin'])){
  $query=$query." and Etat not in ('susp')";
 }
 $query=$query."order by Type desc";
  
  $resu=mysqli_query($dbco,$query);
   while($data = mysqli_fetch_array($resu)){
?>
   
                        <div class="status-part3821" style="margin-top:20px ; padding: 30px">
                           <div class="row">

 <div style="bottom: 15px" class="author-img202l"> 
                           <a href="<?php  echo 'user_question.php?uid='.$data['Id'] ?>"> <object class=".author-img202l" style="width: 60px;height: 60px; border-radius: 50%;"  data="<?php $ext=$data['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object></a>
                            <div class="au-image-overlay text-center"> <a style="color:#fd6372;text-decoration: none " href=''><i class="fa fa-plus-square-o" aria-hidden="true"></i></a> </div>
                        </div> <span class="author-deatila04re"><span style="float: right;" class="badge229">
                        <a href=""><?php echo ucfirst($data['Type'])?></a>
                    </span>
                    <?php if(isset($_SESSION['admin'])){?>
                    <span style="float: right;" class="badge229">
                        <a href=""> <?php echo ucfirst($data['Etat']) ?></a>
                    </span>
                  <?php } ?>
                   <h5><a href="<?php echo 'user_question.php?uid='.$ext?>"><?php echo $data['Nom']." ".$data['Prenom']?></a></h5>
                   
                    <p style="margin-left:80px "><?php $susp=''; $desc=$data['description'];if(strlen($data['description'])==0) $desc= 'Aucune description';  else if(strlen($desc)>200) $susp="...";  echo substr($desc,0,200).$susp ;?></p>
                    
                </span> 
                            </div>
                        </div>

                      <?php

}
                      ?>
            </div>



                <?php
require('modele-bottom.php');
?>