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
                        <div class = "search_div">    
                            <form action="search.php" method="get">  
                                <input type="text" name="key_word" class ="search_bar" placeholder="Search.."> 
                                    <button type="submit">  
                                        <span>Search</span>
                                    </button>
                            </form>  
                            <div class = "lista_css">
                                <div class = "buttons_test"><a href="inicialpage.php" style="text-decoration:none">Página inicial</a></div> 
                                <div class="dropdown">
                                    <button class="dropbtn" ><?=$_SESSION['username']?><?=draw_user_image($_SESSION['username'],"avatarSmall")?> <i class="fa fa-angle-down"></i> </button>
                                     <div class="dropdown-content">
                                        <a value ="Link 1" href ="../pages/personalspace.php">PersonalSpace</a>
                                        <a href ="../pages/usersettings.php">Settings</a>
                                        <a href ="../pages/createstory.php">Create</a>
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
                        <div class = "search_div">    
                            <form action="search.php" method="get">  
                                <input type="text" name="key_word" class ="search_bar" placeholder="Search.."> 
                                    <button type="submit">  
                                        <span>Search</span>
                                    </button>
                            </form>  
                        </div> 
                        <div class = "lista_css">    
                            <div class = "buttons_test"><a href="inicialpage.php">Página inicial</a></div>
                            <div class = "buttons_test"><a href="signup.php" style="text-decoration:none">Sign Up</a></div>
                            <div class = "buttons_test"><a href="../actions/action_login.php">Log In</a></div>
                            <div class="dropdown">
                                    <button class="dropbtn" ><i class="fa fa-user-circle"></i> <i class="fa fa-angle-down"></i> </button>
                                     <div class="dropdown-content">
                        
                                        <a href ="../pages/signup.php">Sign up </a>
                                        <a href ="../pages/login.php">Login</a>
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
            <h5> <a href="createstory.php">Create Story</a> </h5>
        </div>
    </header>
   

<?php } ?>

<?php function create_category(){   
    ?>
    <header>
        <div class="create_category_button">
            <button onclick="addNewCategory()"> 
            <span>Create New Category</span></button>  
            <div id="sectionI"style="display: none;">
            <div>
                <form action="../actions/action_add_category.php?" method="post" id="new_category">
                    <textarea name="category" form="new_category" placeholder="Enter text here...">
                    </textarea>
                    <button type="submit">
                        Create</i>
                    </button> 
                </form>
            </div>
        </div>
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



<?php function draw_footer(){   
    ?>
    <header>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <h5>2018 Dabliu, Inc. </h5>
    </header>
    </body>
</html>
<?php } ?>