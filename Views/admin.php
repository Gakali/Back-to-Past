
<h1 id='admin'>Page de gestion Administrateur</h1>

<section>
    <h2>DASHBOARD</h2>
</section>

<div class='svgRev'></span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e7008a" fill-opacity="1" d="M0,96L60,122.7C120,149,240,203,360,192C480,181,600,107,720,85.3C840,64,960,96,1080,112C1200,128,1320,128,1380,128L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
</div>
<div>
   
    
    <section>
        <h2> Liste des Complète utilisateurs </h2>
        
     <aside>
        <div class='buttonImit'>
            <p>Note Moyenne des utilisateurs : <?= $rate['AVG(`rate`)']?>/5</p>
        </div>
        <div class='buttonImit'>
            <p>Utilisateurs totaux: <?=($count[0]['COUNT(*)']) ?></p>
        </div>
    </aside>
        
    <div>
        
        <form id='search'>
            <h2>Filtrer par Login</h2>
            <input type="text" placeholder="Login" />
        </form>
        
    
        <ul class='userDom' id='UserList'>
            <?php foreach($users as $user): ?>
            
            <li class='eachUserAdm'>
                <span>Login: <?= htmlspecialchars($user['Login']) ?></span>
                <ul>
                    <li>nom:<?= htmlspecialchars($user['name']) ?></li>
                    <li>Prénom:<?= htmlspecialchars($user['firstname']) ?></li>
                </ul>
                
                mail:<?= htmlspecialchars($user['mail']) ?>
                Profil:<?= $user['admin'] ?>
            <small>inscrit depuis le: <?= $user['creation_date'] ?></small>
            
            </li> 
            
            <?php endforeach; ?>
        </ul>
        
        
    </div>
    
    </section>
    
    <section>
        <h2>Options de Modification</h2>
        <label for="option" >choix:</label>
        
        <select name="options" id="select" >
            <option value="">--Please choose an option--</option>
            <option value="login">Voir les  Login</option>
            <option value="viewArt">Voir les articles</option>
        </select>
        <div class="tableContainer"></div>
    </section>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#5000ca" fill-opacity="1" d="M0,128L60,149.3C120,171,240,213,360,197.3C480,181,600,107,720,90.7C840,75,960,117,1080,122.7C1200,128,1320,96,1380,80L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>



    







