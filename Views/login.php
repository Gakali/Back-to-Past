
<div class='containerFrom'>
   <!-- <div class='form'>-->
      <?php if(empty($_SESSION['user'])) : ?>
      
      <div class='title-form'>
        <h1 id='login'>Bienvenue dans votre espace réservé</h1>
        <h2 class='backTxt'>welcome back</h2>

      </div>
      
        <?php else : ?>
        
        <div class='title-form'>
          <h1>Heureux de vous revoir  <?= $_SESSION['user']['login']?></h1>
        </div>
        
        <?php endif; ?>
  <!--  </div>-->
<?php if(empty($messages['success'])) : ?> 
<?php  if(!empty($messages['errors'])){  ?>
        <ul>
        <?php foreach($messages['errors'] as $error):  ?>    
            <li><?=  $error ?></li>
        <?php endforeach ?>    
        </ul>
    <?php    }  ?>
    
  <div class='inner'>
      <form method='post' action="index.php?p=login" class='formbody' >
          
          
          
          <div class='deco-circle'></div>
          <div class='deco-circle2'></div>
          
           <h2>Connexion</h2>
          
          <div class='items-form'>
              <label><i class="fas fa-user-circle"></i></label>
              
              <input type="text"  id="login" placeholder="<?=(false === (empty($messages['errors']['login']))) ? $messages['errors']['login'] : "Login" ?>" name='login' <?= $cookie::checkCookie('login') ?>>
          </div>
          
          
          <div class='items-form'>
            
              <label><i class="fas fa-envelope"></i></label>
              <input type="text"  id="email" placeholder="<?=(false === (empty($messages['errors']['login']))) ? $messages['errors']['login'] : "Mail" ?>" name='mail' <?= $cookie::checkCookie('mail') ?>>
              
          </div>
          
          <div class='items-form'>
          
            <label><i class="fas fa-lock"></i></label>
            <input type="password"  id="password1" placeholder="<?=(false === (empty($messages['errors']['login']))) ? $messages['errors']['login'] : "Mot de passe" ?>" name='password' <?= $cookie::checkCookie('password') ?>>
          
          </div>
           <div class='items-form'>
    			    <label for="remember" class='label-remember'>Se souvenir de moi</label>	
              <input type="checkbox" value="true" id="remember" name="remember" checked>
    			</div>
          <div class='btn'>
          
     
          
          <button type="submit" class='succes'>Valider</button>
          
          <div class='contentSus'>
              <div class='line'></div>
          </div>
              <a href='index.php?p=register#register'><small class='redirection'>Pas de compte?</small></a>

           </div> 
       
      </form>
      
 
    
</div>
<?php else : ?>

                <div class='content-info-dash'>
                      <?php if(!empty($_SESSION['user']['photo'])){ ?>
                    <div class='userManaged-picture'>
                         <img src='assets/img/profils/<?= $_SESSION['user']['login'] ?>/<?= $_SESSION['user']['photo']?>' alt='Photo de profil'>
                    </div>
                    <?php }else{ ?>
                     <i class="fas fa-user-circle fa-5x"></i>
                    <?php } ?>
                  
                    <div class='items-form'>
                        <p>login:</p>
                        <p><strong><?= $_SESSION['user']['login'] ?></strong></p>
                    </div>
                    <div class='items-form'>
                        <p>Profil actuel: </p>
                        <p><strong><?= $_SESSION['user']['admin'] ?></strong></p>
                    </div>
                    <div class='items-form'>
                        <p>mail:</p>
                        <p><strong><?= $_SESSION['user']['mail'] ?></strong></p>
                    </div>
                        <!--en cours de réalisation-->
                        <a  id='adminUserSelf' class='buttonImit' href='index.php?p=manageSelf'>Mon compte </a>
                        <!--en cours de réalisation-->
                </div>

	<a  href="index.php?p=home" class='buttonImit'> Continuer vers l'accueil</a>
	
	
	
	
<?php endif; ?>




            
      