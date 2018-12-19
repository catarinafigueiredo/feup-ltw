
<?php function draw_users_settings($users){
    ?>
<section id="users">

 <?php
  foreach ($users as $user) {
    draw_user_settings($user);
} 
?>

</section>

<?php } ?>

<?php function draw_user_settings($user){
    ?>

        <div class="settings_header">
            <header>    
            <h2>Change Name and image</h2>
            </header>
        </div>

    <body>

    <div class = "change_pwd_fieldcontainer">
    <form method="post" action="../actions/action_change_name.php">
        <div class = "change_pwd_field">
                
                <div>
                    <span class="span-boxes-settings">Confirm Old Password</span>
                    <span style="color: #808080; margin: 0px">(required)</span>
                </div>
                <input type="password" name="password" required>
                <div>
                    <span class="span-boxes-settings">New Password</span>
                </div>            
                <input type="password" name="newpassword" required>

                <div>
                <span class="span-boxes-settings"> Confirm New Password</span> 
                </div>
                    <input type="text" name="nome" value = <?=$user['nome']?>>
                    <input style="padding: 1em;" class = "submit_b" type="submit" value="Save" >
        </div>
    </form>

        <div class="image_selector">
            <div class="user_image_ask">        
                <form action="../actions/action_upload_image.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
                </form>  
            </div>
            <div class="user_current_image">
                <?=draw_user_image_settings($_SESSION['username'],"avatarSmall")?>
            </div> 
        </div>
    </div>    
    </body>

    <div class = "break_line"></div>


    <header>
        <div class="settings_header">
            <h2>Change Password</h2>
        </div>
    </header>
        <body>
        <form method="post" action="../actions/action_change_pwd.php">
        <div style ="justify-content: center;" class = "change_pwd_fieldcontainer">
            <div class = "change_pwd_field">
                <div>
                    <span class="span-boxes-settings">Confirm Old Password</span>
                    <span style="color: #808080; margin: 0px">(required)</span>
                </div>
                    <input type="password" name="password" required>
                <div>
                    <span class="span-boxes-settings">Name</span>
                </div>
                <input type="password" name="newpasswordconf" required>
                <input style="padding: 1em;" class = "submit_b" type="submit" value="Save" >
            </div>
        </div>  
        </form>      
    </body>

    <div class = "break_line"></div>

    <div class="settings_header">
        <header>
            <h2>Change Email</h2>
        </header>
    </div>
    <body>
        
    <form method="post" action="../actions/action_change_email.php">
        <div style ="justify-content: center;"  class = "change_pwd_fieldcontainer">
            <div class = "change_pwd_field">
                        <div>
                            <span class="span-boxes-settings">Confirm Old Password</span>
                            <span style="color: #808080; margin: 0px">(required)</span>
                        </div>
                        <input type="password" name="password" required>
                        <div>
                            <span class="span-boxes-settings">Email</span>
                        </div>
                        <input type="text" name="email" value = <?=$user['email']?>>
                        <input style="padding: 1em;" class = "submit_b" type="submit" value="Save" >
            </div>
        </div>    
    </form>        
    </body>

    <div class = "break_line"></div>
     
<?php }?> 