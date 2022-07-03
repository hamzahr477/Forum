 <?php
    require('modele-top.php');?>
<!--===breadcrumb=====-->
    <section class="header-descriptin329">
        <div class="container">
            <h3 style="color:#DAA520 ">Blog</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="Accueil.php">Accueil</a></li>
                <li class="active">Blog</li>
            </ol>
        </div>
    </section>

<!--====body content ===-->
    <section class="main-content920">
      <div class="container">
            <div class="row">
                <div class="col-md-9 blog--top-part2892">  
<?php
                        

            require('dbco.php');

            require('phpf/horaire.php');

                                        $post_query= "SELECT post.Id_Post,login.Id ,Titre, post.Description,Extension , Resolu,Categorie, tmp_post ,Nom,Prenom  FROM membre_infos, post , login where post.Id_User=login.Id AND membre_infos.Id=login.Id AND Type='admin'  ORDER by `tmp_post`  ";
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
    $result = mysqli_query($dbco,"SELECT post.Id_Post,login.Id ,Titre, post.Description,Extension , Resolu,Categorie, tmp_post ,Nom,Prenom  FROM membre_infos, post , login where post.Id_User=login.Id AND membre_infos.Id=login.Id AND Type='admin'  ORDER by `tmp_post` DESC LIMIT $offset, $total_records_per_page");
    while($post = mysqli_fetch_array($result)){
                                           $Pid= $post['Id_Post'] ;
                                        $comment_query= "SELECT count(*) as nbr FROM commentaires where Id_Post=$Pid";
                                        $result2 = mysqli_query($dbco, $comment_query);
                                        $comments = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                        ?>
        
                    <div class="blog-part3903"> 
                       <?php if($post['Extension']=='jpg' || $post['Extension']=='jpeg' || $post['Extension']=='png' || $post['Extension']=='gif'  ){
                        $Pid=$post['Id_Post'];
                        $ext=$post['Extension'];
                        echo "<center><img width=600px src='uploads/$Pid.$ext' alt='Image' class='img-responsive'></center>";}?>
                        <div style="word-wrap: break-word;" class="blog-details3902">
                            <h3><span><i class="
                                <?php if($post['Extension']==''){echo '';} else if($post['Extension']=='jpg' || $post['Extension']=='jpeg' || $post['Extension']=='png' || $post['Extension']=='gif'  ){echo 'fa fa-picture-o' ;}else {echo 'fa fa-download' ;} ?>

                                " aria-hidden="true"></i></span> <?php $susp='';$titre=htmlentities(ucfirst($post['Titre'])); if(strlen($titre)>50) $susp="...";  echo substr($titre,0,50).$susp; ?></h3>
                            <p><?php $susp=''; if(strlen($post['Description'])>200) $susp="...";  echo htmlentities(substr($post['Description'],0,200)).$susp ;?></p><hr>
                            
                         <div class="ques-icon-info2933"> <a href="user_question.php?uid=<?php echo  $post['Id'];?>"><i class="fa fa-user" aria-hidden="true"> <?php echo  " ".$post['Nom']." ".$post['Prenom'];?></i></a> <a href="#"><i class="fa fa-calendar" aria-hidden="true"> <?php echo time_elapsed_string($post['tmp_post']);?></i></a> <a href="#"></a> <a href="#"><i class="fa fa-comments-o" aria-hidden="true"> <?php echo  " ".$comments['nbr'];?> Commentaires</i></a> <a href="#"> </div>
                            
                            <div class="continue-deatils738"> <a href="<?php echo 'post-deatils.php?qst_id='.$Pid?>"> <i class="fa fa-plus" aria-hidden="true"> Completer la lecure</i></a> </div>
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
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
                    </center>
                </div>



<?php

        require('modele-bottom.php');
    ?>
