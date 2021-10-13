<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Back to the past">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/img/logos/logoSite.png" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <div id='ball'></div>
    <div id='smallBall'></div>
    <div class='contentBig'></div>
    <div id='bigBall'></div>

   <header>
         <?php if(!empty($_SESSION['user']['photo'])){ ?>
                
                <div class='logProf-template'>
                     <img src='assets/img/profils/<?= $_SESSION['user']['login'] ?>/<?= $_SESSION['user']['photo']?>' alt='Photo de profile'>
                </div>
                
            <?php } ?>
       
        <div class='headerDiv'>
            <a href='#'>Le site des Technos Rétro </a>
        </div>
        
        <nav class='navigation'>
            <div id='menuToggle'> 
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul id='menu'>
                    <li>
                        <a href="index.php?p=home" >
                            <small>Accueil</small> 
                        </a>
                    </li>
                    <li class='more '>
                        <a href='index.php?p=past#past'>
                            <small>Articles</small>
                        </a>
                    </li>
                    <li class='more '>
                        <a href='index.php?p=history#history'>
                            <small>Histoire</small>
                        </a>
                    </li>
                    <li class='more '>
                        <a href='index.php?p=tchat#tchat'>
                            <small>Tchat</small>
                        </a>
                    </li>
                     <?php if($session::online() === false ): ?>
                    <li class='more '>
                        <a href='index.php?p=register#register' id='more2'>
                            <small>Rejoignez-nous</small>
                        </a>
                    </li>
                       <li class='more '>
                           <a href='index.php?p=login#login'>
                               <small>Se connecter</small>
                            </a>
                        </li>
                
                    <?php endif; ?>
    
                    <?php if($session::isAdmin() === true ): ?>
                    <li class='more '>
                        <a href="index.php?p=admin#admin"> <small>Page Admin</small></a>
                    </li>
                    <?php endif; ?>
                    
                  <?php if($session::online() === true ): ?>
                  
                    <li class='more '><a href="index.php?p=manageSelf&user=<?= $_SESSION['user']['login'] ?>"> <small>Mon espace</small></a></li>
                 
                    <li class='more '><a href="index.php?p=logout"> <small>Se déconnecter</small></a></li>
                    
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        

    </header>
<main>
    
    <div class='deco'>
        <div class='deco-text'>Back</div>
        <div class='deco-text'>to</div>
        <div class='deco-text'>the</div>
        <div class='deco-text reflection'>Past</div>
    </div>
   
    <?php require 'Views/'.$path ?>
    
</main>

<footer>
    <div class='flex footer'>
        <div>
            <nav>
                <ul>
                    <li><a href='#'>Contactez-nous</a></li>
                    <li><a href='#'>Notre histoire</a></li>
                    <li><a href='#'>Galerie photo</a></li>
                    <li><a href='#'>Commandez en ligne</a></li>
                    <li><a href = '#'>Nous trouver</a></li>
                </ul>
            </nav>
        </div>

        <div >
            
                <ul class="tt-wrapper">
                	<li><a class="tt-gplus" href="#"><i class="fab fa-google-plus-g"></i><span>Google Plus</span></a></li>
                	<li><a class="tt-twitter" href="#"><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
                	<li><a class="tt-facebook" href="#"><i class="fab fa-facebook-square"></i><span>Facebook</span></a></li>
                	<li><a class="tt-linkedin" href="#"><i class="fab fa-linkedin-in"></i><span>LinkedIn</span></a></li>
                </ul>
            
        </div>
    </div>



</footer>
    <script type='module' src='assets/js/main.js' ></script>
    <script src='assets/js/functions.js'></script>
    <script  src='assets/js/navBar.js'></script> 

</body>
</html>