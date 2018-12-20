
<?php function create_new_story() {
    include_once('../database/db_story.php');
    ?>
    <section id="list">
    <article class="new-story">
    <form action="../actions/action_add_story.php" method="post" id="bla">
        <input type="text" name="title" placeholder="title">
    </form>
     <textarea name="comment" form="bla" cols="80" rows="15" placeholder="Enter text here...">
    </textarea>
    <select name="category" form="bla" placeholder="categoria">

<?php 
    $Categorias = getAllCategories();
    foreach($Categorias as $Categoria){
        putCategories($Categoria);
        }
    
        ?>
</select>
    <input type="submit" value="Post"  form="bla">
        </article>
        
    </section>


<?php } ?>


<?php function  putCategories($Categoria){
    ?>
       <option value="<?=$Categoria['CategoryName']?>"><?=$Categoria['CategoryName']?> </option>
<?php } ?>


<?php function draw_order_buttons(){
    ?>
   <div class="article-container">
        <div class="order" id="orderDiv">
            <button class="order-button active"><p>Recent</p></button>
            <button class="order-button"><p>Oldest</p></button>
            <button class="order-button"><p>Popular</p></button>
            <button class="order-button"><p>Subscribed</p></button>
            <?php 
             $categories = getAllCategory();
             foreach ($categories as $category) {?>
                 <button class="order-button"><p><?=array_values($category)[0]?></p></button>
             <?php } ?>
            
        </div>
        <div class="ordered-publications">
            <?php                
                $publications = getRecentPublications();
                draw_stories($publications);
                
            ?>
        </div>
    </div>

<?php } ?>




<?php function draw_stories($stories){
    ?>

<div class = "stories_css">
 <?php
  foreach ($stories as $story) {
   draw_story($story);
} 
?>
</div>
<?php } ?>

<?php function draw_story($story){
    ?>
    <article>
    <div class="story" >
        <div class = "story_header">
            <span><?=$story['CategoryName']?></span>
            <span style="color: #808080;"> Posted by 
                <a href="../pages/user.php?username=<?=$story['username']?>" > <?=$story['username']?></a>
            </span>
            <span style="color: #808080;"> on
                <?=$story['pDate']?>
            </span>
        </div>

        <div class = "story_content">
            <div class = "story_title">
               <h3><a href="../pages/story.php?story_id=<?=$story['postID']?>"><?=$story['Title']?></a></h3>
            </div>
            <p><?=nl2br($story['Dados'])?></p>
        </div>

        <div class = "story_footer">
    
           <div class="vote-toggle">
                <?php
                   draw_votes($_SESSION['username'],$story['postID'],$story['up'],$story['down']);
                ?>
               
            </div>

            <div id='comments'>
                    <a href="../pages/story.php?story_id=<?=$story['postID']?>">
                    <i class="fa fa-comment"></i>
                    </a>
            </div>
                <?php 
                if(isset($_SESSION['username']))
                    if(checkIfUserisLogged($_SESSION['username'],$story['username'])){
                    ?>
                    <div class="trash-can">
                        <a id="delete-story">
                        <input  type="hidden" name="story_id" value="<?=$story['postID']?>">
                        <input type="hidden" name="place" value="allStory">   
                        <i class="fa fa-trash"></i>
                        </a>
                    </div>  
            <?php }?>
        </div>
    </article>


<?php }?> 

<?php function  draw_votes($username,$story_id,$storyUp,$storyDown){
    ?>
    <div class="votes">
        
            
    <a id="voto">
            <input  type="hidden" name="story_id" value="<?=$story_id?>">
            <input  type="hidden" name="type" value="up">           
            
            <input  type="hidden" name="type" value="up">   

            <?php if (voteUp($story_id,$username) && !voteDown($story_id,$username)) {?>      
            <i class="fa fa-thumbs-up"></i>
            <?php } else {
                ?>
                <i class="fa fa-thumbs-o-up"></i>

          <?php  }?>

            </a>
        
    </div>

    <div class="votes">
     
    <a id="voto">
            <input  type="hidden" name="story_id" value="<?=$story_id?>">
            <input  type="hidden" name="type" value="down">
            

            <?php if(voteDown($story_id,$username) && !voteUp($story_id,$username)){?>
                <i class="fa  fa-thumbs-down"></i>
           <?php }else{ ?>
              <i class="fa fa-thumbs-o-down"></i>
         <?php  } ?>

    </a>
        
    </div>
    <p><?=$storyUp-$storyDown?></p>
    
<?php } ?>


<?php function draw_votes_comment($username,$story_id,$comment_id,$commentUp,$commentDown){
    ?>
    <div class="votes-comment">
        
        
        <a id="voto-comment">
        <input  type="hidden" name="story_id" value="<?=$story_id?>">
        <input  type="hidden" name="type" value="up">       
        <input  type="hidden" name="comment_id" value="<?=$comment_id?>"> 
        <?php if (voteUpComment($comment_id,$story_id,$username) && !voteDownComment($comment_id,$story_id,$username)) {?>      
            <i class="fa fa-thumbs-up"></i>
            <?php } else {
                ?>
                <i class="fa fa-thumbs-o-up"></i>

          <?php  }?>  
    
        </a>
        
    </div>
    <div class="votes-comment">
     
        <a id="voto-comment">
        <input  type="hidden" name="story_id" value="<?=$story_id?>">
        <input  type="hidden" name="type" value="down">
        <input  type="hidden" name="comment_id" value="<?=$comment_id?>">    
        <?php if(voteDownComment($comment_id,$story_id,$username) && !voteUpComment($comment_id,$story_id,$username)){?>
                <i class="fa  fa-thumbs-down"></i>
           <?php }else{ ?>
              <i class="fa fa-thumbs-o-down"></i>
         <?php  } ?>  
        </a>
    
    </div>
    <p><?=$commentUp-$commentDown?></p>
    
<?php } ?>


<?php function checkIfUserisLogged($usernameLogged,$storyusername){
    return $usernameLogged == $storyusername;

 }?> 


<?php function draw_one_story_only($story){
    ?>

    <div class ="story_container">
        <article class="story" >
        <div class="story_focus">
                        <div class = "story_header">
                            <span>Category: <?=$story['CategoryName']?></span>
                            <span>Story by <a href="../pages/user.php?username=<?=$story['username']?>" > <?=$story['username']?></a></span>
                            <span style="color: #808080;"> on
                                <?=$story['pDate']?>
                            </span>
                        </div>

                        <div class = "story_content">     
                            <div class = "story_title">  
                                <h3><a href="../pages/story.php?story_id=<?=$story['postID']?>"><?=$story['Title']?></a></h3>
                            </div>
                            <p><?=nl2br($story['Dados'])?></p>     
                        </div>
                    <div class = "story_footer2">
                        <div class="vote-toggle">
                            <?php
                            draw_votes($_SESSION['username'],$story['postID'],$story['up'],$story['down']);
                            ?>
                        </div>

                        <button onclick="addcomment()"> 
                            <i class="fa fa-comment"></i></button>  

                        <div class="comments_from_story" id="comment_section"style="display: none;">
                            <div class="new-comments">
                                <form action="../actions/action_add_comment.php?story_id=<?=$story['postID']?>" method="post" id="new_comment_">
                                <textarea name="comment" form="new_comment_" placeholder="Enter text here...">
                                </textarea>
                                <button type="submit" class="comment_">
                                    Save</i>
                                </button> 
                                </form>
                            </div>
                        </div>


                    <?php 
                    if(isset($_SESSION['username']))
                        if(checkIfUserisLogged($_SESSION['username'],$story['username'])){
                        ?> 
                        <div class="trash_can">
                            <a href="../api/delete_storyOnly.php?story_id=<?=$story['postID']?>">
                            <i class="fa fa-trash"></i>
                            </a>
                        </div>

                    <?php }?>
                    
                    <script>
                    function addcomment() {
                        var x = document.getElementById("comment_section");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }
                    </script>
            </div>
        </article>
        </div>
</div>

<?php }?> 


<?php function addComment(){
    ?>

    <form action="../actions/action_add_comment.php" method="post" id="Comment">
    <input type="submit" value="Comment" >
    
    </form>
    <textarea name="comment" form="Comment" placeholder="Enter text here...">
    </textarea>
       
<?php } ?>

<?php function draw_comments($comments){
    ?>
    <div class="commentsStoryDisplay">
        <?php
        foreach ($comments as $comment) {
        draw_comment($comment);
        } 
        ?>


    </div>

<?php }?>


<?php function draw_comment($comment){
    ?>
    
        <article class="comment">
        <div class="story_first_comments">
        <p>
            Comment By 
            <a class="link_2_user" href="../pages/user.php?username=<?=$comment['username']?>">
                @<?=$comment['username']?>
            </a>
        <p>
        <p><?=nl2br($comment['Dados'])?></p>

        <div class="vote-toggle-comment">
                <?php
                     draw_votes_comment($_SESSION['username'],$comment['PostID'],$comment['CommentID'],$comment['up'],$comment['down']);
                ?>
               
        </div>

        
        <?php if(checkIfUserisLogged($_SESSION['username'],$comment['username'])){
            ?>
            <div class="trash-can-comment">
                <a id="trash-can-comment">
                <input  type="hidden" name="story_id" value="<?=$comment['PostID']?>">
                <input  type="hidden" name="comment_id" value="<?=$comment['CommentID']?>">  
                <i class="fa fa-trash"></i>
                </a>
            </div>

        <?php }?>
        
       

        <div class= "comment_comment" style="display: none;" >

            <div class="new-comment">
                <form action="../actions/action_add_comment_comment.php?story_id=<?=$comment['PostID']?>&comment_id=<?=$comment['CommentID']?>" method="post" id="new_comment">
                <textarea name="comment_text_area" form="new_comment" placeholder="Enter text here...">
                </textarea>
                <button type="submit" class="comment">
                    Save</i>
                </button>        
                </form>
            </div>
           

        </div>
        </div>
       
        </article>
    

<?php }?>