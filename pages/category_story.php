<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');
include_once('../templates/tpl_category.php');
include_once('../templates/tpl_story.php');
include_once('../database/db_story.php');
include_once('../database/db_category.php');

$category_id= $_GET['category_id'];

// Verify if user is logged in
if (!isset($_SESSION['username']))
    draw_header(null);
else
    draw_header($_SESSION['username']);


$stories= getAllStoriesCat($category_id);

create_story();
    
draw_stories($stories);
    
$categories = getAllCategory();
    
draw_categories($categories);
    
draw_footer();
?>