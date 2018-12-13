<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');

$username= $_POST['username'];
$password= $_POST['password'];



  if(validUserPassword($username,$password)){
    echo $username;
  $_SESSION['username']= $username;
    $_SESSION['messages'][]= array('type'=>'success','content'=>'Logged in sucessfully! ');
    header('Location:../pages/inicialpage.php');
 }else{
    echo $username;
    $_SESSION['messages'][]=array('type'=>'error', 'content'=>'Login failed!');
    header('Location:../pages/login.php');
}

?>