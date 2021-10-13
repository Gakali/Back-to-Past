
<div id='cover' class="cover"></div>


 <?php if(!empty($userManaged['login'])) : ?>
      	
<h1>Page gestion</h1>


<section>
  
    <h2>DASHBOARD</h2>

<div class='inner'>
  
    <?php  if(!empty($messages['errors'])){  ?>
        <ul>
          <?php foreach($messages['errors'] as $error):  ?>    
              <li><?=  $error ?></li>
          <?php endforeach ?>    
        </ul>
    <?php    }  ?>
    

    <div class='pop'></div>

      <div class='content-info-dash'>
        
        <h3>Informations</h3>
        
          <?php if(!empty($userManaged['photo'])){ ?>
        
          <div class='userManaged-picture'>
               <img src='assets/img/profils/<?= $userManaged['login'] ?>/<?= $userManaged['photo']?>' alt='Photo de profil'>
          </div>
          
          <?php }else{ ?>
        
               <i class="fas fa-user-circle fa-5x"></i>
          
          <?php } ?>
        
        <div class='items-form'>
          <p>login:</p>
          <p><strong><?= $userManaged['login'] ?></strong></p>
        </div>
        <div class='items-form'>
          <p>Profil actuel: </p>
          <p><strong><?= $userManaged['admin'] ?></strong></p>
        </div>
        <div class='items-form'>
          <p>Nom:</p>
          <p><strong><?= $userManaged['name'] ?></strong></p>
        </div>
        <div class='items-form'>
          <p>Prénom:</p>
          <p><strong><?= $userManaged['firstname'] ?></strong></p>
        </div>
        <div class='items-form'>
          <p>mail:</p>
          <p><strong><?= $userManaged['mail'] ?></strong></p>
        </div>
      </div>
                

    
     
      <form action="index.php?p=updateUser" method="post" class='formbody AdminDash'>

           <h3>Modifications</h3>
           
          <div class='items-form'>
            <label>Profil de</label>
              <input type="text"  id="oldUser" class='loginChange'  name='idUser' value='<?= $_GET['user'] ?>' disabled>
          </div>

          <div class='items-form'>
            <input type="text"  id="Login" placeholder="<?=(false === (empty($messages['errors']['Login']))) ? 'à remplir' : "Login"?>"  name='Login'> 
          </div>
          <div class='items-form'>
            <input type="text"  id="Nom" placeholder="<?=(false === (empty($messages['errors']['name']))) ? 'à remplir' : "Nom"?>" name='name'>
          </div>
          <div class='items-form'>
            <input type="text"  id="firstName" placeholder="<?=(false === (empty($messages['errors']['firstname']))) ? "à remplir" : "Prénom" ?>" name='firstname'>
          </div>
          
          
          <div class='items-form'>

            <input type="text"  id="mail" placeholder="<?=(false === (empty($messages['errors']['mail']))) ? "à remplir" : "Mail" ?>" name='mail'>
          </div>

          <div class='select-Profile'>
            <label>Niveau accréditation</label>
            <small ><?=$userManaged['admin'] ?></small>
            <select name="admin" id="admin">
              <option value="">--Profil utilisateur--</option>
              <option value="admin">administrateur</option>
              <option value="normal">normal</option>
            </select>
          </div>
          
          <div class='items-form'>
            <label for="delete">Supprimer l'utilisateur</label>
            <input type="checkbox" name="delete"/>
          </div>

          <div class='btn'>
            <button type="submit" class='succes'>Valider</button>
          </div> 
          <div class='contentSus'>
            <div class='line'></div>
          </div>
          <a href='index.php?p=admin'><small class='redirection'>retour page admin</small></a>
 
      </form>
      
       <!-- <div class='PrivateMsg'>
          <p> Messagerie Utilisateur </p>
          
          <form action="index.php?p=privateMsg&userRecipient=<?=$userManaged['login']?>" name='userMsg'>
            <div id='returnMsg' >
            </div>
            <input type="textarea" name="privateMessage"/>
            <button type='submit' class='succes'>Envoyer</button>
          </form>
        </div>-->
        
</div>    
</section>    
 
<?php endif; ?> 
  
<a href='index.php?p=admin'><small class='redirection buttonImit'>retour page admin</small></a>
<p>Attention les modifications sont irréversibles ! </p>
      
<?php if(!empty($messages['success'])){ ?>
<ul>
<?php foreach($messages['success'] as $success):  ?>    
    <li class='returnSuccess crossSuccess'><?=  $success ?></li>
<?php endforeach ?>    
</ul>
<?php } ?>