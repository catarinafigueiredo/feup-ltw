<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');


$password= $_POST['password'];
$email= $_POST['email'];
$username=  $_SESSION['username'];

if(validUserPassword($username,$password)){
    $db=Database::instance()->db();
    $stmt=$db->prepare('SELECT * FROM user where username = ?');
}
else{
    echo $username;
    $_SESSION['messages'][]=array('type'=>'error', 'content'=>'Login failed!');
    header('Location:../pages/login.php');
}

echo $password;
echo $email;

?>