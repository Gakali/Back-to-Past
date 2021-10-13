import Ajax from './Ajax.js'
import Carroussel from'./Carroussel.js'
import Tchat from './class/Tchat.js'
import Admin from './class/Admin.js'
import Quiz from './class/Quiz.js'
import FeedBack from'./class/FeedBack.js'

const addArticle = document.querySelector('.form-article')
const btnArticle = document.getElementById('article')
const formAdmin = document.getElementById('select')
const formAdmidModifier = document.querySelector('.formbody')
const adminSelf = document.querySelector('#manageSelf')
let pop = document.querySelector('.pop');
const delArtByAdmin = document.querySelectorAll('.tableContainer')
const delArtBySelf = document.querySelectorAll('.myArticles')
const reviewDom = document.getElementsByClassName('img-form-admin')
const user = document.getElementById('oldUser') 


document.addEventListener('DOMContentLoaded',()=>{
    /*carroussel */
if(document.querySelector('.carousCont')){
let carroussel = new Carroussel;
carroussel.run()
}

/***********Blog addArticle***********/


document.addEventListener('click',(e)=>{
 
   
    
   if(e.target.matches('#article')){
     
       e.preventDefault()
       addArticle.classList.toggle('hidden')
       
        if (btnArticle.innerHTML === "Ajouter") {
                btnArticle.innerHTML = "Fermer";
              } else {
                btnArticle.innerHTML = "Ajouter";
              }
     }
     
     if(e.target.matches('#revFeedb')){
         
     let div = document.querySelector('.toggleView')
     let btn = document.getElementById('revFeedb')
       e.preventDefault()
       div.classList.toggle('hidden')
       
        if (btn.innerHTML === "Votre avis") {
                btn.innerHTML = "Fermer";
              } else {
                btn.innerHTML = "Votre avis";
              }
     }
   
    })
    
    /***********Tchat Display Run ***********/
    
    if(document.querySelector('#tchat')){

        let tchat = new Tchat();
        tchat.displaySetTchat();
 
    }
     /***********Home Average rating ***********/
    
    if(document.querySelector('#avgRating')){

           let ajax = new Ajax();
           ajax.ajaxAvgRating();
 
    }
    
    /***********Admin Dashboard select ************/
    
    if (formAdmin){
      
            let ajax = new Ajax();  
            
            formAdmin.addEventListener('change',function(e){
                
            const choice = {
             option : formAdmin.options[formAdmin.selectedIndex].value       
                
             }    

            switch (choice.option) {
            case 'login':
            ajax.recupAjaxViewLogin()
            break;
            case 'viewArt':
            ajax.viewAllArt()
            break;
            
            default:
            let div = document.querySelector('.tableContainer')
            div.innerHTML = ''
            }

       
        
        })
     }

  /*************** ARTICLES ADMIN *********************/

if(document.querySelector('.img-form-admin')){
    
    let ajax = new Ajax();
    ajax.ajaxGetRatingByLogin(user.value);
    
}


  if(delArtByAdmin){
      document.addEventListener('click',(e)=>{
          
          let ajax = new Ajax();  
          
          if(e.target.matches('.buttonImit')){
              ajax.deleteArt(e.target.id)
          }
          
          
          
      })
      
      
  }
  
    /*************** REGISTER FORM *********************/
    
     /*************** EN COURS *********************/
if(document.querySelector('#register') || document.querySelector('#past')){
    
        let registerForm = document.getElementById('register');
        
        //let articles = document.getElementById('form-submit')
    
    registerForm.addEventListener('submit', (e) =>{
        e.preventDefault()

            let divContainer = document.createElement('div')
            let div ;
            let success;
            let abord;
            
            
            if(document.querySelector('.modal')){
                
                let destroy = (document.querySelector('.modal'))
                destroy.remove(div)
                
            }else{
                

      
            div =  document.createElement('div')
            
            const content = document.createElement('p')
            let cover = document.querySelector('#cover')
            let divCover = document.createElement('div')

            
            content.classList.add('alert')
        
            div.classList.add('modal')  
            
            content.textContent = 'Merci de Patienter,nous réalisons les opérations demandées....️'
            
            
            
            divCover.classList.add('modalBox')
            div.append(content,divCover)
            
            pop.append(div)
            
            
            cover.classList.add('lock')
          
            registerForm.submit()
            
            }
        
        
        
        
        
    });
    
}
   /*************** EN COURS *********************/
 
 
 /*************** SET USER SELF*********************/
 


  /*en cours de réalisation*/
 
 if(document.getElementById('adminUserSelf')){
     
     let ajax = new Ajax();
     
     document.addEventListener('click',(e)=>{
                
         if(e.target.matches('#adminUserSelf')){
             ajax.adminUserSelf()
         }
         
         
     })
    
 }

  /*en cours de réalisation*/
 
 /***********Quiz Home page Run ***********/
 
     if(document.querySelector('#quiz')){
         
         let quiz = new Quiz();
     }


 /***********Form edition Admin page***********/
 
if(document.querySelector('.AdminDash') || document.querySelector('#manageSelf')){
     
    if(formAdmidModifier||adminSelf){

   function closetab(abord,cont,tab,child,cover){
       
        
    cont.addEventListener('click',(e)=>{

            cont.classList.add('crossSuccess')
            e.preventDefault()
            
          setTimeout(function(){
            
            tab.removeChild(child)
            document.getElementById('oldUser').disabled = false
            formAdmidModifier.submit()
            adminSelf.submit()
            
            /*voile*/
            cover.classList.remove('lock')
            
          },600 )
            
             
         
        })
        
            abord.addEventListener('click',(e)=>{
            abord.classList.remove('crossAbord')      
            abord.classList.add('crossFail')
            
            
            e.preventDefault()
            
            setTimeout(function(){

            tab.removeChild(child)
           // title.remove(cover)
            cover.classList.remove('lock')
            
            return
            
            },600 )
        })
        
        
    }
 /***********Form edition Admin page***********/
        
formAdmidModifier.addEventListener('submit', (e) =>{
                
            
            e.preventDefault()

            let divContainer = document.createElement('div')
            let div ;
            let success;
            let abord;
            
            
            if(document.querySelector('.modal')){
                
                let destroy = (document.querySelector('.modal'))
                destroy.remove(div)
                
            }else{
                

      
            div =  document.createElement('div')
            success = document.createElement('div')
            abord = document.createElement('div')
            const content = document.createElement('p')
            let cover = document.querySelector('#cover')
            let divCover = document.createElement('div')

            
            content.classList.add('alert')
            success.classList.add('cross')
            abord.classList.add('crossAbord')
            div.classList.add('modal')  
            
            content.textContent = 'Vous confirmez les modifications ?️'
            
            
            divCover.append(success,abord)
            divCover.classList.add('modalBox')
            div.append(content,divCover)
            
            pop.append(div)
            
            
            cover.classList.add('lock')
          
            
            closetab(abord,success,pop,div,cover);
            }
            
           
        })
    }}

 /***********Display Review Home page***********/
 
 
if(document.querySelector('#avgRating')){
    

    let feed = new FeedBack();
    feed.colorStars();
}




})