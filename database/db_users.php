<?php
include_once('../includes/database.php');

 function validUserPassword($username,$password){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->execute(array($username));
    $user= $stmt->fetch();
    return $user !== false && password_verify($password,$user['password']);

}

function UserExist($username,$password){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->execute(array($username));
    $user= $stmt->fetch();
    return $user !== false ;

}

function CreateUser($username, $password, $name, $date, $email){
    $db=Database::instance()->db();
    $options= ['cost'=>12];
    $stmt = $db->prepare('INSERT INTO user VALUES(?,?,?,?,?,?)');
    $stmt->execute(array($username,sha1($username),password_hash($password,PASSWORD_DEFAULT,$options), $name, $date, $email));
}

function getUserInformation($username){
    $db=Database::instance()->db();
    $stmt=$db->prepare('SELECT * FROM user where username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}
?>