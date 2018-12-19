<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');
include_once('../database/db_category.php');

$username =$_SESSION['username'];

$category = htmlentities($_POST['category']);

if($category != NULL){
    if(!categoryExists($category))
        insertCategory($category);
}

categoryExists();

header("Location: ../pages/inicialpage.php?");
?>
