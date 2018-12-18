<?php 
include_once('../includes/session.php');
include_once('../database/db_users.php');


$name= $_POST['name'];
$date= $_POST['date'];
$username= $_POST['username'];
$password= $_POST['password'];
$email= $_POST['email'];
$passwordAgain= $_POST['passwordagain'];


// Don't allow certain characters
if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/signup.php'));
  }
  try {
      if(!UserExist($username)){
        if($password == $passwordAgain){
          CreateUser($username, $password, $name, $date, $email);
          $_SESSION['username'] = $username;
          $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
          header('Location: ../pages/inicialpage.php');
        }
        else{
            $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Passwords don´t match!');
            header('Location: ../pages/signup.php');
        }
      }else{
            $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username already exists!');
            header('Location: ../pages/signup.php');
          }
   
  } catch (PDOException $e) { // não esta a funcionar
    die($e->getMessage());
  
  }
?>