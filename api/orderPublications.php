<?php
include_once('../includes/session.php');
include_once('../database/db_order.php');
include_once('../templates/tpl_story.php');
include_once('../templates/tpl_auth.php');
include_once('../database/db_category.php');

if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}
    $order=$_POST['order'];

    $categories = getAllCategory();

        $i=0;


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
                if(isset($_SESSION['username'])){
                    draw_stories(getSubscribedPublications($username));
                }
                else{
                    draw_login();
                }

        break;
    case 'Subscribed':
        draw_stories(getSubscribedPublications($username));
        break;
    default:
        
        foreach($categories as $category){
            if($order== $category['CategoryName'] ){
            $i=1;
        
            $stories= getAllStoriesCat($category['CategoryName']);
            draw_stories($stories);
            }
        }
            if($i==0){
            draw_stories(getRecentPublications());}
            break;
}


?>