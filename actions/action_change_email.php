<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');


$password= htmlentities($_POST['password']);
$email = htmlentities($_POST['email']);
$username =  $_SESSION['username'];

if(validUserPassword($username,$password)){
    $db=Database::instance()->db();
    $stmt=$db->prepare('UPDATE user SET email = ? WHERE username = ?');
    $stmt->execute(array($email, $username));
}
else{
    echo $username;
    $_SESSION['messages'][]=array('type'=>'error', 'content'=>'Unknown password!');
}
header('Location: ../pages/usersettings.php');

?>