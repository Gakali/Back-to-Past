<?php 

namespace App\controller;

use App\model\{User,Article};
use App\core\{ Session, Cookie };

class FormController {
    
    
    protected User $_user;
    protected $_article;
    
    public function __construct(User $user){
        
        $this->_user = $user;

    }
    
    public function registerForm(array $data){
     
        
        $messages = [];
        $photo = null;

        if($_FILES['photo']['error'] === 0){
            $photo = $_FILES['photo']['name'];
        }
 
        if (empty($data['login']))
            $messages['errors']['login'] = "veuillez remplir tous les champs";
        if (empty($data['firstname']))
            $messages['errors']['firstname'] = "prénom vide !";
        if (empty($data['name']))
            $messages['errors']['name'] = "nom à remplir";
        if (empty($data['mail']))
            $messages['errors']['mail'] = "mail ne peut être vide";
        if (empty($data['password']))
            $messages['errors']['password'] = "veuillez remplir un mdp";
        if (empty($data['password2']))
            $messages['errors']['password'] = "veuillez remplir un mdp";
            
        // verif 2
        if(!strlen($data['login']) >= 3)
            $messages['errors']['login'] = "Votre login est trop court ";
            
        if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) 
            $messages['errors']['mail'] = "L'adresse mail n'est pas valide  ";

        if ($data['password'] !== $data['password2']) 
            $messages['errors']['password'] = "Les mots de passe doivent correspondre";

        $exist = $this->_user->recupUserByMail($data['mail']);
    
        if($exist)
            $messages['errors'][] = "L'email existe dejà";
    
        if(empty($messages['errors'])){
            
            
            $userReg = $this->_user->addUser($data['login'],
                                            $data['name'],
                                            $data['firstname'],
                                            $data['password'],
                                            $data['mail'],
                                            $photo);
            $messages['success'] = ['Inscription réussie'];
            //ici
            $existLogin = $this->_user->recupUserByLogin($data['login']);
            Session::setUserSession($existLogin);
            // Ici le setOnline
            $this->_user->setFirstOnline($data['login']);
        }
 
        if($_FILES['photo']['error'] === 0){    
        
            // variables 
            
     
            $chemin_dossier = './assets/img/profils';
            
            // traitement 
            
            mkdir($chemin_dossier.'/'.$data['login'], 0711);
            move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_dossier.'/'.$data['login'].'/'.$photo);
        }
        
        return $messages;
    }

    public function loginForm(array $data){
        
        
        
        // verif 1
        if(empty($data['password']) || empty($data['mail'])|| empty($data['login']) ){
            if (empty($data['password']))
                $messages['errors']['password'] = "veuillez remplir un mdp";
            if (empty($data['mail']))
                $messages['errors']['mail'] = "mail ne peut être vide";
            if (empty($data['login']))
                $messages['errors']['login'] = "login ne peut être vide";
            else
            $messages['errors'][] = "veuillez remplir tous les champs";
            
        }else{ 
            
          
            $existLogin = $this->_user->recupUserByLogin($data['login']);
            $exist = $this->_user->recupUserBymail($data['mail']);
            
           if(!$exist){

                $messages['errors']= ["l'adresse mail comporte une erreur"];

                
            }else if (!$existLogin){
            
             $messages['errors']= ["Le login n'existe pas "];
            
            
            }else if (password_verify($data['password'], $exist['password'])) {  
                
                    Session::setUserSession($exist);

               $messages['success'][] = 'Bonjour '.$_SESSION['user']['login'].'.';
                               
                (isset($data['remember'])) ? Cookie::setCookies($data) : Cookie::deleteCookie($data);

                // Ici le setOnline
                $this->_user->setOnline($data['login']);

                
            } else {
                
                $messages['errors'][] = 'Le mot de passe est invalide.';
            }
            
        }
        
        return $messages;
            
    }

    public function articleForm(array $data){
      

        $photo = null;
            
        if(empty($data['title']) 
        || empty($data['content'])){
            
            $message['errors'][] = "veuillez remplir tous les champs";
            
        } 
            
        if($data['category'] !== 'jeux' 
        && $data['category'] !== 'objets' 
        && $data['category'] !== 'outils'
        && $data['category'] !== 'autres'){
            $data['category'] = 'autres';
            
        }
            
        // Partie photo 
        
        if($_FILES['photo']['error'] === 0){
            $photo = $_FILES['photo']['name'];
        }

        if(empty($message['errors'])){
            $idArticle = $this->_article->addArticle($data['title'],
                                                     $data['content'],
                                                     $photo,
                                                     $data['category'],
                                                     $_SESSION['user']['user_id']);
        }  

        if($_FILES['photo']['error'] === 0){    
        
            // variables 
            
            $lastId = $idArticle;
            $chemin_dossier = './assets/img/articles';
            
            // traitement 
            
            mkdir($chemin_dossier.'/'.$lastId, 0711);
            move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_dossier.'/'.$lastId.'/'.$photo);
        }
            
        if(empty($message['errors'])){
            
            //header('location: index.php?p=past');
            //exit;
            $message['success'] = 'Article ajouté';
            
        }
        return $message;
            
        

    }
    
    /***********Page de Mise à jour User by admin***************/
    
    public function updateUser(array $data){
        
       // var_dump($_data);
        
        $user = new User;
        $profil = $data['idUser'];
        $info = $user->recupUserByLogin($profil);
        
        
        $messages = [];
        
       
        
    if(!empty($data)){
        

        
        if(!empty($data['Login'])){
            
            $data['Login'] = ucfirst($data['Login']);

            $data['Login'] = ucfirst($data['Login']);
            
             $exist = $this->_user->recupUserByLogin($data['Login']);
 
            
 
            if($exist){
            $messages['errors'][] = "Le login est déja existant";
            }
            
            if(!strlen($data['Login']) >= 3){
                
             $messages['errors']['Login'] = "Votre login est trop court ";
            }
            
            if(empty($messages)){
                
               $messages['success'][] = $this->_user->updateLoginAdmin($data['Login'],$data['idUser']);
               
               if(!empty($info['photo'])){
                   
               rename("assets/img/profils/".$data['idUser'] ,"assets/img/profils/".$data['Login']);
               
               }
               
               
               
            }
        }
        if(!empty($data['name'])){
            
            $data['name'] = ucfirst($data['name']);
            $messages['success'][] = $this->_user->updateNameAdmin($data['name'],$data['idUser']);
            //echo $login;
        }
        
        if(!empty($data['firstname'])){
            $data['firstname'] = ucfirst($data['firstname']);
            $messages['success'][] = $this->_user->updateFirstNameAdmin($data['firstname'],$data['idUser']);
            //echo $login;
            }
        if(!empty($data['password'])){
            
            if ($data['password'] !== $data['password2']){ 
                $messages['errors']['password'] = "Les mots de passe doivent correspondre";
        
            }else{
                if(!empty($data['password'])){
                   $messages['success'][] = $this->_user->updatePassword($data['password'],$data['idUser']);
                   //echo $messages['success'];
                }
            }
        }
            
        if(!empty($data['mail'])){
            
            $exist = $this->_user->recupUserByMail($data['mail']);

            
            if($exist){

                $messages['errors'][] = "L'email existe dejà";
                //var_dump($messages);
                
            }else{
               
                $login = $this->_user->updateMailAdmin($data['mail'],$data['idUser']);
        }}
        
        if(!empty($data['admin'])){

             $messages['success'][] = $this->_user->updateIsAdmin($data['admin'],$data['idUser']);
            //echo $login;

            
        }
        if(!empty($data['delete'])){
            
            
            if(!empty($info['photo'])){
                
                    array_map('unlink', glob('assets/img/profils/'.$data['idUser'].'/*'));
                    
                    rmdir('assets/img/profils/'.$data['idUser']);
                    
                    $messages['success'][] = $this->_user->deleteUser($data['idUser']);
                    
                     $messages['success'] = ['Action effectuée'];
            }
            
             $messages['success'][] = $this->_user->deleteUser($data['idUser']);
        }
        
        
    }else{
        $messages['errors'] = 'Aucune donnée n\'a été transmise';
    }
    return $messages;
}
      

    /***************************************************/
    
    public function setArticle($article){
        
        $this->_article = $article;
        
    }
    
}