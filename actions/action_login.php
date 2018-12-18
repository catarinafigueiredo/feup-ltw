<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');

$username= $_POST['username'];
$password= $_POST['password'];

  if(validUserPassword($username,$password)){
    echo $username;
    $_SESSION['username']= $username;
    header('Location:../pages/inicialpage.php');
 }else{
  $_SESSION['msg']="Hello";
  $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Incorrect username or password!');
  header('Location:../pages/login.php');
  exit();
}

?>