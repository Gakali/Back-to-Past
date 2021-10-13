<h1>test</h1>

<p><?php var_dump($articles) ?></p>
<p>je fais un test</p>


<?php if(!empty($match)){ ?>
    
    <p><?= $match ?></p>
    
    <?php } ?>
    
    
    <?php if(!empty($match !== $_SESSION['user']['login'])){ ?>
    
    <div>
        <p>je suis un premier test</p>
    </div>
    <div>
        <p>je suis un premier test</p>
    </div>
    <div id='<?php $_SESSION['user']['login']?>'
        <p>je suis un premier test</p>
    </div>
    
    <?php } ?>
    
    
    <?php
    $xmlDoc = new DOMDocument();
    $xmlDoc->load( 'data.xml' );

    $searchNode = $xmlDoc->getElementsByTagName( "p" );

foreach( $searchNode as $searchNode )
{
    $valueID = $searchNode->getAttribute('id');
    if($valueID == $_SESSION['user']['login']){
        
        
        
        echo '<h1> je suis le test final </h1>';
        
    }

    //$xmlDate = $searchNode->getElementsByTagName( "Date" );
    //$valueDate = $xmlDate->item(0)->nodeValue;

    /*$xmlAuthorID = $searchNode->getElementsByTagName( "AuthorID" );
    $valueAuthorID = $xmlAuthorID->item(0)->nodeValue;
   
    echo "$valueID - $valueDate - $valueAuthorID\n";*/
    
    
    
    
    
}
?>
