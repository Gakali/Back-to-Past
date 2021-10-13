<?php 

namespace App\core;

use \PDO; 

class Connect{
    
    const HOST = "";
    const DB_NAME ="isaacgak_finalProject";
    const USER ="isaacgak";
    const PASSWORD = "";
    

    public function connexion(){
        
        $pdo = new PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME, self::USER, self::PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;
        
    }

}
