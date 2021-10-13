<?php 

namespace App\model;

use App\core\Connect;

class Message extends Connect{

    protected $_pdo;
    
    
 public function __construct(){
        
        $this->_pdo = $this->connexion();
    }
    
    
 public function sendMessage($content,$idUser){
        
    $content = htmlspecialchars(trim($content));
    
    if(!empty($content)){
        
    $sql="INSERT INTO 
                `Tchat_content`( `content`, `id_user`) 
          VALUES (:content, :id)";
    $query = $this->_pdo->prepare($sql);
    $query->execute([
        ':content' => $content,
        ':id' =>$idUser
        ]);
}
    
}

 public function recupMessages(){
        
    
         $user = new User;
         
         $user->getUser();
      
    $sql="SELECT id_tchat, `content`, user.login , DATE_FORMAT(publication_date, '%d/%m/%Y à %H:%i:%s') as publication_date
        FROM `Tchat_content` 
        INNER JOIN user ON Tchat_content.id_user = user.user_id ORDER BY id_tchat DESC LIMIT 10";
        
    $query = $this->_pdo->prepare($sql);
    $query->execute(); 
    $txt = $query->fetchAll(\PDO::FETCH_ASSOC);
    
   return $txt;
    
    
    
}

 public function deleteMessage($number){
      
    $sql="DELETE FROM `Tchat_content` LIMIT :number";
        
    $query = $this->_pdo->prepare($sql);
    $query->execute([
        ':number'=>$number]);   
    
     echo 'effacé avec succès';
}
 public function viewMessages(){
        
        $sql="SELECT `Login`,`id_tchat`, `content`, `id_user`, DATE_FORMAT(publication_date, '%d/%m/%Y à %H:%i:%s') as publication_date
                FROM `Tchat_content` 
                INNER JOIN `user`
                WHERE user.user_id = Tchat_content.id_user
                ORDER BY publication_date ASC ";
                
    $query = $this->_pdo->prepare($sql);
    $query->execute();
    $messages = $query->fetchAll(\PDO::FETCH_ASSOC);
     return $messages;
    }
    
 public function addRev($content,$rate,$user){
        
        $sql="INSERT INTO 
                `review`( `comment`,`rate`,`id_user`) 
          VALUES (:content, :rating, :id_user)";
                
    $query = $this->_pdo->prepare($sql);
    $query->execute([
        ':content'=>$content,
        ':rating'=>$rate,
        ':id_user'=>$user,
        ]);
    
    }
 public function recupAverage(){
    
    $sql="SELECT AVG(`rate`) 
    FROM review";
            
$query = $this->_pdo->prepare($sql);
$query->execute();
$num = $query->fetch(\PDO::FETCH_ASSOC);
     return $num;

}
 public function recupRev(){
        
         $sql="SELECT `id_user`,`comment`,DATE_FORMAT(publication_date, '%d/%m/%Y à %H:%i:%s') as publication_date,`rate`,`Login` 
                FROM `review`
                INNER JOIN user ON user.user_id = review.id_user
                ORDER by publication_date DESC";
                
    $query = $this->_pdo->prepare($sql);
    $query->execute();
    $messages = $query->fetchAll(\PDO::FETCH_ASSOC);
     return $messages;
    
    }
 public function recupRevByLogin($user){
        
         $sql="SELECT  Login,`comment`,`id_review`, `id_user`, `rate`, DATE_FORMAT(publication_date, '%d/%m/%Y à %H:%i:%s') as publication_date 
            FROM `review`
            INNER JOIN user ON user.user_id = review.id_user
            WHERE user.Login = :user";
                
    $query = $this->_pdo->prepare($sql);
    $query->execute([
        ':user' => $user
        ]);
    $messages = $query->fetchAll(\PDO::FETCH_ASSOC);
     return $messages;
    
    }




}
