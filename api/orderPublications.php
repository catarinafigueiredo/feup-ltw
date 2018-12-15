<?php
include_once('../includes/session.php');
include_once('../database/db_order.php');
include_once('../templates/tpl_story.php');

$username=$_SESSION['username'];
$order=$_POST['order'];

switch ($order) {
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


?>