
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
        <?php draw_user_image("avatarBig"); ?>
   
    <?php if($user['nome']!= null)
        ?>
        <h2><?=$user['nome']?></h2>

    <h4><?=$user['username']?></h4>

    <div class="edit profile">
        <p><a href= "../pages/usersettings.php">Edit profile</a></p>
    </div>


    


    <form action="../actions/action_upload_image.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>
    </body>
</section>
 
    

<?php }?> 










<?php function draw_user_image($type){?>
    <?php if(file_exists("../assets/".sha1($_SESSION['username']).".jpg")){
        ?>
        <img src="../assets/<?=sha1($_SESSION['username'])?>.jpg" alt="Avatar" class=<?=$type?>> 
    <?php }else if(file_exists("../assets/".sha1($_SESSION['username']).".png")){?>
        <img src="../assets/<?=sha1($_SESSION['username'])?>.png"alt="Avatar" class=<?=$type?>> 

    <?php }else if(file_exists("../assets/".sha1($_SESSION['username']).".jpeg")){?>
        <img src="../assets/<?=sha1($_SESSION['username'])?>.jpeg"alt="Avatar" class=<?=$type?>> 

    <?php }else {?>
        <img src="../assets/user.jpg"alt="Avatar" class=<?=$type?>> 
    <?php }?>     
<?php }?>