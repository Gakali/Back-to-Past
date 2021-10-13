
 function colorScreen(){
     
    
    const screen = document.querySelector('.tchatBox')
    const btnColorL = document.querySelector('.RightL')
     const btnColorR = document.querySelector('.LefltL')
    
    
   document.addEventListener('click',()=>{
    
       if(event.target.matches('.one')){
           document.querySelector('.one').classList.toggle('btnSelect')
           btnColorL.classList.remove('.redLight')
           btnColorL.classList.toggle('led')
           screen.classList.toggle('red')
       }
       if(event.target.matches('.two')){
        
           document.querySelector('.two').classList.toggle('btnSelect')
           btnColorR.classList.remove('.redLight')
           btnColorR.classList.toggle('led')
           screen.classList.toggle('yellow')
       }

 
 })}
 

 
 
document.addEventListener('DOMContentLoaded',function(){
   
        
        const input = document.getElementsByTagName('input')
        
        for(let i =0; i<input.length; i++){
        
        let message = input[i].getAttribute('placeholder')
        
       
       
               if(message =='à remplir')
               
               { input[i].style.borderColor = 'red'
                  
               } 
       
        }
        
    })


document.addEventListener('DOMContentLoaded', function(){
    
        const input = document.getElementsByTagName('input')
        
        for(let i =0; i<input.length; i++){
        
        let message = input[i].getAttribute('placeholder')
        
        
           if(message =='à remplir')
           
           { input[i].style.borderColor = 'red'
               input[i].classList.add("error")
             
           } 
        
        }
        
        
        
        colorScreen();

  
   
 
})

let mouse = document.addEventListener('mousemove',(e)=>{
 
           let div = document.getElementById('ball')
           let small = document.getElementById('smallBall')
           let big = document.getElementById('bigBall')
           
           
           
           let count =  setInterval(increase,500)
           
           
           let x = e.pageX
           let y = e.pageY
           let z = e.pageX/2
           let color = 'rgb('+ y + ' '+ (z/2)+ ' '+ z + ')'
           let offsetX = '-45px';
           let offsetY = '-15px';
           let blur = '23px'
           
           
           
           function increase() {
              
           
              div.style.left = (x+35) + 'px'
              div.style.top = (y) + 'px'
              div.style.backgroundColor = 'rgb(255 81 162 , 1);'
              div.style.boxShadow = (offsetX+' '+offsetY+' '+blur+' '+color);
              div.style.width = '20px'
              div.style.height = '20px'
              div.style.zIndex = '-2'
              
           
              
              
              small.style.left = (x-3) + 'px'
              small.style.top = (y-5) + 'px'
              small.style.backgroundColor = color;
              small.style.boxShadow = (offsetX+' '+offsetY+' '+blur+' '+color);
              small.style.width = '5px'
              small.style.height = '5px'
              small.style.zIndex = '-2';
              
            
           
           
              clearInterval(count)
              
            }

})


function createDiv(){
         
         let content = document.querySelector('.deco-bricks');
         const txt = document.querySelector('.description')

         let maxWidth = txt.clientWidth
         let maxHeight = txt.clientHeight
         let divWidth = 100;
         let divHeight = 100;
         let posLeft = txt.offsetLeft;
         let posHeight = txt.offsetTop;
        

         
         
         while(posLeft < maxWidth){
              
              let footer = document.querySelector('.footer')
              let div = document.createElement('div');
              
              div.style.width = divWidth + 'px';
              div.style.height = divHeight + 'px';
              div.style.position = 'absolute';
              div.style.left = posLeft  + 'px';
              div.style.top = posHeight + 'px';
              div.style.borderRadius = '5%'
              div.style.zIndex = '-3'
              posLeft += divWidth + 2;
              div.style.backgroundColor = '#000000bf'
              txt.append(div)
              
           if((posLeft >= maxWidth) &&(posHeight < maxHeight ) ){
              
              posHeight += divHeight+2;
              posLeft = 1
              
           }
          
         }
         
         
        }

const deco = document.querySelectorAll('.deco-text')
let out = 999
let inter = 10000
          
setInterval(function(){

         deco[3].classList.add('neon')
         
         setTimeout(function remove(){
          deco[3].classList.remove('neon')
         },999)
         
         
}, 10000)
        
setInterval(function(){

         deco[1].classList.add('neon')
         
         
         setTimeout(function remove(){
          deco[1].classList.remove('neon')
         },999)
         
         
}, 10000)
        
setInterval(function(){

         deco[2].classList.add('neon')
         
         setTimeout(function remove(){
          deco[2].classList.remove('neon')
         },999)
         
         
}, 500)
        
setInterval(function(){

         deco[0].classList.add('neon')
         
         setTimeout(function remove(){
          deco[0].classList.remove('neon')
         },999)
         
         
}, 2000)
        
       /********************* Research View Admin*******************/
if(document.querySelector('#search')){  
       
        const searchBar = document.forms['search'].querySelector('input');
    
    searchBar.addEventListener('keyup',function(e){
     
        const list = document.querySelector('#UserList');
        const wordSeacrh = e.target.value.toLowerCase();
        const Logins = list.querySelectorAll('.eachUserAdm')
    
     Array.from(Logins).forEach(function(login){
    
      const title = login.firstElementChild.textContent;
    
      if(title.toLowerCase().indexOf(wordSeacrh) != -1){
        login.style.display = 'block'
      }else{
       login.style.display = 'none'
      }
     })
    })
}