<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');
include_once('../templates/tpl_story.php');
include_once('../database/db_story.php');
include_once('../database/db_vote.php');

$storyid= $_POST['story_id'];
$type= $_POST['type'];
$comment_id= $_POST['comment_id'];


$story = reset(getStory($storyid));
// Verify if user is logged in
/*if (!isset($_SESSION['username']))
    draw_header(null);
else
    draw_header($_SESSION['username']);*/

//$username=$story['username'];
$username =$_SESSION['username'];


if($type=="up"){
    if(!checkIfvoteComment($username,$storyid,$comment_id)){
        
        createVoteUpComment($storyid,$username,$comment_id);

    }else{

        if(checkIfvoteUpComment($username,$storyid,$comment_id))
             deleteVoteUpComment($storyid,$comment_id);

        else if(checkIfvoteDownComment($username,$storyid,$comment_id)){
            deleteVoteDownComment($storyid,$comment_id);
            createVoteUpComment($storyid,$username,$comment_id);
           

        }
    }

}else if($type=="down"){
    if(!checkIfvoteComment($username,$storyid,$comment_id)){
        createVoteDownComment($storyid,$username,$comment_id);

    }else{
        if(checkIfvoteUpComment($username,$storyid,$comment_id)){
            deleteVoteUpComment($storyid,$comment_id);
            
            createVoteDownComment($storyid,$username,$comment_id);
            //retira up poem down
        }
       else if(checkIfvoteDownComment($username,$storyid,$comment_id))
            deleteVoteDownComment($storyid,$comment_id);
            //retira down 

        
    }
   

}
$CommentsUp=getUpVotesComment($comment_id);
$CommentsDown=getDownVotesComment($comment_id);
draw_votes_comment($username,$storyid,$comment_id,$CommentsUp['up'],$CommentsDown['down']);
//votesUp<?=$story['postID']

//header('Location: ../pages/inicialpage.php#votesUp?story_id=$storyid');
//header("Location: ../pages/story.php?story_id=$storyid");



?>
