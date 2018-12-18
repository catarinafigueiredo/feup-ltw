<?php
include_once('../includes/database.php');

 function validUserPassword($username,$password){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->execute(array($username));
    $user= $stmt->fetch();
    return $user !== false && password_verify($password,$user['password']);

}

function UserExist($username){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->execute(array($username));
    $user= $stmt->fetch();
    return $user !== false ;
}

function get_users_by_name($information){
    $db=Database::instance()->db();
    $stmt=$db->prepare('SELECT * FROM user where username LIKE ?');
    $stmt->execute(array($information));
    return $stmt->fetchAll();
}

function CreateUser($username, $password, $name, $date, $email){
    $db=Database::instance()->db();
    $options= ['cost'=>12];
    $stmt = $db->prepare('INSERT INTO user VALUES(?,?,?,?,?)');
    $stmt->execute(array($username,password_hash($password,PASSWORD_DEFAULT,$options), $name, $date, $email));
}

function getUserInformation($username){
    $db=Database::instance()->db();
    $stmt=$db->prepare('SELECT * FROM user where username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

function getUserStorys($username){
    $db=Database::instance()->db();
    $stmt=$db->prepare('SELECT * FROM Post where username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}


function getUserComments($username){
    $db=Database::instance()->db();
    $stmt=$db->prepare('SELECT * FROM Comment where username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

?>