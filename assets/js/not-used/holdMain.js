import Ajax from './Ajax.js'
import Quiz from './class/Quiz.js'
import AllFunctions from './function1.js'

const formAdmin = document.getElementById('select')
const formTchat = document.addMessageForm;
const choice = {
             option : formAdmin.options[formAdmin.selectedIndex].value       
                
             }



 //  let ajax = new Ajax();
   
/*function submitMessage(event){
    event.preventDefault();
        
        //const form = document.addMessageForm;
        
        const message = {
            
           
            name : formTchat.login.value,
            content : formTchat.content.value
            
        }
        
        // j'envoi mon objet contact dans ma fonction addMessage
        ajax.addMessage(message);
        ajax.recupAjaxMessages();
        
        formTchat.content.value = ''
        
}*/

//const form = document.getElementById('select')
  
/* if (formAdmin){
     
formAdmin.addEventListener('change',function(e){

        /*const choice = {

             option : formAdmin.options[formAdmin.selectedIndex].value       
        }*/

switch (choice.option) {
            case 'membres':
                ajax.recupAjaxviewMember()
                break;
            
            default:
                let div = document.querySelector('.tableContainer')
                div.innerHTML = ''
            }

       
        
    })
 }
 
   
/*document.addEventListener('DOMContentLoaded',()=>{
    
        
   if (window.location.href == "https://"+location.host+location.pathname+"?p=tchat"){
        setInterval(function () {
            ajax.recupAjaxMessages()
            ajax.isOnelineUser()
             
        },1000);
    }
  if(window.location.href == "https://"+location.host+location.pathname+"?p=tchat"){   
   document.getElementById("content").addEventListener('keydown', function (e){
       if (e.keyCode == 13){
           submitMessage(e)
           const autoplay =  new Audio('./assets/sound/message.mp3');
        autoplay.play()
       } 
   })
    document.forms['addMessageForm'].addEventListener('submit',event =>{
        
        submitMessage(event)
        const autoplay =  new Audio('./assets/sound/message.mp3');
        autoplay.play()
        
    })
    
  }
  
})*/



