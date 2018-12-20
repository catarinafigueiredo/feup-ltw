<?php 
include_once('../includes/database.php'); 

function getAllCategory(){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT CategoryName FROM Category');
    $stmt->execute(array());
    return $stmt->fetchAll();
}
?>

<?php 
include_once('../includes/database.php'); 

function getAllStoriesCat($category_id){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post where CategoryName = ?');
    $stmt->execute(array($category_id));
    return $stmt->fetchAll();
}

function createNewCategory($category_id){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post where CategoryName = ?');
    $stmt->execute(array($category_id));
    return $stmt->fetchAll();
}


function categoryExists($category_id){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post where CategoryName = ?');
    $stmt->execute(array($category_id));
    $category= $stmt->fetch();
    return $category !== false ;
}


function insertCategory($category){
    $db=Database::instance()->db();
    $stmt= $db->prepare('INSERT INTO Category VALUES(?)');
    $stmt->execute(array($category));
    return $stmt->fetchAll();
}

function  subscribeCategory($username,$category){
    $db=Database::instance()->db();
    $stmt= $db->prepare('INSERT INTO SubscribeCategory VALUES(?,?)');
    $stmt->execute(array($username,$category));
    return $stmt->fetchAll();

}

function  ifsubscribeCategory($username,$category){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM SubscribeCategory where username=?  and CategoryName = ?');
    $stmt->execute(array($username,$category));
    $user= $stmt->fetch();
    if( empty($user)){
           return false;
       }else{   
            return true;
       }

}
?>