export default class Ajax{


function addMessage(message){
    
    console.log(message);
    // {name: "test", content: "test"}
    
    // 1 je récupere mes données et crée un formulaire avec FormData
    const form = new FormData();
    form.append('action','addMessage')
    form.append('content',message.content)
    form.append('login',message.name)


    // fetch(url, {method : post, mon formdata})
    fetch('index.php?ajax=send',{ method: 'POST', body: form }) // va chercher 
    .then(res => res.text()) // alors le resultat tu la recu en texte donc res.text()
    .then(res => 
        {
            console.log(res);
            
            document.querySelector('.result').innerHTML = res
            
            recupAjaxMessages();
        }
    ) 

}

// utilisation d'une requete ajax en get ( récuperer des valeurs seulement )
function recupAjaxMessages(){
    
    console.log('ici2');
   
    // fetch(url) -> par defaut c'est get 
    fetch('index.php?ajax=recupMessages')
    .then(res => res.json())
    .then(display) // j'ai envoyé en parametre ce qui était dans le then au dessus

}


function display(messages){
    

    
    const ul = document.createElement('ul')
    for(let message of messages){
    
        const li = document.createElement('li')
        // console.log(contact);
        
        li.textContent = `${message.login} : ${message.content} `
        
        ul.append(li)
    }
    
    
    // console.log(response);
    document.querySelector('.tchatBox').innerHTML = ''
    document.querySelector('.tchatBox').append(ul)

    
}

 <?php if(array_key_exists('admin',$_SESSION)) : ?>
 <?php else : ?>
 <p>Vous devez etre administrateur pour acceder à cette page </p>
<a href="index.php?p=home">retour à l'accueil </a>
    
    
<?php endif?>


/*        export default class Tools {

 escapeHtml(text){
      const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;'
        
      };
      
      return text.replace(/[&<>"]/g, function(m) { return map[m]; });
    }

}*/

<!--/* displayDash(requests){
   const container = document.querySelector('.tableContainer')
   console.log(container)
   const table = document.createElement('table')
   const thead = document.createElement('thead')
   const tbody = document.createElement('tbody')
   const tfoot = document.createElement('tfoot')

   const trHead = document.createElement('tr')
   
   table.classList.add('viewDash')
   tbody.classList.add('view1')
   trHead.classList.add('dashTitle')
   
    let title = []
    let content =[]
    let test2=[] ;
    let counter=0
    title.push(Object.keys(requests[0]))
    
  
    let numberItems = document.createElement('th')
     numberItems.textContent = 'num'
     trHead.append(numberItems)
    for(let i in title[0]){
     

     
     let dashItems = document.createElement('th')
     
     dashItems.textContent = title[0][i]
     
     trHead.append(dashItems)
     
    }
   
    
    for(let user of requests){
     let tr = document.createElement('tr')
     let User = Object.values(user)
     let td = document.createElement('td')
     td.textContent = counter
     tr.append(td)
     counter++
     for(let elements of User){
      let dashContent = document.createElement('td')
     
      dashContent.textContent = elements
     
      tr.append(dashContent)
      
     }
     tbody.append(tr)
    }
  
  
   thead.append(trHead)
   table.append(thead)
   table.append(tfoot)
   table.append(tbody)
   container.append(table)
    }*/-->