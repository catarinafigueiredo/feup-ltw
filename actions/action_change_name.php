<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');

$password= $_POST['password'];
$nome= $_POST['nome'];
$username=  $_SESSION['username'];

if(validUserPassword($username,$password)){
    $db=Database::instance()->db();
    $stmt=$db->prepare('UPDATE user SET nome = ? WHERE username = ?');
    $stmt->execute(array($nome, $username));
}
else{
    echo $username;
    $_SESSION['messages'][]=array('type'=>'error', 'content'=>'Unknow password!');
}
header('Location: ../pages/personalspace.php');

?>