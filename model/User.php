<?php 

namespace App\model;

use App\core\Connect;

class User extends Connect{

    protected $_pdo;
    
    
    public function __construct(){
        
        $this->_pdo = $this->connexion();
    }
    
    
    public function addUser($login,$name,$firstname,$password,$mail,$photo){

        
        $password = password_hash($password, PASSWORD_DEFAULT); // je hash mon mot de passe 
        
        $sql = "INSERT INTO `user`(`login`,`name`, `firstname`,`password`,`photo`, `mail`) 
                VALUES (:login,:name,:firstname,:password,:photo,:mail)";
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                ':login' => $login,
                ':name' => $name,
                ':firstname' => $firstname,
                ':password' => $password,
                ':mail' => $mail,
                ':photo' => $photo,
        ]);
      
    }
    


    public function recupUserBymail($mail){
        
        $sql = "SELECT `user_id`,`login`, `password`, `mail`, `creation_date`,`admin`,`photo` 
                FROM `user` WHERE mail = :mail";
                
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                ':mail' => $mail,
             
            ]);
        return $query->fetch(\PDO::FETCH_ASSOC); 
        
    }
     public function recupUserByLogin($login){
        
        $sql = "SELECT `user_id`,`name`,`firstname`,`login`, `password`, `mail`, DATE_FORMAT(creation_date, '%d/%m/%Y à %H:%i:%s') as creation_date,`admin`,`photo`
                FROM `user` 
                WHERE login = :login";
                
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                ':login' => $login,
             
            ]);
        return $query->fetch(\PDO::FETCH_ASSOC); 
        
    }
    
    /*Request to Update User by Login*/
    
    public function updateLoginAdmin($value,$user){

        $sql = "UPDATE user 
                SET Login = :value 
                WHERE  login = :user ";
               
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                    ':value' => $value,
                    ':user' => $user
                         ]);
        return 'Login modifié avec success' ;
        
    }
      public function updateNameAdmin($value,$user){

        $sql = "UPDATE user 
                SET name = :value 
                WHERE  login = :user ";
               
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                    ':value' => $value,
                    ':user' => $user
                         ]);
        return 'Nom modifié avec success' ;
        
    }
     public function updateFirstNameAdmin($value,$user){

        $sql = "UPDATE user 
                SET firstname = :value 
                WHERE  login = :user ";
               
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                    ':value' => $value,
                    ':user' => $user
                         ]);
        return 'Prénom modifié avec success' ;
        
    }
    public function updatePassword($password,$user){

        $password = password_hash($password, PASSWORD_DEFAULT); 
        
        $sql = "UPDATE user 
                SET password = :password 
                WHERE  login = :user ";
               
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                    ':password' => $password,
                    ':user' => $user
                         ]);
        return 'Mot de passe modifié avec success' ;
        
    }
     public function updateMailAdmin($value,$user){

        $sql = "UPDATE user SET mail = :value 
                WHERE  login = :user ";
               
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                    ':value' => $value,
                    ':user' => $user
                         ]);
                         
        return 'Mail modifié avec success' ;
        
    }
     public function updateIsAdmin($value,$user){

        $sql = "UPDATE user 
                SET admin = :value 
                WHERE  `Login` = :user ";
                
              
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                    ':value' => $value,
                    ':user' => $user
                         ]);
        return 'Le profil a été mis à jour' ;
        
    }
     public function deleteUser($login){

        $sql = "DELETE FROM `user` 
                WHERE `Login` = :value ";
               
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                    ':value' => $login,
                         ]);
        return 'modification effectuée avec succès';
        
    }
    
    public function setFirstOnline($login){
        
        $sql = "INSERT INTO Tchat_content(id_user, content, is_online) 
                VALUES((SELECT user.user_id 
                FROM user 
                WHERE user.Login=:login), 'vient de s\'inscrire !', 1)";
                
         $query = $this->_pdo->prepare($sql);
        $query->execute([
            ':login'=>$login,
            ]);
        
    }
   
    
    public function setOnline($login){
        
        $sql = "UPDATE Tchat_content 
                SET is_online=1 
                WHERE id_user=(SELECT user_id FROM user WHERE login=:login)";
                
        $query = $this->_pdo->prepare($sql);
        $query->execute([
            ':login'=>$login,
            ]);
    }
    
    public function setOffline($login){
        
        $sql = "UPDATE Tchat_content 
                SET is_online=0 
                WHERE id_user=(SELECT user_id 
                FROM user 
                WHERE login=:login)";
                
        $query = $this->_pdo->prepare($sql);
        $query->execute([
            ':login'=>$login,
            ]);
    }
    public function getOnline(){
        
        $sql = "SELECT distinct(user.login),photo
                FROM user, Tchat_content 
                WHERE user.user_id = Tchat_content.id_user 
                AND Tchat_content.is_online = 1";
                 
        $query = $this->_pdo->prepare($sql);
        $query->execute();
        $users = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }
     public function isAdmin($login){
        $sql = "SELECT `admin`,:login 
                FROM user 
                WHERE admin = admin";
                
        $query = $this->_pdo->prepare($sql);
        $query->execute([':login'=>$login]);
        $users = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }

    public function getUser(){
        return $_SESSION['user']['login'];
    }
    
}