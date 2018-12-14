<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');


$password= htmlentities($_POST['password']);
$newpassword= htmlentities$_POST['newpassword']);
$newpasswordconf= htmlentities$_POST['newpasswordconf']);
$username=  $_SESSION['username'];

if(validUserPassword($username,$password)){
    if($newpassword == $newpasswordconf){
        $db=Database::instance()->db();
        $options= ['cost'=>12];
        $stmt=$db->prepare('UPDATE user SET password = ? WHERE username = ?');
        $stmt->execute(array(password_hash($newpassword,PASSWORD_DEFAULT,$options), $username));
    }
    else{
        $_SESSION['messages'][]=array('type'=>'error', 'content'=>'Password do not match!');
    }
}
else{
    echo $username;
    $_SESSION['messages'][]=array('type'=>'error', 'content'=>'Unknow password!');
}
header('Location: ../pages/personalspace.php');

?>