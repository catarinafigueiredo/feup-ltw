
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
    <form method="post" action="../actions/action_change_pwd.php">
    <div class = "change_pwd_fieldcontainer">
        <div class = "change_pwd_field">
                    <div>
                        <span>Confirm Old Password</span>
                        <span style="color: #808080; margin: 0px">(required)</span>
                    </div>
                    <input type="password" name="password" required>
                    <div>New Password</div>
                <input type="password" name="newpassword" required>
            <div>Confirm New Password</div>
            <input type="password" name="newpasswordconf" required>
            <input class = "submit_b" type="submit" value="Save" >
        </div>
    </div>  
    </form>      
    </body>

    <div class = "break_line"></div>

    <header>
        <h2>Change Email</h2>
    </header>
    <body>
        
    <form method="post" action="../actions/action_change_email.php">
        <div class = "change_pwd_fieldcontainer">
            <div class = "change_pwd_field">
                        <div>
                            <span>Confirm Old Password</span>
                            <span style="color: #808080; margin: 0px">(required)</span>
                        </div>
                        <input type="password" name="password" required>
                        <div>Email</div>
                        <input type="text" name="email" value = <?=$user['email']?>>
                        <input class = "submit_b" type="submit" value="Save" >
            </div>
        </div>    
    </form>        
    </body>

    <div class = "break_line"></div>
    
    <header>
        <h2>Change Name</h2>
    </header>
    <body>
        
    <form method="post" action="../actions/action_change_name.php">
        <div class = "change_pwd_fieldcontainer">
            <div class = "change_pwd_field">
                        <div>
                            <span>Confirm Old Password</span>
                            <span style="color: #808080; margin: 0px">(required)</span>
                        </div>
                        <input type="password" name="password" required>
                        <div>Name</div>
                        <input type="text" name="nome" value = <?=$user['nome']?>>
                        <input class = "submit_b" type="submit" value="Save" >
            </div>
        </div>    
    </form>        
    </body>


 
<?php }?> 