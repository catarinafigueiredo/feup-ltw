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
?>