import Ajax from '../Ajax.js'

export default class Tchat {

    constructor(formTchat,audio,ajax,ul,small,userTchat){
        
    this.formTchat = document.addMessageForm;
    this.ul = document.createElement('ul')
    this.small = document.createElement('small');
    this.userTchat = document.createElement('ul');

    }
    
    
/*Méthode listeniing input Messages*/    
submitMessage(){
    
        const setAjax = new Ajax(); 
        
        event.preventDefault();

        const message = {
            name : this.formTchat.login.value,
            content : this.formTchat.content.value
        }

        setAjax.addMessage(message);
        setAjax.recupAjaxMessages();
        this.formTchat.content.value = ''
        }
      
/*Méthode for refreshing the TchatDiv */

displaySetTchat(){ 

    const setAjax = new Ajax();
    
    setAjax.isOnelineUser();
    setAjax.recupAjaxMessages();
    
    setAjax.isOnelineUser();
        setInterval(function () {
            setAjax.isOnelineUser();
            setAjax.recupAjaxMessages();
            
        },4000)
        
      
        
         function colorDiv(log){
             let divColored = document.querySelectorAll(`.${log}`)
             if(log == divColored){
                 for(let i of divColored )
              i.style.BackgroundColor = 'black'
          }
         
        }
        
        
        
         
        
       
        
       document.getElementById("content").addEventListener('keydown', function (e){
          
                if (e.keyCode == 13){
                    
                    let tchat = new Tchat()
                    tchat.submitMessage()
                    //tchat.audio.play()
                } 
        })
        
        document.forms['addMessageForm'].addEventListener('submit',() =>{
                this.submitMessage()
                this.audio.play();
        
        })
    }
    
    colorDiv(login){
        
        let user = document.querySelectorAll(`.${login}`)
        for( let i of user){
        i.classList.add('userTchating') 
        }
        
    }
    

/*Méthode for display Messages */
   
displayTchat(messages){

    this.ul.classList.add("tchatContent");

    for(let message of messages){

        const li = document.createElement('li')
        li.setAttribute('class',`${message.login}`)
        let lastMessageTime = messages[0]['publication_date']
        let lastMessageUser = messages[0]['login']
        
        this.small.textContent = `Dernier message envoyé le ${lastMessageTime} par ${lastMessageUser}`
        li.textContent = `${message.login} : ${message.content}`
        
        this.ul.append(li)
        

}
 
    document.querySelector('.tchatBox').innerHTML = ''
    document.querySelector('.tchatBox').append(this.ul)
    document.querySelector('.LastTimeMessage').innerHTML = ''
    document.querySelector('.LastTimeMessage').append(this.small)
  
}
 displayOneline(users){
    

   
    for(let user of users){
     
     


    
        const div = document.createElement('div');
        div.style.width = '10%'
        div.border = '1px Solid black'
        div.style.borderRadius = '20%'
        if(user.photo){
        }
        const li = document.createElement('li')
        li.textContent = `${user.login} `
        this.userTchat.prepend(li)
        li.prepend(div)
        
        

    }
    

    document.querySelector('.userOneline').innerHTML = ''
    document.querySelector('.userOneline').append(this.userTchat)
   
}

    
}
