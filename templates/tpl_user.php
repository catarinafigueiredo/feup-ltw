
<?php function draw_users($users){
    
    ?>
<section id="users">

 <?php
  foreach ($users as $user) {
    draw_user($user);
} 
?>

</section>

<?php } ?>

<?php function draw_user($userArray){
    
    $user=reset($userArray);
    ?>
    <header>
       
        
    </header>
    <section class="userInfo">
    <body>
        <?php draw_user_image($user['username'],"avatarBig"); ?>
   
    <?php if($user['nome']!= null)
        ?>
        <h2>nome: <?=$user['nome']?></h2>

    <h4>Username: <?=$user['username']?></h4>
    <h4>Email: <?=$user['email']?></h4>
    <h4>Born in: <?=$user['DataNascimento']?></h4>

    <?php if($user['username']==$_SESSION['username']){
        ?>

    <div class="edit profile">
        <p><a href= "../pages/usersettings.php">Edit profile</a></p>
    </div>
    
   <?php }?>


    


    
    </body>
</section>
 
    

<?php }?> 










<?php function draw_user_image( $username,$type){?>
    <?php if(file_exists("../assets/".sha1($username).".jpg")){
        ?>
        <img src="../assets/<?=sha1($username)?>.jpg" alt="Avatar" class=<?=$type?>> 
    <?php }else if(file_exists("../assets/".sha1($username).".png")){?>
        <img src="../assets/<?=sha1($username)?>.png"alt="Avatar" class=<?=$type?>> 

    <?php }else if(file_exists("../assets/".sha1($username).".jpeg")){?>
        <img src="../assets/<?=sha1($username)?>.jpeg"alt="Avatar" class=<?=$type?>> 

    <?php }else {?>
        <img src="../assets/user.jpg"alt="Avatar" class=<?=$type?>> 
    <?php }?>     
<?php }?>
