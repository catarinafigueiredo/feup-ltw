
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

    <?php 
    if (isset($_SESSION['username']))
        if($user['username']==$_SESSION['username']){
        ?>

    <div class="edit profile">
        <p><a href= "../pages/usersettings.php">Edit profile</a></p>
    </div>
    
   <?php }?>


    


    
    </body>
</section>
 
    

<?php }?> 

<?php function draw_comment_story_buttons($username){
    ?>
   <div class="article-container-story">
        <a id="issoo">  
        <input  type="hidden" name="username" value="<?=$username?>">
        </a>
        
        <div class="chooseCorS" id="chooseCorSDiv">
            <button class="chooseCorS-button active"><p>Storys</p></button>
            <button class="chooseCorS-button"><p>Comments</p></button>
        </div>
        <div class="comments-storys">
            <?php                
                $publications = getRecentPublicationsUser($username);
                draw_stories($publications);
                
            ?>
        </div>
    </div>

<?php } ?>


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

<?php function draw_user_image_settings($username,$type){?>
    <?php if(file_exists("../assets/".sha1($username).".jpg")){
        ?>
        <img style="width:50%; height:50%;" src="../assets/<?=sha1($username)?>.jpg" alt="Avatar" class=<?=$type?>> 
    <?php }else if(file_exists("../assets/".sha1($username).".png")){?>
        <img style="width:50%; height:50%;" src="../assets/<?=sha1($username)?>.png"alt="Avatar" class=<?=$type?>> 

    <?php }else if(file_exists("../assets/".sha1($username).".jpeg")){?>
        <img style="width:50%; height:50%;" src="../assets/<?=sha1($username)?>.jpeg"alt="Avatar" class=<?=$type?>> 

    <?php }else {?>
        <img style="width:50%; height:50%;" src="../assets/user.jpg"alt="Avatar" class=<?=$type?>> 
    <?php }?>     
<?php }?>
