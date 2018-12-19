<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');
include_once('../templates/tpl_story.php');
include_once('../templates/tpl_category.php');
include_once('../database/db_story.php');
include_once('../database/db_order.php');
include_once('../database/db_category.php');

// Verify if user is logged in
if (!isset($_SESSION['username']))
    draw_header(null);
else
    draw_header($_SESSION['username']);


$categories = getAllCategory();
$stories= getAllStories();

create_story();
create_category();
draw_subscribe_category();
draw_unsubscribe_category();
//draw_categories($categories);
draw_order_buttons();






//draw_stories($stories);



draw_footer();

?> 
