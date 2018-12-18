<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_user_settings.php');
include_once('../database/db_users.php');

// Verify if user is logged in
if (!isset($_SESSION['username']))
    draw_header(null);
else{
    draw_header($_SESSION['username']);
    draw_message();
    $userInfo= getUserInformation($_SESSION['username']);
    //echo $userInfo;
    draw_users_settings($userInfo);
}
draw_footer();
?>
