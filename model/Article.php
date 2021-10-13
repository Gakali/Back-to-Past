<?php 

namespace App\model;

use App\core\Connect;

class Article extends Connect{

    protected $_pdo;
    
    
 public function __construct(){
        
        $this->_pdo = $this->connexion();
    }
    
 public function addArticle( $title, $content,$photo,$category,$userId){
    
        
        $sql = "INSERT INTO `article`( `id_user`, `title`, `content`, `img`, `category`)     VALUES (:id_user,:title,:content,:photo,:category)";
        $query = $this->_pdo->prepare($sql);
        $query->execute([
            ':title'    => $title,
            ':content'  => $content,
            ':photo'    => $photo,
            ':category' => $category,
            ':id_user'  => $userId
            ]);
            
        return $this->_pdo->lastInsertId();
        
    }

 public function recupArticles(){
    
        /* récuperation des anciens articles  */
        $sql = 'SELECT `id`, `title`, `content`, `img`, `category`, `login`, DATE_FORMAT(publication_date, "%d/%m/%Y") as publication_date,`photo`
                FROM `article` 
                INNER JOIN  user 
                ON article.id_user = user.user_id
                ORDER BY `publication_date` DESC';
        $query = $this->_pdo->prepare($sql);
        $query->execute();
        $articles =  $query->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
        
    }
    
 public function recupArticlesByUser($user){
    
      
        $sql = 'SELECT `id_user`,`id`,`title`,`content`,`img`,`category`, DATE_FORMAT(publication_date, "%d/%m/%Y") as         publication_date 
                FROM `article`
                INNER JOIN user ON user.user_id = article.id_user
                WHERE `Login` =:user ';
                
        $query = $this->_pdo->prepare($sql);
        $query->execute([':user' => $user]);
       return $art = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        
    }

 public function deleteArticles($num){
    
        /* effacer  articles  */
        $sql = '
        DELETE FROM `article` 
        WHERE `id`= :num';
        $query = $this->_pdo->prepare($sql);
        $query->execute([':num' => $num]);
        
       
        $query->fetchAll(\PDO::FETCH_ASSOC);
        
         return $query = ['succes']['effacé avec succes'] ;
        
    }
 

}
  
  
   