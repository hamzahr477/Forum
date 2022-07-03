
    <!--    breadcumb of category -->

    <?php

    require('modele-top.php');
    $e=0;
    if(isset($_GET["category"])){
        if($_GET["category"]=="Parcours(MIP)" ||
           $_GET["category"]=="Parcours(BCG)" || 
           $_GET["category"]=="Parcours(GEGM)" ||
           $_GET["category"]=="Clubs"  ||
           $_GET["category"]=="Aide et discussion" ||
           $_GET["category"]=="Apres le parcours" ||
           $_GET["category"]=="Evenement scolaire" ){
            require_once("dbco.php");
        $Categorie=$_GET["category"];
            $e=1;
            ?>

<section class="header-descriptin329">
        <div class="container">
            <h3 style="color:#DAA520 ">Toutes les questions à propos de " <?php echo $_GET['category']; ?> " </h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="Accueil.php">Accueil</a></li>
                <li class="active">
                    <?php echo $_GET['category']; ?>
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
                        <?php
                        


            require('phpf/horaire.php');

                                        $post_query= "SELECT post.Id_Post,login.Id ,Titre, post.Description , Resolu, tmp_post ,Nom,Prenom FROM membre_infos,post , login where post.Id_User=login.Id AND membre_infos.Id=login.Id and Categorie='$Categorie' and Type NOT IN ('admin') ORDER by `tmp_post` ";
                                        $result = mysqli_query($dbco, $post_query);
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
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
    $result = mysqli_query($dbco,"SELECT post.Id_Post,login.Id ,Titre, post.Description , Resolu, tmp_post ,Nom,Prenom FROM membre_infos,post , login where post.Id_User=login.Id AND membre_infos.Id=login.Id and Categorie='$Categorie' and Type NOT IN ('admin') ORDER by `tmp_post` DESC LIMIT $offset, $total_records_per_page");
    while($post = mysqli_fetch_array($result)){
                                           $Pid= $post['Id_Post'] ;
                                        $comment_query= "SELECT count(*) as nbr FROM commentaires where Id_Post=$Pid";
                                        $result2 = mysqli_query($dbco, $comment_query);
                                        $comments = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                        ?>
                        <div class="question-type2033">
                            <div class="row">
                                <div class="col-md-1">
                                    <div  style="width: 100px" class="left-user12923 left-user12923-repeat">
                                        <a href="<?php  echo 'user_question.php?uid='.$post['Id'] ?>"> <object style="border-radius: 50%;    margin-bottom: 10px;" width="60px" height="60px" data="<?php $ext=$post['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object></a>
                                         <a href="user_question.php?uid=<?php echo  $post['Id'];?>" style="text-decoration: none"><h5><?php echo  " ".$post['Nom']." ".$post['Prenom'];?></h5> </a> </div>
                                </div>
                                <div style="min-height: 130px;" class="col-md-9">
                                    <div  class="right-description893">
                                        <div id="que-hedder2983">
                                            <h3><a  href="post-deatils.php?qst_id=<?php echo  $post['Id_Post'];?>" target="_blank"><?php echo ucfirst($post['Titre']) ?></a></h3> </div>
                                        <div class="ques-details10018">
                                            <p><?php $susp=''; if(strlen($post['Description'])>200) $susp="...";  echo substr($post['Description'],0,200).$susp ;?></p>
                                        </div>
                                            
                             
                                        <div style="position: absolute; bottom: 0 ; width:100%" ><hr>
                                        <div  class="ques-icon-info3293">
                                        
                                          <i class="<?php if($post['Resolu']==1) echo 'fa fa-check'; else  echo 'fa fa-times'; ?>" aria-hidden="true"> </i>  <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> <?php echo time_elapsed_string($post['tmp_post']);?></i></a><a href="#"><i class="fa fa-comment" aria-hidden="true" ><?php echo  " ".$comments['nbr'];?></i> <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"> Question</i></a> 
                                        </a> </div></div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                                            <?php }
                                                mysqli_close($dbco);
 ?>    

 
                    <center>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?category=".$Categorie."&page_no=$previous_page'"; } ?>>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?category=".$Categorie."&page_no=$counter'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?category=".$Categorie."&page_no=$counter'>$counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?category=".$Categorie."&page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?category=".$Categorie."category=".$Categorie."&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?category=".$Categorie."&page_no=1'>1</a></li>";
        echo "<li><a href='?category=".$Categorie."&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?category=".$Categorie."&page_no=$counter'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?category=".$Categorie."&page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?category=".$Categorie."&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?category=".$Categorie."&page_no=1'>1</a></li>";
        echo "<li><a href='?category=".$Categorie."page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?category=".$Categorie."&page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?category=".$Categorie."&page_no=$next_page'"; } ?>>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?category=".$Categorie."&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
                    </center>
                    </section>
                </div>
                <!-- end of col-md-9 -->


        <?php

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
    require('modele-bottom.php');
    ?>
    
                <!--strart col-md-3 (side bar)-->
                