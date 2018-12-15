
<?php
include_once('../includes/database.php');

function getRecentPublications(){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post ORDER BY  pDate DESC');
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function getOldestsPublications(){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post ORDER BY  pDate ');
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function getRecentPublicationsUser($username){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post Where username=? ORDER BY  pDate DESC');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

function getPopularPublications(){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post  ORDER BY  (up-down) DESC');
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function getSubscribedPublications($username){
    
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT CategoryName FROM SubscribeCategory ');
    $stmt->execute(array());

    $categories= $stmt->fetchAll(); 
    $story=array();
    $break="DDDDDD";
    //print_r($story);
   
    foreach ($categories as $category) {
       
        $stmts= $db->prepare('SELECT * FROM Post WHERE CategoryName=?');

        $stmts->execute(array($category['CategoryName']));
        $storys = $stmts->fetchAll(); 
        //print_r($storys);
        $end= array_merge($story,$storys);
        $story=$end;
       
        //echo $break;

        
    } 
    //print_r($story);
    return $story;
}


?>



