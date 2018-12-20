<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');
include_once('../templates/tpl_story.php');
include_once('../database/db_story.php');
include_once('../database/db_vote.php');
include_once('../database/db_comment.php');

$storyid= $_POST['story_id'];
$commentid= $_POST['comment_id'];
$type= $_POST['type'];


$story = reset(getStory($storyid));
// Verify if user is logged in
/*if (!isset($_SESSION['username']))
    draw_header(null);
else
    draw_header($_SESSION['username']);*/

//$username=$story['username'];
$username =$_SESSION['username'];

//echo $username;
//echo $storyid;
deleteComment($storyid,$commentid);

$comments = getAllComments($storyid);   
if($type=="StoryPage")
 draw_comments($comments);
 else{
     draw_comments($comments);
 }
   


//votesUp<?=$story['postID']

//header('Location: ../pages/inicialpage.php#votesUp?story_id=$storyid');

//header("Location: ../pages/inicialpage.php");
//header("Location: ../pages/story.php?story_id=$storyid");


?>
