<?php 

namespace App\core;

class Https {


    // function qui me facilite les redirections 
    public static function redirect(string $path) :void {
    
        header('Location: '.$path);
        exit;
        
    } 
    
    
}