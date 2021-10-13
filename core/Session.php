<?php 

namespace App\core;

class Session {
    
    public static function deconnect(){
        
        session_start();
        session_destroy();
        
    }
    
    public static function setUserSession(array $sessions):void{ 
        
        foreach($sessions as $sessionKey => $sessionValue){

            $sessionValue = self::checkInput($sessionValue);
            $_SESSION['user'][$sessionKey]  = $sessionValue;
            
        }
        
    }
    
    public static function checkInput($data){

        if(is_numeric($data)){

            return intval($data);
            
        }else{
            
            return htmlspecialchars($data);
            
        }
    }
    
    public static function online() :bool {
        
        // verifie qu'une personne est connectée 
        if (array_key_exists('user', $_SESSION)) {
            
            return true;
            
        }else {
        // return soit true soit false 
            return false;
        }
        
    }
     public static function isAdmin(){
        
        // verifie qu'une personne est connectée 
        if (array_key_exists('user', $_SESSION)) {

      
           $admin =  isset($_SESSION['user']['admin']) ? $_SESSION['user']['admin']: 'normal';
           if($admin === 'admin'){ return true;
               
           }else{  return false;
               
           }

         }
    

    }
    
}