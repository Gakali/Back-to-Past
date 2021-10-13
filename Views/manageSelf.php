<h1>Bienvenue dans votre espace </h1>

 <h2 class='backTxt'><?= $_SESSION['user']['login'] ?></h2>

<div id='cover' class="cover"></div>

<?php if($_SESSION['user']['login']){ ?>

<div class='pop'></div>




<div class='area-self'>
    


    <form action="index.php?p=updateUser" method="post" class='formbody selfDash' id='manageSelf'>
           
        <div class='inner-self'>
        
        <?php if(!empty($userSelf['photo'])){ ?>
            <div class='userManaged-self'>
                <img src='assets/img/profils/<?= $_SESSION['user']['login']  ?>/<?= $_SESSION['user']['photo'] ?>' alt='Photo de profil'>
            </div>
        <?php }else{ ?>
            
            <i class="fas fa-user-circle fa-5x"></i>
            
        <?php } ?>
                <input type="text"  id="oldUser" class='loginChange'  name='idUser' value='<?= $_SESSION['user']['login'] ?>' disabled>
        <div>
        <div class='items-form'>
            <label for="login">login</label>
          <input type="text"  id="Login" placeholder="<?=(false === (empty($messages['errors']['Login']))) ? 'à remplir' : htmlspecialchars($userSelf['login']) ?>"  name='Login'> 
        </div>
        <div class='items-form'>
            <label for="nom">Nom</label>
          <input type="text"  id="Nom" placeholder="<?=(false === (empty($messages['errors']['name']))) ? 'à remplir' : htmlspecialchars($userSelf['name']) ?>" name='name'>
        </div>
        <div class='items-form'>
            <label for="firstname">Prénom</label>
          <input type="text"  id="firstName" placeholder="<?=(false === (empty($messages['errors']['firstname']))) ? "à remplir" : htmlspecialchars($userSelf['firstname'])  ?>" name='firstname'>
        </div>
        <div class='items-form'>
            <label for="mail">Mail</label>
            <input type="text"  id="mail" placeholder="<?=(false === (empty($messages['errors']['mail']))) ? "à remplir" : htmlspecialchars($userSelf['mail']) ?>" name='mail'>
        </div>
        <div class='items-form'>
            <label for="password">Mdp</label>
          <input type="password"  id="password" placeholder="<?=(false === (empty($messages['errors']['password']))) ? $messages['errors']['password'] : "...." ?>" name='password'>
        </div>
        <div class='items-form'>
            <label for="password">Mdp</label>
          <input type="password" id="password2" placeholder="<?=(false === (empty($messages['errors']['password']))) ? $messages['errors']['password'] : "...." ?>" name='password2'>
        </div>
    </div>
      

    <div class='btn'>
      <button type="submit" class='succes'>Valider</button>
   </div> 
   
       <div class='contentSus'>
          <div class='line'></div>
      </div>
      
      <a href='index.php?p=home'><small class='redirection'>Continuer vers l'accueil</small></a>

  </form>
</div> 


      
    <div class='myArticles'>
        

            
        <section class='secArt'>
            
        <div class='sticky'>
            <h2>Mes articles</h2>
        </div>
        
       <?php if(!empty($articles)){ ?> 
        
        <?php foreach($articles as $article): ?>
        
        <div class='contentFeed' id='feedArt'>
            
            <h3><?=htmlspecialchars($article['title'])?></h3>
            <p>Catégorie: <?= htmlspecialchars($article['content'])?></p>
            
            <img src="./assets/img/articles/<?= htmlspecialchars($article['id'])?>/<?= htmlspecialchars($article['img'])?>" alt='<?= htmlspecialchars($article['title'])?>'/>
            
            <q><?=htmlspecialchars($article['content'])?></q>
            <small><?= $article['publication_date'] ?></small>
            <a href='index.php?p=deleteArtByUser&numArticle=<?= $article['id'] ?>' class='buttonImit'>Supprimer</a>
            
            

        </div>
            
            
        
        <?php endforeach; ?>
        <?php }else{ ?>
        
            <p>Vous n'avez pas encore publier d'articles</p>
            <a href='index.php?p=past#article' class='buttonImit'>Publier un article</a>
            <img src="assets/img/pages/emptyArt.jpg" alt="machine à écrire">
            
         <?php } ?>
         <a href='#feedArt' alt='Aller en haut'><i class="fas fa-arrow-up" ></i></a>
        </section>

    </div>
    
    
    <div class='myArticles'>
        
       <section class='secRev' id='feedRev'>
           
            <div class='sticky'>
                <div>
                    <h2 >Mes Avis</h2>
                </div>
            </div>
            
            <?php if(!empty($reviews)){ ?>
            
            
            <?php foreach($reviews as $review): ?>
            
             <div class='myArticles'>
                 <p> le <?= htmlspecialchars($review['publication_date']) ?></p>
                 <p> "<?= htmlspecialchars($review['comment']) ?> "</p>
                 <p> Vous avez donné la note de  <?= htmlspecialchars($review['rate']) ?></p>
                 <a class='buttonImit' href='index.php?p=deleteRevByOwn&numRev= <?= $review['id_review'] ?>' >supprimer</a>
             </div>
        
            <?php endforeach; ?>
            
            
            <?php }else{ ?>
            
             <p>Vous n'avez pas encore donner votre Avis</p>
             <a href='index.php?p=home#avgRating' class='buttonImit'>Déposer un avis</a>
             <img src="assets/img/pages/empty.jpg" alt="carnet vierge">
             
            <?php } ?>
            <a href='#feedRev' alt='Aller en haut'><i class="fas fa-arrow-up" ></i></a>
        </section>
    </div>
      

  
  <?php }else{ ?>
  
  <p class='big'>... Une erreur est survenue...️</p>
  <a  id='adminUserSelf' class='buttonImit' href='index.php?p=manageSelf&user=<?= $_SESSION['user']['login'] ?>'> Revenir à mon compte </a>
  
      <?php } ?> 
