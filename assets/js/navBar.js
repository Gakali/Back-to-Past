const navBar = document.querySelector('#more')
const navBar2 = document.querySelector('#more2')
const ul=document.querySelector('.hidden')
const ul2=document.querySelector('.hidden2')

let down = false



document.addEventListener('DOMContentLoaded',()=>{
    
document.addEventListener('click',(e)=>{

    if(e.target.matches('#more')){
   ul.classList.toggle("hidden")
   
   down = true;
   return}
   
   
   if(e.target.matches('#more2')){
   ul2.classList.toggle("hidden")
   down = true;
   return}
 

})

}) 


/*let li1 = document.createElement('li')
let li2 = document.createElement('li')
let li3 = document.createElement('li')
let link1 = document.createElement('a')
let link2 = document.createElement('a')
let link3 = document.createElement('a')*/

 /*link1.innerHTML = "<a href='index.php?p=past'>Le siècle passé</a>"
   link2.innerHTML = "<a href='index.php?p=history#history'>Histoire</a>"
   link3.innerHTML = "<a href='#'> Blabla 🗣 </a>"
   
   li1.appendChild(link1)
   li2.appendChild(link2)
   li3.appendChild(link3)
   
   ul.append(li1,li2,li3)
   
   ul.style.flexDirection = 'column'*/
  
   
   
   //down = true;
   
     //return
   /*else{
    
       li.classList.toggle("hidden")
       while (ul.firstChild) {
        ul.removeChild(ul.firstChild);}
       down = false;
       console.log(down)
       down = false;
       return
   }*/
    
    //navDom.classList.toggle("hidden")
    
    