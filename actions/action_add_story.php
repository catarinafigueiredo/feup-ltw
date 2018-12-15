<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');
include_once('../database/db_story.php');

$username=  $_SESSION['username'];
$title = htmlentities($_POST['title']);
$content= htmlentities($_POST['comment']);

$category= htmlentities($_POST['category']);
$date = date("Y-m-d");

echo $date;
$Story=insertStory($username,$title,$content,$category,$date);

$story=reset($Story);
$storyid=$story['postID'];
echo $storyid;
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
// header("Location: ../pages/story.php?story_id=$storyid");
header("Location: ../pages/inicialpage.php");
?>