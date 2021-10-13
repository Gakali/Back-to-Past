<h1>Un saut dans le Passé </h1>
<h2 class='backTxt'>Accueil</h2>



<div class='wrapper'>
   <section class='Carroussel'>
        <h2>Quelques objets</h2>
      <div class="carousCont">
          
        <span id="previous"><i class="fas fa-arrow-left"></i></span>
        <span id="next"><i class="fas fa-arrow-right"></i></span>
    
        <div id="slider" class="slider">
          <img src="assets/img/carouss/car1.jpg" alt="appareil photo">
          <img src="assets/img/carouss/car2.jpg" alt="cassette">
          <img src="assets/img/carouss/vinyl.jpg" alt="vinyl">
          <img src="assets/img/carouss/car4.jpg" alt="deux roues">
          <img src="assets/img/carouss/clock.jpg" alt="montre à gousset">
          <img src="assets/img/carouss/film.png" alt="pelicules photo">
          <img src="assets/img/carouss/train.jpg" alt="train à vapeur">
        </div>
      </div>
  </section>
  

    <div class='indicator-scroll'>
    Scroll to see More
        <div class='scroll-arrow'> 
            <img src="assets/img/svg/arrow-scroll.svg" alt="flèche">
        </div>
    </div>
    
    <div class='home-content'> 

        <aside class='quizContent'>
        
            <div class="container">
                <div id="quiz">
                      <div class="choices">
                          <h2>
                              <span class='titleSec'>Le Quiz retro</span>
                          </h2>
                          <div>
                            <h2 id="question"></h2>
                            <h2 id="score"></h2>
                          </div>
                          
                        <button id="guess0" class="btn btnQuiz">        
                          <span id="choice0">
                              
                          </span>
                        </button>
                
                        <button id="guess1" class="btn btnQuiz">
                          <span id="choice1">
                              
                          </span>
                        </button>
                          
                        <button id="guess2" class="btn btnQuiz">
                          <span id="choice2">
                              
                          </span>
                        </button>
                          
                        <button id="guess3" class="btn btnQuiz">
                          <span id="choice3">
                              
                          </span>
                        </button>
                        <p id="progress">
                            
                        </p>
                      </div>
                </div>
            </div>
            
        </aside>
        
            <section class='description'>
                
                <h2><span class='titleSec'>Description</span></h2>
    
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut sit quam perferendis, totam aliquid nesciunt sint quae debitis cumque, repudiandae eligendi, id unde deserunt eveniet dolor possimus non voluptas laboriosam.
            
                        </p>
    
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut sit quam perferendis, totam aliquid nesciunt sint quae debitis cumque, repudiandae eligendi, id unde deserunt eveniet dolor possimus non voluptas laboriosam.
                            
                        </p>
    
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut sit quam perferendis, totam aliquid nesciunt sint quae debitis cumque, repudiandae eligendi, id unde deserunt eveniet dolor possimus non voluptas laboriosam.
                            
                        </p>
    
            </section>
                
              
    </div>              
              
              
              
        <section class='ambitions'>
            
            <h3><span class='titleSec'>Nos ambitions</span></h3>
            
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, consequatur, explicabo, ipsam, ad facere accusamus repellat repellendus ea commodi unde rerum blanditiis quam totam corporis eius reiciendis modi veritatis ut dolor officia quasi tenetur tempore amet officiis cupiditate incidunt nostrum ex voluptas dignissimos cum. Repudiandae, nisi, vitae recusandae ipsa reprehenderit perspiciatis rem numquam quaerat. Placeat quam deleniti iusto doloremque voluptas. 
            </p>
             <p>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium, voluptatum, iure numquam hic quas rem explicabo excepturi dignissimos maxime voluptates unde facere at quia mollitia quidem consectetur amet illum magnam id rerum eum dolores suscipit nihil accusamus doloribus. Corporis, excepturi autem iure cumque ad quis obcaecati. Pariatur, quia, voluptatem, voluptate quidem illum consequatur repellat aliquam nam cumque facere doloremque minus.
            </p>
             <p>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, libero, incidunt asperiores cupiditate eum laborum dolor tempore voluptatum recusandae alias sunt temporibus perspiciatis error voluptate excepturi velit voluptas odio dolorum omnis perferendis. Dolores, quo, dolorum, quia, iste consequatur est eveniet officia eius et accusamus eaque nihil ut sunt. Minima, alias iste voluptatum molestiae expedita sint enim quis quae dolorum ducimus. 
            </p>
            
        </section>
        
        
    <section>
            
            <h2>Les avis </h2>
            
            <p>Laissez nous un avis</p>
    
            <aside class='aside'>
    
                <div>
                    <p class='info'> Ils parlent de nous  </p>
                        <?php foreach($articles as $article){ ?>
                    
                    <div class='box-review'>
                        
                        <div class='eachReview'>
                            <h3> By <?= htmlspecialchars($article['Login']) ?></h3>
                            <q><?= htmlspecialchars($article['comment'])?></q>
                            <cite>Publié le <?= $article['publication_date'] ?></cite>
                        </div>
                        
                        <div class='eval<?= $article['rate'] ?>'>
                                <span class='starsOutput'>&starf;</span><!--
                            --><span class='starsOutput'>&starf;</span><!--
                            --><span class='starsOutput'>&starf;</span><!--
                            --><span class='starsOutput'>&starf;</span><!--
                            --><span class='starsOutput'>&starf;</span>
                        </div>
                    
                    </div>
                    
                    <?php } ?>
                </div>
    
                <!--if user is connected -->  
            
       <div>     
           <?php if(!empty($_SESSION['user'])){ ?>
           
            <div id='avgRating'>
                Notre moyenne est de <div id='rateAVG'></div>/5
            </div>
            
               <div class='emotion'>
                    
                </div>
                
               <div>
                    <span class='starsOutput'>&starf;</span><!--
                    --><span class='starsOutput'>&starf;</span><!--
                    --><span class='starsOutput'>&starf;</span><!--
                    --><span class='starsOutput'>&starf;</span><!--
                    --><span class='starsOutput'>&starf;</span>
               </div>
               
               <p class='info'>Prennez la parole </p>
               
               <button id='revFeedb' class='like'>Votre avis</button>
               
               <div class='toggleView hidden'>
                    
                    <?php if(!empty($_SESSION['user']['photo'])){ ?>
                            
                            <div class='logProf-template'>
                                 <img src='assets/img/profils/<?= $_SESSION['user']['login'] ?>/<?= $_SESSION['user']['photo']?>' alt='Photo de profil'>
                            </div>
                            
                        <?php }else{ ?>
                    <i class="fas fa-user-circle fa-5x"></i>
                    
                    <?php } ?>
                    
                    <div class="bubble">
                         <div>
                            <cite class='buttonImit'><?= $_SESSION['user']['login']?></cite>
                        </div>
                        
                        <form action='index.php?p=review' method='post'>
                            <div>
                                <label for="Comments"><small>Votre avis nous intéresse !</small></label>
                                <textarea id="comments" name="comments" placeholder='Votre commentaire'></textarea>
                            </div>
                            
                            <div class='ratingStars'>
                                
                                <span class='stars test' data-value="1">&starf;</span><!--
                                --><span class='stars' data-value="2">&starf;</span><!--
                                --><span class='stars' data-value="3">&starf;</span><!--
                                --><span class='stars' data-value="4">&starf;</span><!--
                                --><span class='stars' data-value="5">&starf;</span>
                            </div>
                            
                                <input type="hidden" name='sccoring' id='scoring' value='0'>
                                <button type='submit' class='succes'>Envoyer</button>
                        </form>
                    </div>
                </div> 
                    <!--if user not connected --> 
                    
                    <?php }else{ ?>
                    
                    <div id='avgRating'>
                        Notre moyenne est de <div id='rateAVG'></div>/5
                    </div>
                    
                    <div class='emotion'>
                    
                    </div>
                    
                    <div class='ratingStars'>
                            <span class='starsOutput'>&starf;</span><!--
                        --><span class='starsOutput'>&starf;</span><!--
                        --><span class='starsOutput'>&starf;</span><!--
                        --><span class='starsOutput'>&starf;</span><!--
                        --><span class='starsOutput'>&starf;</span>
                    </div>
                    
                        <p class='info'>Pour deposer un avis Merci de vous connecter</p>
                        <a href='index.php?p=login' class='buttonImit'>Accès à mon Compte</a>
                    
                    
                    <?php } ?>
                
             </div>      
    
            </aside>
    </section>
    
</div>