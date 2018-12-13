<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');
include_once('../database/db_story.php');
include_once('../database/db_comment.php');

$username =$_SESSION['username'];


$storyid= $_GET['story_id'];

$content= $_POST['comment'];



insertComment($username,$content,$storyid);


  /*if(validUserPassword($username,$password)){
    echo $username;
  $_SESSION['username']= $username;
    $_SESSION['messages'][]= array('type'=>'success','content'=>'Logged in sucessfully! ');
    header('Location:../pages/inicialpage.php');
 }else{
    echo $username;
    $_SESSION['messages'][]=array('type'=>'error', 'content'=>'Login failed!');
    header('Location:../pages/login.php');
 }*/
header("Location: ../pages/story.php?story_id=$storyid");
?>



