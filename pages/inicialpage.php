<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');
include_once('../templates/tpl_story.php');
include_once('../templates/tpl_category.php');
include_once('../database/db_story.php');
include_once('../database/db_order.php');
include_once('../database/db_category.php');
include_once('../database/db_vote.php');

// Verify if user is logged in
if (!isset($_SESSION['username']))
    draw_header(null);
else
    draw_header($_SESSION['username']);

    if(!isset($_SESSION['username'])){
        header('Location:../pages/login.php');
    }
   
$categories = getAllCategory();
$stories= getAllStories();

create_story();
create_category();
draw_subscribe_category();
draw_order_buttons();


draw_footer();

?> 
