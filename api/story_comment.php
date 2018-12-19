<?php
include_once('../includes/session.php');
include_once('../database/db_order.php');
include_once('../database/db_users.php');
include_once('../templates/tpl_story.php');

$username=$_POST['username'];

//$username=$_SESSION['username'];
$type=$_POST['type'];

switch ($type) {
    case 'Story':
        draw_stories(getRecentPublicationsUser($username));
        break;
    case 'Comments':
        draw_comments( getUserComments($username));
        break;        
    default:
         draw_stories(getRecentPublicationsUser($username));
        break;
}


?>