<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');
include_once('../templates/tpl_story.php');
include_once('../templates/tpl_category.php');
include_once('../database/db_story.php');
include_once('../database/db_users.php');
include_once('../database/db_category.php');

// Verify if user is logged in
if (!isset($_SESSION['username']))
    draw_header(null);
else
    draw_header($_SESSION['username']); 
$information= "%{$_GET['key_word']}%";
$user = get_users_by_name($information);
if(sizeof($user) == 1)
    draw_user($user);

$stories = get_stories_by_name($information);
if(sizeof($stories) > 1)
    draw_stories($stories);




//draw_stories($stories);



draw_footer();

?> 
