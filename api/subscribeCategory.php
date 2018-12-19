<?php
include_once('../includes/session.php');
include_once('../database/db_order.php');
include_once('../templates/tpl_story.php');
include_once('../templates/tpl_category.php');
include_once('../database/db_category.php');


$order=$_POST['order'];

$categories = getAllCategory();



     $i=0;


switch ($order) {
    case 'Recent':
    
        //draw_stories(getRecentPublications());
        break;
    case 'Oldest':

        //draw_stories(getOldestsPublications());
        break;
    case 'Popular':

        //draw_stories(getPopularPublications());
        break;
    case 'Subscribed':

        //draw_stories(getSubscribedPublications($username));
        break;
    default:
        
        foreach($categories as $category){
            if($order== $category['CategoryName'] ){
            subscribeCategory($_SESSION['username'],$category['CategoryName']);
            
            }
        }
        draw_unsubscribe_category();
        
        break;
}


?>