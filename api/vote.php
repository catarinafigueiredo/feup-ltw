<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');
include_once('../templates/tpl_story.php');
include_once('../database/db_story.php');
include_once('../database/db_vote.php');

$storyid= $_GET['story_id'];
$type= $_GET['type'];

$story = reset(getStory($storyid));
// Verify if user is logged in
/*if (!isset($_SESSION['username']))
    draw_header(null);
else
    draw_header($_SESSION['username']);*/

//$username=$story['username'];
$username =$_SESSION['username'];


if($type=="up"){
    

    if(!checkIfvote($username,$storyid,NULL)){
        
        createVoteUp($storyid,$username);

    }else{

        if(checkIfvoteUp($username,$storyid)){
             echo $username;
             deleteVoteUp($storyid);

        }else if(checkIfvoteDown($username,$storyid)){
            deleteVoteDown($storyid);
            createVoteUp($storyid,$username);
           

        }
    }

}else if($type=="down"){
    if(!checkIfvote($username,$storyid,NULL)){
        createVoteDown($storyid,$username);

    }else{
       
        if(checkIfvoteUp($username,$storyid)){
            deleteVoteUp($storyid);
            echo $type;
            createVoteDown($storyid,$username);
            //retira up poem down
        }
       else if(checkIfvoteDown($username,$storyid)){
            echo $username;
            deleteVoteDown($storyid);
            //retira down 
        }
        
    }
   

}
//votesUp<?=$story['postID']

//header('Location: ../pages/inicialpage.php#votesUp?story_id=$storyid');
//header("Location: ../pages/story.php?story_id=$storyid");



?>
