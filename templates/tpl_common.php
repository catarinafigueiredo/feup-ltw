<?php function draw_header($username){
    ?>
    <!DOCTYPE html>
    <html>
        <head>
           <title>Dabliu</title>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <link rel="stylesheet" href="../css/style.css">
           <script src="../js/main.js" defer></script>
        </head>
        <body>
            <header>
                <h1><a href="inicialpage.php"><i class="fa fa-wikipedia-w"></i> Dabliu</a></h1>
                <?php if($username != null){?>
                    <nav>
                        <nav>
                        <div class = "lista_css_container">
                            <div class = "lista_css">
                                <div class = "buttons_test"><a href="inicialpage.php" style="text-decoration:none">Página inicial</a></div>
                                <div class = "buttons_test"><a href="signup.php" style="text-decoration:none">Sign Up</a></div>
                                <div class = "buttons_test"><a href="login.php" style="text-decoration:none">Log in</a></div>   
                                <div class="dropdown">
                                    <button class="dropbtn">Dropdown</button>
                                     <div class="dropdown-content">
                                        <a value ="Link 1" href ="personalspace.php">PersonalSpace</a>
                                        <a href ="signup.php">Settings</a>
                                        <a href ="../actions/action_logout.php">Log Out</a>
                                    </div>
                                </div>    
                            </div>                  
                        </div>
                    </nav>
               <?php } ?>
               <?php if($username == null){?>
                <nav>
                    <div class = "lista_css_container">
                        <div class = "lista_css">
                            <div class = "buttons_test"><a href="inicialpage.php">Página inicial</a></div>
                            <div class = "buttons_test"><a href="../actions/action_login.php">Log In</a></div>
                        </div>
                    </div>
                </nav>
           <?php } ?>
                
            </header>

<?php } ?>
<?php function create_story(){   
    ?>
    <header>
        <h5> <a href="createstory.php">Create Story</a> </h5>
    </header>
   

<?php } ?>
<?php function draw_footer(){   
    ?>
    <header>
        <h5>2018 Dabliu, Inc. </h5>
    </header>
    </body>
</html>
<?php } ?>