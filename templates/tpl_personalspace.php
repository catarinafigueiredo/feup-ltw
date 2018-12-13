
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

<?php function draw_user($user){
    ?>
    <header>
        <h2>Change Password</h2>
    </header>
    <body>
    <div class = "change_pwd_fieldcontainer">
        <div class = "change_pwd_field">
        
        <form method="post" action="../actions/action_change_info.php">
            <div>
                    <span>Confirm Old Password</span>
                    <span style="color: #808080">(required)</span>
                    <input type="password" name="oldpassword" required>
            </div>

            <div>
                    <span>New Password</span>
                    <input type="password" name="password" required>
            </div>

            <div>
                    <span>Confirm New Password</span>
                    <input type="password" name="password" required>
            </div>

            <div>
                <input class = "submit_b" type="submit" value="Save" >
            </div>
        </form>
        </div>
    </div>        
    </body>

    <div class = "break_line"></div>

    <header>
        <h2>Change Email</h2>
    </header>
    <body>
    <div class = "change_pwd_fieldcontainer">
        <div class = "change_pwd_field">
            <form method="post" action="../actions/action_change_info.php">
                <div>
                    <span>Confirm Old Password</span>
                    <span style="color: #808080">(required)</span>
                    <input type="password" name="password" required>
                </div>

                <div>
                    <span>Email</span>
                    <input type="text" name="email" value = <?=$user['email']?>>
                </div>

                <div>
                    <input class = "submit_b" type="submit" value="Save" >
                </div>
            </form>
        </div>
    </div>        
    </body>
 
<?php }?> 