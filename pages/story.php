<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');
include_once('../templates/tpl_story.php');
include_once('../database/db_story.php');
include_once('../database/db_vote.php');

$storyid= $_GET['story_id'];

// Verify if user is logged in
if (!isset($_SESSION['username']))
    draw_header(null);
else
    draw_header($_SESSION['username']);

$story = getStory($storyid);


draw_one_story_only(reset($story));
//create_comment();

$comments = getAllComments($storyid);    


draw_comments($comments);

//draw_stories($story);

draw_footer();
?>
