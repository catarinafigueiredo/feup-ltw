<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_personalspace.php');
include_once('../database/db_users.php');

// Verify if user is logged in
if (!isset($_SESSION['username']))
    draw_header(null);
else{
    draw_header($_SESSION['username']);
    $userInfo= getUserInformation($_SESSION['username']);
    //echo $userInfo;
    draw_users($userInfo);
}
draw_footer();
?>
