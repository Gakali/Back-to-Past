<?php
namespace App\controller;

use App\core\Connect;
use App\model\{Message,User,Dashboard,Article};




if(isset($_POST['action'])) 
{
   
    $msg = new Message();
    $message = $msg->sendMessage($_POST['content'],$_POST['login']);
    echo $message;
};
if($_GET['ajax'] == 'recupAverage'){

    $msg = new Message();
    echo json_encode($msg->recupAverage());
    
}
if($_GET['ajax'] == 'viewReviewByLogin'){

    $msg = new Message();
    echo json_encode($msg->recupRevByLogin($_GET['user']));
    
}
if($_GET['ajax'] == 'recupMessages'){

    $message = new Message();
    echo json_encode($message->recupMessages());
   
};
if($_GET['ajax'] == 'recupUserOneline'){

    $user = new User();
    echo json_encode($user->getOnline());
    
};

if($_GET['ajax'] == 'viewMembers'){

    $mbr = new Dashboard();
    echo json_encode($mbr->viewMembers()) ;
   
}
if($_GET['ajax'] == 'getUser'){

    $mbr = new User();
    echo json_encode($mbr->getUser()) ;
    
    
}
if($_GET['ajax'] == 'articles'){

    $article = new Article();
    $articles = $article->recupArticles();     
     echo json_encode($articles);
    
    
}
if($_GET['ajax'] == 'ajaxCountArticles'){

    $msg = new Dashboard();
    echo json_encode($msg->countArticles($_GET['user']));
    
}
if($_GET['ajax'] == 'delArticles'){
 
    echo 'je suis dans le Controller';
 
    /*$article = new Article();
    $articles = $article->recupArticles();     
     echo json_encode($articles);*/
    
    
}

/************************************ MANAGE USER SELF  *****************************************/

