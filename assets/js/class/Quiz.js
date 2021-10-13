export default class Question {


    
    constructor(text, choices,answer){
        this.text = text;
        this.choices = choices;
        this.answer = answer;
    }
    isCorrectAnswer(choice){
        
        return this.answer === choice ; 
    }
}
let questions = [
    
    new Question('Qu\' est ce qu\'une VHS ? ',['Le nouvel Avenger ?','le frère de R2D2 🤖?','Une maladie venue du fond des ages ? ','un dispositif de visionnage vidéo à bande'], 'un dispositif de visionnage vidéo à bande'),
    
    new Question('Comment  composait-on le numéro sur un telephone à cadrant  ',['Bah en appuiyant sur les touche!','en demandant à Siri biensur','Ton truc n\'a jamais existé','en tournant le cadrant jusqu\'a la gachette'], 'en tournant le cadrant jusqu\'a la gachette'),
    
    new Question('Quelle est la marque qui inventa la cassette audio? ',['Sony ?','Philips ?','Gaumont ?','Microsoft ?'], 'Philips ?'),
    
    new Question('qu\'est ce qu\'un Walkman? ',['Un homme qui marche?','Un dispositif d\'ecoute ?','le prix de celui qui fini le GR 20','une épreuve du Triathlon'], 'Un dispositif d\'ecoute ?'),
    
    new Question('En quelle année fut lancée la playstation en europe? ',['1990','1789','1995','2000'], '1995'),
    
    new Question('qu\'est-ce qu\'un Ghetto Blaster ou Boombox?',['Le dernier pistolet des Jedi?','Un danseur','l\'effet d\'une bombe sur les poumons','un poste audio de folie'], 'un poste audio de folie'),
    
    new Question('Quelle basket intégrait sur sa languette un bouton qui permettait de gonfler des poches d\'air sous la semelle ? ',['Rebook Pump','Jordan 1','Nike Air','Adidas Torsion'], 'Rebook Pump'),
    

    ];
   
   class Quiz{
       constructor(questions){
           this.score = 0;
           this.questions = questions;
           this.curentQuestionIndex = 0;
       }
       getCurrentQuestion(){
           return this.questions[this.curentQuestionIndex];
       }
       guess(answer){
           if(this.getCurrentQuestion().isCorrectAnswer(answer)){
               this.score++;
           }
           this.curentQuestionIndex++;
       }
       hasEnded(){
         return   this.curentQuestionIndex >= this.questions.length ;
       }
   }
   
   // le display
   
   const display = {
       elementShown : function(id,text){
           let element = document.getElementById(id);
           element.innerHTML = text;
       },
       endQuiz:function(){
           let endQuizHTML = `<p> Quiz terminé !</p>
           <p>Votre score est de : ${quiz.score} / ${quiz.questions.length }</p>`;
           this.elementShown('question',endQuizHTML);
       },
       question: function(){
           this.elementShown('question',quiz.getCurrentQuestion().text)
       },
       choices: function(){
           let choices = quiz.getCurrentQuestion().choices;
           
           
           let guessHandler = (id, guess) => {
               document.getElementById(id).onclick = function(){
                   quiz.guess(guess);
                   quizApp();
               }
           }
           for(let i = 0; i < choices.length ; i++){
               
               this.elementShown('choice' +i,choices[i]);
               guessHandler('guess' + i,choices[i]);
               
           }
       },
       
   }
   // logique
  let  quizApp = () =>{
       if(quiz.hasEnded()){
          display.endQuiz();
       }
       if(window.location.href == "https://"+location.host+location.pathname+"?p=home"){
           display.question();
           display.choices();
           //choice
       }
   }
   
   
   
   // creation du quiz

/*if(window.location.href == "https://"+location.host+location.pathname+"?p=home"){ */
   let quiz = new Quiz(questions);
  
   quizApp();
 

   