import Ajax from '../Ajax.js'

export default class Admin{
	
constructor(container,table,thead,tbody,tfoot,trHead){
	
	this.container = document.querySelector('.tableContainer')
	this.table = document.createElement('div')
	this.thead = document.createElement('h3')
	this.tbody = document.createElement('div')
 this.tfoot = document.createElement('tfoot')
	this.trHead = document.createElement('div')
}


    
  
    
    /***************************** Display all articles ********************/
    
displayArticles(articles){
     
     
     this.container.innerHTML = '';
     this.container.classList.add('grid');
     
     for(let article of articles ){
     

     let div = document.createElement('div')
     let title = document.createElement('p')
     let profil = document.createElement('p')
     let user = document.createElement('p')
     let img = document.createElement('img')
     let content = document.createElement('p')
     let date = document.createElement('small')
     let elt = Object.values(article)
     let btn = document.createElement('a')
     
      btn.textContent= 'Supprimer l\'article'
      title.textContent = ` Titre : ${article.title}`
      user.textContent = ` Login : ${article.login}`
      content.textContent = ` contenu : "${article.content}"`
      date.textContent = ` date de publication : ${article.publication_date}`
      
      img.setAttribute('src',`./assets/img/articles/${article.id}/${article.img}`)
      div.classList.add('adminArt')
      btn.setAttribute('id',`${article.login}`)
      btn.setAttribute('href',`index.php?p=deleteArt&num=${article.id}`)
      btn.classList.add('buttonImit')
      date.style.margin='2rem'
      profil.innerHTML = '<i class="far fa-newspaper fa-5x"></i>'
       
     div.append(profil,title,img,user,content,date,btn)
     this.container.append(div)  
      
     }
     

    }
    
    /************************Display Login ***************************/
    
 
displayLogin(requests){
     
     
     this.container.innerHTML = '';
     this.container.classList.add('grid');
     
     for(let i of requests ){
      

     const divDom = document.createElement('div')
     const divTitle =  document.createElement('div')
     const divDate = document.createElement('div')
     const info = document.createElement('div')
     const login = document.createElement('p')
     const logo = document.createElement('p')
     const level = document.createElement('p')
     const date = document.createElement('small')
     const btn = document.createElement('a')
     const edit = document.createElement('div')
     const nbPub = document.createElement('p')
     
     
     
      nbPub.textContent = 'Publications'
      btn.innerHTML = '<i class="fas fa-user-edit">Editer</i>'
      btn.setAttribute('href',`index.php?p=manageUser&user=${i['Login']}`)
      info.setAttribute('data-id',`${i['Login']}`)
      info.setAttribute('class','parameter')
      divTitle.classList.add('titleDesign')
      divDom.classList.add('adminArt')
      divDate.classList.add('dateArt')
      btn.setAttribute
      edit.classList.add('top-right')
      login.textContent = `${i.Login}`
      level.textContent = ` Profil : ${i.admin}`
      date.textContent = ` date d'inscription : ${i.creation_date}`
      logo.innerHTML = '<i class="fas fa-user-circle fa-3x"></i>'
      
    
   
     edit.append(btn);
     divTitle.append(logo,login,level);
     divDate.append(date);
     divDom.append(edit,divTitle,divDate,nbPub,info);
     this.container.append(divDom); 
      
     }
     
             /********count Articles by Login *******/
     
     const elements = document.querySelectorAll('.parameter')

            
            for(let i of elements){
                
            let ajax = new Ajax();
            ajax.ajaxCountArticles(i.dataset.id);
            
            
            }
     

    }
     /************************Display Login Count***************************/
countArticles(count){

for(let i of count){
 
   if(i.Login != null){
  
         let element = Object.values(i)
         
         let div = document.querySelectorAll('[data-id='+i.Login+']')
         
       
         for(let i of div){
           
            const span = document.createElement('span');
            span.setAttribute('data-count', `${element[0]}`);
            if(element[0] >= 10){
             span.classList.add('journalist');
            }
            span.classList.add('exist-number'+`${element[0]}`);
            
            span.textContent = `${element[0]}`;
            i.append(span);
            
          }
     
    }


 }
 

}     
     
     
     
     
     

	
	/***************************** Display review by Login ********************/
	
	
	displayReviewDash(reviews){
     
     if((reviews) != null){

     let div = document.querySelector('.img-form-admin')
     
     for(let i of reviews ){
      
      let modal = document.createElement('div')
      let log = document.createElement('p')
      let comment = document.createElement('p')
      let date = document.createElement('small')
      let rate = document.createElement('p')
      let btn = document.createElement('button')
      
      log.textContent = i.Login;
      comment.textContent = i.comment;
      date.textContent = i.publication_date;
      rate.textContent = i.rate;
      btn.setAttribute('id', i.id_review)
      btn.textContent = 'Modifier'
      
      modal.append(log,comment,date,rate,btn);
      div.append(modal);
      modal.style.backgroundColor = 'black'
      
      
      /*Login: "Test"
      comment: "Très beau site , pleins d'information et surtout ludique 😍"
      id_review: "11"
      id_user: "6"
      publication_date: "13/08/2021 à 17:14:43"
      */
      
      console.log(reviews)
      console.log(`Le Login est: ${i.Login} le commentaire :${i.comment} la note :${i.rate} publié le : ${i.publication_date}`)
  
      
     }
     }

    }
	
	
	
	
}