<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');
include_once('../templates/tpl_story.php');
include_once('../database/db_story.php');
include_once('../database/db_vote.php');
include_once('../database/db_order.php');

$storyid= $_POST['story_id'];
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
deleteStory($storyid);

switch ($type) {
    case 'Recent':
    
        draw_stories(getRecentPublications());
        break;
    case 'Oldest':

        draw_stories(getOldestsPublications());
        break;
    case 'Popular':

        draw_stories(getPopularPublications());
        break;
    case 'Subscribed':

        draw_stories(getSubscribedPublications($username));
        break;
    default:
         draw_stories(getRecentPublications());
        break;
}


   


//votesUp<?=$story['postID']

//header('Location: ../pages/inicialpage.php#votesUp?story_id=$storyid');

//header("Location: ../pages/inicialpage.php");



?>
