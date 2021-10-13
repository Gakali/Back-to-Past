<?php 

namespace App\model;

use App\core\Connect;

class Dashboard extends Connect{

    protected $_pdo;
    
    
 public function __construct(){
        
        $this->_pdo = $this->connexion();
    }
    
    
 public function viewMembers(){
        
        
    $sql="SELECT  `admin`, `Login`, `name`, `firstname`, `mail`, DATE_FORMAT(creation_date, '%d/%m/%Y à %H:%i:%s') as creation_date,`photo` 
        FROM `user`
        ORDER BY login ASC ";
    $query = $this->_pdo->prepare($sql);
    $query->execute();
    $user = $query->fetchAll(\PDO::FETCH_ASSOC);
     return $user;
        
    }
    public function CountMembers(){
        
        
    $sql="SELECT COUNT(*) 
    FROM `user` ";
    
    $query = $this->_pdo->prepare($sql);
    $query->execute();
    $user = $query->fetchAll(\PDO::FETCH_ASSOC);
     return $user;
        
    }
 public function countArticles($login){
        
        
    $sql="SELECT COUNT(*), `Login`
            FROM `article` 
            INNER JOIN user ON user.user_id = article.id_user
            WHERE Login = :login ";
    $query = $this->_pdo->prepare($sql);
    $query->execute([
        ':login'=>$login
        ]);
    $user = $query->fetchAll(\PDO::FETCH_ASSOC);
     return $user;
        
    }
 public function delReviewByLogin($rev){
        
        
    $sql="DELETE FROM `review` WHERE `id_review` = :id";
    $query = $this->_pdo->prepare($sql);
    $query->execute([
        ':id'=>$rev
        ]);
    
     return $message = 'Avis Supprimé';
        
    }
    
    

}