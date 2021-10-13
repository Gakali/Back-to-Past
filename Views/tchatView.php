<h1> Bienvenue dans le Tchat </h1>
    <div class="flex">
        <h2>En ligne :</h2>
    <div class='userOneline'>
    </div>
    
    <div class='screenBox' id='tchat'>
        <div class='tchatBox'>
    </div>
        <div>
            <div class='circle one'><a href="#"></a><div class='RightL redLight'></div></div>
            <div class='circle two'><a href="#"></a><div class='LefltL redLight'></div></div>
            <div class='rectangle'></div>
        </div>
    </div>
    <div class='LastTimeMessage'></div>
    
    <!-- si la personnes est connectée j'affiche le form -->
    
    <?php if(array_key_exists('user',$_SESSION)) : ?>
    
    <div>
        
        <form  name="addMessageForm" id='tchat'>
            <div class="result"></div>
            <div>
                <input type="hidden" name="login" id='login' value='<?= $_SESSION['user']['user_id'] ?>'/>
            </div>
            <div>
                <label for="content"> Votre message : </label>
                <textarea name="content" id="content" placeholder="Saisissez votre message"></textarea>
            </div>
            <div>
                <input class='danger' type="reset" value="annuler" />
                <input class='success' type="submit" value="envoyer" />
            </div>
        </form>  
    </div>

    <?php else : ?>
    
    		<a href="index.php?p=login#login">  Vous devez etre connecté pour acceder au tchat </a>
    		
    		
    	    </div>
        </div>
    </div>
    <?php endif; ?>
</div>


