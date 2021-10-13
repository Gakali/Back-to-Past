<?php 

namespace App\controller;

use App\model\{User,Dashboard,Article,Message};
use App\controller\{FormController};
use App\core\{Session, Cookie,Https};

class FrontController{
    
    protected $_user;// = new User();
    
    public function home(){
        
         $article = new Message();
        $articles = $article->recupRev();
    
        
        $title = 'home';
        
        $this->render('/homeView',[ 'title'=> $title ,'articles' => $articles]);
    
    }
    public function test(){
        $title = 'Accueil';
        $article = new Message();
        $articles = $article->recupRev();
        $this->render('/test', [ 'title'=> $title ,'reviews' => $articles ]);
    }
    
    public function past(){
        
        $title = 'Articles';
        $article = new Article();
        $articles = $article->recupArticles();
        
         if($_POST):
             
            $form   = new FormController(new User());
            $form->setArticle($article);
            $messages = $form->articleForm($_POST);   
            
        endif;
        
      /*  if ($messages){
             $this->render('/pastView',['articles'=> $articles ,'title'=>$title, 'messages'=>$messages]);
        }else{*/
            $this->render('/pastView',['articles'=> $articles ,'title'=>$title,'messages' => ($messages) ?? null]);
       // }
    }
   public function deleteArtByUser(){
        
        if(!array_key_exists('numArticle',$_GET)){
            header('location: index.php?p=home');
            exit;
        }
        
        array_map('unlink', glob('assets/img/articles/'.$_GET['numArticle'].'/*'));
        rmdir('assets/img/articles/'.$_GET['numArticle']);
        $article = new Article();
        $article->deleteArticles($_GET['numArticle']);
        

        header('location: index.php?p=manageSelf&user='.$_SESSION['user']['login']);
        exit;
        
    }
     public function deleteRevByOwn(){
        
        if(!array_key_exists('numRev',$_GET)){
            header('location: index.php?p=home');
            exit;
        }
        
       
        $article = new Dashboard();
        $article->delReviewByLogin($_GET['numRev']);
        

        header('location: index.php?p=manageSelf&user='.$_SESSION['user']['login']);
        exit;
        
    }
    
     public function history(){
        $title ='Histoire';
         $this->render('/history',['title'=>$title]);
    
        
     }

    public function admin(){
        
        $title ='Page Admin';
        

        if(Session::isAdmin()){
            
            $rev = new Message;
            $rate = $rev->recupAverage();
            
            $user = new Dashboard;
            $users = $user->viewMembers();
            $count = $user->CountMembers();
            
            
       $this->render('/admin',['title'=>$title,'rate'=>$rate,'users'=>$users,'count'=> $count ]);
         
        }else{
             
          $this->render('/stop',['title'=>$title]); 
          
        }; 

    }
     public function manageUser(){

        $title = 'Page Admin';

        if(Session::isAdmin()){
            
        if($_GET['user']):
            
            $login = ($_GET['user']);
 /* faire les modifications de l'insatanciation de new User comme fait à la ligne 158 */
             $user = new User();
             
            $userManaged = $user->recupUserByLogin($login);
            
        
         endif;    
       $this->render('/manageUser',['userManaged'=>$userManaged, 'title'=> $title ]);
         
        }else{
             
          $this->render('/stop',['title'=> $title ]); 
          
        }; 

    }
      public function manageSelf(){


        if (Session::online()){
            
            $title = 'Compte Perso';

            
            $login = ($_SESSION['user']['login']);
  /* faire les modifications de l'insatanciation de new User comme fait à la ligne 158 */
            
            $user = new User();
            $userSelf = $user->recupUserByLogin($login);
            
            $article = new Article();
            $articles = $article->recupArticlesByUser($login);
  
            $rev = new Message();
            $reviews = $rev->recupRevByLogin($login);

        
        // endif;    
       $this->render('/manageSelf',['title'=> $title, 'userSelf'=>$userSelf,'reviews'=>$reviews,'articles'=>$articles]);
         
        }else{
             
          $this->render('/register'); 
          
        }; 

    }
    
    public function updateUser(){
        
        
        
     if (Session::online()){
         
        if($_POST):
           
            $title = 'Page gestion Perso';
            $user = $this->_user = new User();
            $form   = new FormController($this->_user);
            $messages = $form->updateUser($_POST);
        
         endif;


        $this->render('/manageUser', [ 'title'=> $title , 'user' => $user, 'messages' => $messages]);
        
     }else{
         
        header('Location: index.php');
         exit; 
         
     }
        
    }
     public function review(){
 
       $title = 'Accueil';
       
        $article = new Message();
        $articles = $article->recupRev();
        

         
         if(!empty ($_POST['comments'])):
             
            $form = new User;
            $user = $form->recupUserByLogin($_SESSION['user']['login']);
            $comment = htmlspecialchars(($_POST['comments']));
            $scoring = ($_POST['sccoring']);
            $user = ($user['user_id']);
            $rev  = new Message(new User());
            $rev->addRev($comment,$scoring,$user);
           
            
        endif;
        
        
        header('Location: index.php?p=login');
         
        //}else{
           // header('Location: index.php?p=login');
       // }
        //$this->render('/homeView', [ 'title'=> $title ,'reviews' => $articles ]);
    }
    
     public function register(){
        
        (Session::online()) ? Https::redirect('index.php') : '' ; 
        
        $title = 'Register';
        
        
         if($_POST):
             
             $this->_user = new User();
             $form   = new FormController($this->_user);
            $messages = $form->registerForm($_POST);
        
         endif;

         $this->render('/register', [ 'title'=> $title , 'messages' => ($messages) ?? null ]);
     }
     
      public function deleteArt(){


    if(Session::isAdmin()){
        
        if(isset($_GET)):
        
        $message;
        $art = $_GET['num'];
        $del = new Article;
        
             
        array_map('unlink', glob('assets/img/articles/'.$_GET['num'].'/*'));
        rmdir('assets/img/articles/'.$_GET['num']);
        
        $del->deleteArticles($art);
        $title = 'Page Admin';
        
 
       header("Refresh:0; url=index.php?p=admin");
         
        endif;
    }else{
        
         $this->render('/stop',['title'=> $title ]); 
    }      
  
     }

     public function login(){
        
         (Session::online()) ? Https::redirect('index.php') : '' ; 
         
        $title = 'Login';

         if($_POST):
            $this->_user = new User();
             $form   = new FormController($this->_user);
             $messages = $form->loginForm($_POST);
        
         endif;
        
        
         $this->render('/login',['title'=>$title, 'messages' => ($messages) ?? null,
                                            'cookie'  => new Cookie ]);
        
     }
    
     public function logout(){
         
         if($_SESSION)
         {
         $this->_user = new User();
         $this->_user->setOffline($_SESSION['user']['login']);
         Session::deconnect();
         
         header('Location: index.php');
         exit;
         }else{
        
        header('Location: index.php');
         exit;
         }
     }
     
     public function tchat(){
        $title = 'Tchat';

        if(Session::online()){
             if($_POST):
             $form   = new AjaxController();
            $messages = $form->registerForm($_POST);
        
         endif;
         
        }else{
            header('Location: index.php?p=login');
            
        }; 
        

         $this->render('/tchatView',['title'=>$title]);
     }
     
    
    
  
    
    public function render(string $path,$array = []){
    
   
        if(count($array) > 0){
            foreach($array as $key => $value){
                ${$key} = $value;
                
            } 
        }
        
        
        $session = new Session();
        $path = $path.".php";
        require 'template/template.php';
        
    }

}