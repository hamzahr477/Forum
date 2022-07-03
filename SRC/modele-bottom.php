<!--end of col-md-9 -->
                 <aside class="col-md-3 sidebar97239">
                    <div class="status-part3821">
                        <h4>statistique</h4> <a href=""><i class="fa fa-question-circle" aria-hidden="true"> Question(<?php
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
                        <div style="word-wrap: break-word;width: 200px" class="post-details021"> <a href="post-deatils.php?qst_id=<?php echo  $post['Id_Post'];?>"><h5><?php $susp='';$titre=ucfirst($post['Titre']); if(strlen($titre)>30) $susp="...";  echo substr($titre,0,30).$susp;?></h5></a>
                            <p><?php $susp=''; if(strlen($post['Description'])>100) $susp="...";  echo substr($post['Description'],0,100).$susp ;?></p> <small style="color: #848991"><?php echo  $post['tmp_post'];?></small> </div>
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