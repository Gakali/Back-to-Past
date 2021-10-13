export default class feedBack{
    

 colorStars(){
   
          const stars = document.querySelectorAll('.stars');
          const note = document.querySelector('#scoring')
   
        for( let star of stars){
          
          star.addEventListener('mouseover', function(){
              
              resetColorStars();
              
              this.classList.add('starsSelected');
              
             //previous element in the DOm
             
              let previousStar = this.previousElementSibling;
              
              while(previousStar){
                  
              previousStar.classList.add('starsSelected');
              previousStar = previousStar.previousElementSibling;
              
              }
          });
          
          star.addEventListener('click',function(){
              note.value = this.dataset.value;
          });
          
          star.addEventListener('mouseout',function(){
              
              resetColorStars(note.value);
              
          })
          
      }
      
   function resetColorStars(nb = 0){

    for(let star of stars){
        
        if(star.dataset.value > nb ){
        star.classList.remove('starsSelected');
        
        }else{
            star.classList.add('starsSelected')
        }
    }

}   
      
      
}

averageDiv(num){
    
        let emotion = document.querySelector('.emotion')
        let average = (Math.round(Object.values(num)));
        const div = document.getElementById('rateAVG')
        let p = document.createElement('span')
        p.innerHTML = average;
        div.append(p)
        
       
        
        if(average >= 3){
            let span = document.createElement('span')
            span.innerHTML = '<i class="fas fa-smile fa-5x"></i>'
            emotion.append(span)
        }else{
            let span = document.createElement('span')
            span.innerHTML = '<i class="fas fa-frown fa-5x"></i>'
            emotion.append(span)
        }
    
}



}