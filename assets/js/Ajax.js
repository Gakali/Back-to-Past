import Tchat from './class/Tchat.js'
import Admin from './class/Admin.js'
import FeedBack from './class/FeedBack.js'


export default class Ajax{

/************************************ HOME VIEW  *****************************************/

ajaxAvgRating(){
    
    const feed = new FeedBack;
    
    fetch('index.php?ajax=recupAverage')
    .then(res => res.json())
    .then(res => feed.averageDiv(res))
    
}

/************************************ TCHAT VIEW   *****************************************/

/*Message tchat */

addMessage(message){

    const form = new FormData();
    form.append('action','addMessage')
    form.append('content',message.content)
    form.append('login',message.name)

    fetch('index.php?ajax=send',{ method: 'POST', body: form }) 
    .then(res => res.text()) 
    .then(res => 
        { document.querySelector('.result').innerHTML = res }) 
    }

/*refresh messages*/

recupAjaxMessages(){
   let tchat = new Tchat()
   
    fetch('index.php?ajax=recupMessages')
    .then(res => res.json())
    .then(res =>tchat.displayTchat(res)) 
    

}
/*View if TchatUser is Oneline */

isOnelineUser(){
 
 let tchat = new Tchat()
 fetch('index.php?ajax=recupUserOneline')
    .then(res => res.json())
    .then(res =>tchat.displayOneline(res))

}
activeUserTchat(){
    let tchat = new Tchat()
fetch('index.php?ajax=getUser')
.then(res => res.json())
.then(res => tchat.colorDiv(res))
}

/************************************ ADMIN VIEW   *****************************************/

/* Page Admin: view all Members */

ajaxGetRatingByLogin(user){
    
    let admin = new Admin()
    
    fetch('index.php?ajax=viewReviewByLogin&user='+user)
    .then(res => res.json())
    .then(res => admin.displayReviewDash(res))
}
ajaxCountArticles(user){
    
    let admin = new Admin()
    
    fetch('index.php?ajax=ajaxCountArticles&user='+user)
    .then(res => res.json())
    .then(res => admin.countArticles(res))
}


/* Page Admin: view all Login*/

recupAjaxViewLogin(){
    
    let admin = new Admin()

    fetch('index.php?ajax=viewMembers')
    .then(res => res.json())
    .then(res => admin.displayLogin(res))
}

/* Page Admin: view all Messages*/

viewAllArt(){
    
    let art = new Admin()

    fetch('index.php?ajax=articles')
    .then(res => res.json())
    .then(res => art.displayArticles(res))
}
deleteArt(id){
    
    let art = new Admin()

    fetch('index.php?ajax=delArticles&user=id')
    .then(res => res.json())
    .then(res => art.displayArticles(res))
}

/************************************ MANAGE USER SELF  *****************************************/



}
/*en cours de réalisation*/