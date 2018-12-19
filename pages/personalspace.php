<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_user.php');
include_once('../templates/tpl_story.php');
include_once('../database/db_users.php');
include_once('../database/db_vote.php');
include_once('../database/db_order.php');

// Verify if user is logged in
if (!isset($_SESSION['username']))
    draw_header(null);
else{
    draw_header($_SESSION['username']);
    $userInfo= getUserInformation($_SESSION['username']);
    draw_user($userInfo);
    $user= reset($userInfo);
    $storys= getUserStorys($user['username']);
    $comments_user= getUserComments($user['username']);
    draw_comment_story_buttons($user['username']);
    //draw_stories($storys);
    
    //draw_comments($comments_user);
  
    //print_r($userInfo);
}
draw_footer();
?>
