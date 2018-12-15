<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');
include_once('../database/db_category.php');

$username =$_SESSION['username'];

$category = htmlentities($_POST['category']);

insertCategory($category);

header("Location: ../pages/inicialpage.php?");
?>
