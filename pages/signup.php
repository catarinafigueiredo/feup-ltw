<?php 
//include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_auth.php');

session_start();
draw_header(null);
draw_message();
draw_signup();
draw_footer();
?>
