<?php function draw_header($username){
   include_once('../templates/tpl_user.php');
    ?>
    <!DOCTYPE html>
    <html>
        <head>
           <title>Dabliu</title>
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <link rel="stylesheet" href="../css/style.css">
           <script src="../js/main.js" defer></script>
        </head>
        <body>
           
            <header class="headerFixo" id="headerFixo">
                 <h1><a href="inicialpage.php"><i class="fa fa-wikipedia-w"></i> Dabliu</a></h1>
                <?php if($username != null){?>
                    <nav>
                    
                        <div class = "lista_css_container">
                                <div class = "lista_css">
                            
                                <div class = "buttons_test">    
                                    <form action="search.php" method="get">  
                                        <input type="text" name="key_word" class ="search_bar" placeholder="Search.."> 
                                    </form>  
                                </div>
                                    <div class = "buttons_test"><a href="inicialpage.php" style="text-decoration:none">Página inicial</a></div> 
                                        <div class="dropdown">
                                            <div class = "buttons_test_drop" style="margin-top:4px;">
                                                <button class="dropbtn"><?=$_SESSION['username']?><?=draw_user_image($_SESSION['username'],"avatarSmall")?> <i class="fa fa-angle-down"></i> </button>
                                                <div class="dropdown-content" style="left:87.5%;">
                                                    <a value ="Link 1" href ="../pages/personalspace.php">PersonalSpace</a>
                                                    <a href ="../pages/usersettings.php">Settings</a>
                                                    <a href ="../pages/createstory.php">Create</a>
                                                    <a href ="../actions/action_logout.php">Log Out</a>
                                                </div>
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
                        <div class = "buttons_test">    
                            <form action="search.php" method="get">  
                                <input type="text" name="key_word" class ="search_bar" placeholder="Search.."> 
                            </form>  
                        </div> 
                            <div class = "buttons_test"><a href="inicialpage.php">Página inicial</a></div>
                            <div class = "buttons_test"><a href="signup.php" style="text-decoration:none">Sign Up</a></div>
                            <div class = "buttons_test"><a href="login.php">Log In</a></div>
                            <div class = "buttons_test_drop">
                                <div class="dropdown">
                                        <button class="dropbtn" ><i class="fa fa-user-circle"></i> <i class="fa fa-angle-down"></i> </button>
                                            <div class="dropdown-content"  style="left:91%;">
                                            <a href ="../pages/signup.php">Sign up </a>
                                            <a href ="../pages/login.php">Login</a>
                                            </div>
                                </div>  
                            </div>                                
                        </div>
                    </div>
                </nav>
           <?php } ?>
                
            </header>

<?php } ?>

<?php function create_story(){   
    ?>
    <header>
        <div class="create_story_button">
            <h5> <a style = "font-family:'Quicksand', sans-serif;" href="createstory.php">Create Story</a> </h5>
        </div>
    </header>
   

<?php } ?>

<?php function create_category(){   
    ?>
    <header>
            <button onclick="addNewCategory()"> 
            <div class="create_category_button">Create New Category</div></button>  
                <div class="create_category_button_ins" id="sectionI"style="display: none;">
                    <form action="../actions/action_add_category.php?" method="post" id="new_category"> 
                        <input style="padding:1em;" type="text" name="category" form="new_category" placeholder="New Category...">
                    </form>
                </div>
    </header>
   

<?php } ?>

<script>
 function addNewCategory(){
     var x=document.getElementById("sectionI");
     if(x.style.display==="none"){
        x.style.display="block";
     }else{
         x.style.display="none";
     }
 }
</script>

<?php function draw_message(){   
    ?>
    <header>     
      <?php if (isset($_SESSION['messages'])) {?>
        <div class="messages">
          <?php foreach($_SESSION['messages'] as $message) { ?>
            <div class="<?=$message['type']?>">
                <?=$message['content']?>
            </div>
          <?php } ?>
        </div>
        <?php unset($_SESSION['messages']); } ?>

    </header>
<?php } ?>


<?php function draw_footer(){   
    ?>
        <div class="background_color">
            <header>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>            
                    <br><br><br>

                <h5>2018 Dabliu, Inc. </h5>
            </header>
        </div>
    </body>
</html>
<?php } ?>