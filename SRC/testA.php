<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  require('modele-top.php');
?>
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9 user-profile328903">
                        <div class="about-user2039">
                           <div class="row">
                           <div class="col-md-1">
                            <div class="user-image2939303"> <img src="image/images.png" alt="Image"> </div>
                               </div>
                               <div class="col-md-11">
                            <div class="user-description3903"> <a href="user_question.html" target="_blank">Ask Ahmed Hasan</a> <span class="badge229">
                        <a href="#">Mid</a></span>
                                <p>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vitae velit in neque dictum blandit. Curabitur vitae velit in neque dictum blandit.Curabitur vitae velit in neque dictum blandit. </p>
                            </div>
                            <div class="user-social3903">
                                <p>Follow : <span>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                               </span> </p>
                                    </div>
                                       </div>
                            </div>
                        </div>
                      <div class="about-user2039">
                           <div class="row">
                           <div class="col-md-1">
                            <div class="user-image2939303"> <img src="image/images.png" alt="Image"> </div>
                               </div>
                               <div class="col-md-11">
                            <div class="user-description3903"> <a href="user_question.html" target="_blank">Ask Ahmed Hasan</a> <span class="badge229">
                        <a href="#">Beginner</a></span>
                                <p>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vitae velit in neque dictum blandit. Curabitur vitae velit in neque dictum blandit.Curabitur vitae velit in neque dictum blandit. </p>
                            </div>
                            <div class="user-social3903">
                                <p>Follow : <span>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                               </span> </p>
                                    </div>
                                       </div>
                            </div>
                        </div>
               
                </div>
                
<?php
require('modele-bottom.php');
?>








 <div style="bottom: 15px" class="author-img202l"> 
                           <a href="<?php  echo 'user_question.php?uid='.$data['Id'] ?>"> <object class=".author-img202l" style="width: 60px;height: 60px; border-radius: 50%;"  data="<?php $ext=$data['Id']; echo 'imgusers/'.$ext.'?sdqzz' ?>" alt="Photo" type="image/png">

             <img  src="image/images.png?vdsv"  style="width: 60px;height: 60px; border-radius: 50%;"  alt="Photo"> 
                           </object></a>
                            <div class="au-image-overlay text-center"> <a style="color:#fd6372;text-decoration: none " href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a> </div>
                        </div> <span class="author-deatila04re"><span style="float: right;" class="badge229">
                        <a href="#"><?php echo ucfirst($data['Type'])?></a>
                    </span>
                   <h5><a href="<?php echo 'user_question.php?uid='.$ext?>"><?php echo $data['Nom']." ".$data['Prenom']?></a></h5>
                   
                    <p style="margin-left:80px "><?php $susp=''; $desc=$data['description'];if(strlen($data['description'])==0) $desc= 'Aucune description';  else if(strlen($desc)>200) $susp="...";  echo substr($desc,0,200).$susp ;?></p>
                    
                </span> 