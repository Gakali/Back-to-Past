
<div class='pastPage'>

    <section>
        <h1 id='past'>Bienvenue dans la caverne Retro</h1>
        
        <?php if(empty($_SESSION['user'])) : ?>
          
            <div class='not-addArcicle'>
                
                <div class='info-article'>
                    <p>Connectez-vous pour ajouter des Articles</p>
                    <a href="index.php?p=login#login">Mon espace <i class="fas fa-user-circle"></i></a>
                </div>
                
                <div class='partImg'>
                    
                    <div class='article-img nthTwo'>
                        <img src="assets/img/pages/radios.jpg" alt="old radios">
                    </div>
                    <div class='article-img nthThree'>
                        <img src="assets/img/pages/DowhatYouLove.jpg" alt="vinyl" >
                    </div>
                    <div class='article-img nthOne'>
                        <img src="assets/img/pages/yellowGameBoy.jpg" alt="yellow Game Boy" >
                    </div>
                  
                </div>
                <div class='indicator-scroll'>Scroll to see More
                    <div class='scroll-arrow'>
                         <img src="assets/img/svg/arrow-scroll.svg" alt="">
                    </div>
                </div>
        
        
        <?php endif; ?>
        
        <?php if(!empty($_SESSION['user'])) : ?>
       
       <div class='addArcicle'>
           <div class='pop'></div>
           <div class='not-addArcicle'>
               
                <div class='info-article'>
                    <h2>Proposer un article</h2>
                    <button id='article' class='like'>Ajouter</button>
                    
                     <?php  if(!empty($messages['errors'])){  ?>
            
                 <ul>
                    <?php foreach($messages['errors'] as $error):  ?>    
                    <li><?=  $error ?></li>
                    <?php endforeach ?>    
                </ul>
                
                
                <?php    }  ?>
                
                <div class='indicator-scroll'>Scroll to see More
                    <div class='scroll-arrow'>
                         <img src="assets/img/svg/arrow-scroll.svg" alt="">
                    </div>
                </div>
                <?php if(!empty($messages['success'])){
                    var_dump($messages);
                } ?>
                
                <div class='form-article hidden'>
                    
                
                    
                     <form enctype="multipart/form-data" action="index.php?p=past" method="post" class='formBody'>
                         
                        <div class='items-form'>
                            
                            <label for="title" class='contentArticle'><i class="fas fa-file-invoice"></i></label>
                            <input type="text"  id="title" name="title" placeholder="Titre" class='contentArticle'>
                        </div>
                        
                        <div class='items-form'>
                            <label for="content" class='contentArticle'><i class="fas fa-edit"></i></label>
                            <textarea class="descripArt" id="content" name="content" placeholder="Votre description" ></textarea>
                        </div>
                        
                        <div class='containerArticle limit'>
                            
                            <label for="category" class='contentArticle'>Catégories</label>
                            
                            <select class="form-control" id="category" name="category" class='contentArticle'>
                                <option value="" selected>Choisissez une catégorie</option>
                                <option value="jeux">Jeux</option>
                                <option value="objets">Objets du quotidien</option>
                                <option value="outils">Outils</option>
                                <option value="autres">Autres</option>
                            </select>
                            
                        </div>
                        
                        <div class='items-form'>
                            <label for="photo" class='contentArticle'><i class="fas fa-file-image"></i></label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                            <input type="file" id="photo" name="photo" class='contentArticle'>
                        </div>
                        
                        <div >
                          
                            <button type="submit" id="form-submit" class="succes" class='contentArticle'>Envoyer l'article</button>
                         
                        </div>
                    </form>
                    
                </div>
                
             
                    
                </div>
                
             <div class='partImg'>
                
                <div class='article-img nthTwo'>
                    <img src="assets/img/pages/radios.jpg" alt="old radios">
                </div>
                <div class='article-img nthThree'>
                    <img src="assets/img/pages/DowhatYouLove.jpg" alt="vinyl" >
                </div>
                <div class='article-img nthOne'>
                    <img src="assets/img/pages/yellowGameBoy.jpg" alt="yellow Game Boy" >
                </div>
              
            </div>
                
               <?php endif; ?> 
      
         </div>
    </section>

    
    <section class='deco-section'>
          <h2 class='backTxt'> Vos Articles</h2>
           
          <div class='rotateArt'>     
            <?php foreach($articles as $article) : ?>
            <?php if(isset($article['img'])) : ?>
                    
                
            <div class='img-deco'>
                <img src="./assets/img/articles/<?= $article['id']?>/<?= $article['img']?>" class="card-img-top" alt="image <?= $article['img']?>">
            
                      
                      <?php endif; ?>
              
                <p class='big'>
                  <?= htmlspecialchars(strtoupper($article['title'])) ?>
                  <?= htmlspecialchars($article['login'])?>
                </p>
            </div>
             
              <?php endforeach; ?>
           </div>  
        
    </section>
    
    
    
    
    
    
    <section class='publications'>
        
        <div class='titleUser'>
            <h2>vos publications </h2>
            <p>Cette section regroupe l'ensemble de vos publications  </p>
        </div>
        
        <div>
            <div class='square-article'>
                
                    <?php foreach($articles as $article) : ?>
                    
                    
                <div >
                   <div class='eachArt'>
                       
                       <div class='contentTitleL'>
                           <div class='title-left'>
                              
                                  By: <?= htmlspecialchars(strtoupper($article['login'])) ?>
                             
                            </div>
                        <div class='designArt smallScreens'>
                            
                            <?php if(isset($article['img'])) : ?>
                            
                            <div class='imgArt'>
                                  <img src="./assets/img/articles/<?= $article['id']?>/<?= $article['img']?>" class="card-img-top" alt="image <?= $article['img']?>">
                                  <?php endif; ?>
                            </div>
                        </div>
                            <div class='smallScreens'>

                                  <?= htmlspecialchars(strtoupper($article['title'])) ?>
                              
                            </div>
                            <div class='comments'>
                                <q class="card-text">
                                    <?= htmlspecialchars($article['content']) ?>
                                </q>
                                <p>
                                  <small class="text-muted">écrit le <?= $article['publication_date'] ?> par <?= htmlspecialchars($article['login'])?>
                                  </small>
                                </p>
                            </div>
                           
                           
                       </div>
                       <div class='contentTitleR'>
                           
                         <div class='title-right'>

                                  <?= htmlspecialchars(strtoupper($article['title'])) ?>
                              
                            </div>  
                           
                       </div>
                       <div class='designArt bigScreens'>
                           
                           <?php if(isset($article['img'])) : ?>
                            <div class='imgArt'>
                                  <a href="./assets/img/articles/<?= $article['id']?>/<?= $article['img']?> "><img src="./assets/img/articles/<?= $article['id']?>/<?= $article['img']?> "
                                 class="card-img-top" alt="image <?= $article['img']?>"></a>
                                  <?php endif; ?>
                            </div>
                        </div>
                  </div>
              </div>
              <?php endforeach; ?>
            </div>
        </div>
        
    </section>

</div>