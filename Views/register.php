<div id='cover' class="cover"></div>

<div class='containerFrom'>
    <div class='title-form'>
        <h1>Rejoignez-nous</h1>
    </div>
              <h2 class='backTxt'>Bienvenue</h2>
    
   <?php if(empty($messages['success'])) : ?>
      
      	
    <?php  if(!empty($messages['errors'])){  ?>
        <ul>
        <?php foreach($messages['errors'] as $error):  ?>    
            <li><?=  $error ?></li>
        <?php endforeach ?>    
        </ul>
    <?php    }  ?>
    
    
    
     <div class='pop'></div>
     
 <div class='inner'>   
 
      <form enctype="multipart/form-data" action="index.php?p=register" method="post" class='formbody' id='register'>
  
        
            <div class='deco-circle'></div>
            <div class='deco-circle2'></div>
            
            <h2>Sign up</h2>
            
        <div class='items-form'>
              <label><i class="fas fa-user-circle"></i></label>
              <input type="text"  id="login" placeholder="<?=(false === (empty($messages['errors']['login']))) ? "à remplir" : "Login"?>" name='login'>   
        </div>
            
        <div class='items-form'>
              <label><i class="fas fa-user-minus"></i></label>
              <input type="text"  id="Nom" placeholder="<?=(false === (empty($messages['errors']['name']))) ? 'à remplir' : "Nom"?>" name='name'>
         </div>
             
        <div class='items-form'>
              <label><i class="fas fa-user-minus"></i></label>
              <input type="text"  id="firstName" placeholder="<?=(false === (empty($messages['errors']['firstname']))) ? "à remplir" : "Prénom" ?>" name='firstname'>
        </div>
          
        <div class='items-form'>
            <label><i class="fas fa-envelope"></i></label>
            <input type="text"  id="mail" placeholder="<?=(false === (empty($messages['errors']['mail']))) ? "à remplir" : "Mail" ?>" name='mail'>
        </div>
 
        <div class='items-form'>
              <label><i class="fas fa-lock"></i></label>
              <input type="password"  id="password" placeholder="<?=(false === (empty($messages['errors']['password']))) ? $messages['errors']['password'] : "Mot de passe" ?>" name='password'>
        </div>
              
        <div class='items-form'>
              <label><i class="fas fa-lock"></i></label>
              <input type="password" id="password2" placeholder="<?=(false === (empty($messages['errors']['password']))) ? $messages['errors']['password'] : "Confirmez mdp" ?>" name='password2'>
        </div>
    
       <div class='items-form'>
              <label for="photo" ><i class="fas fa-camera"></i></label>
              <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
              <input type="file" id="photo" name="photo">
      </div>
       
          <div class='btn'>
            <button type="submit" class='succes '>Valider</button>
         </div> 
         
          <div class='contentSus'>
              <div class='line'></div>
          </div>
          <a href='index.php?p=login#login'><small class='redirection'>j'ai un compte</small></a>
     
      </form>
   </div>
</div>
    
    <?php else : ?>
    	<p class="mandatory" class='returnSuccess crossSuccess'><?= $messages['success'][0] ?></p>
    	<a href="index.php?p=tchat" class='buttonImit'>Rejoindre le chat</a>
    	<a href="index.php?p=home" class='buttonImit'>Page d'accueil</a>
    <?php endif; ?>
    
