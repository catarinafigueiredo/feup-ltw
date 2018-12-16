
<?php function create_new_story() {
    include_once('../database/db_story.php');
    ?>
    <section id="list">
    <article class="new-story">
    <form action="../actions/action_add_story.php" method="post" id="bla">
        <input type="text" name="title" placeholder="title">
    </form>
     <textarea name="comment" form="bla" placeholder="Enter text here...">
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
        </div>
        <div class="ordered-publications">
            <?php                
                $publications = getRecentPublications();
                draw_stories($publications);
                //draw_publications($publications, "Fresh");
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
    <article class="story" >
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
            <header><h3><a href="../pages/story.php?story_id=<?=$story['postID']?>"><?=$story['Title']?></a></h3></header>
            
            <p><?=nl2br($story['Dados'])?></p>
        </div>
        <div class = "story_footer">
        

           <div class="vote-toggle">
                <?php
                    draw_votes($story['postID']);
                ?>
                <p><?=$story['up']-$story['down']?></p>
            </div>

            <div id='comments'>
                    <a href="../pages/story.php?story_id=<?=$story['postID']?>">
                    <i class="fa fa-comment"></i>
                    </a>
            </div>
            <?php if(checkIfUserisLogged($_SESSION['username'],$story['username'])){
                ?>
                <div class="trash can">
                    <a href="../api/delete_story.php?story_id=<?=$story['postID']?>">
                    <i class="fa fa-trash"></i>
                    </a>
                </div>
        </div>
        <?php }?>
        

        
        
        
    </article>

<?php }?> 

<?php function draw_votes($story_id){
    ?>
    <div class="vote-section">
        <div id="votesUp <?=$story_id?>" >
            
            <a href="../api/vote.php?story_id=<?=$story_id?>&type=up">
            <i class="fa fa-thumbs-o-up"></i>
            </a>
        </div>
        <div class="votesDown <?=$story_id?>">
            
            <a href="../api/vote.php?story_id=<?=$story_id?>&type=down">
            <i class="fa  fa-thumbs-o-down"></i>
            </a>
        </div>
    </div>
<?php } ?>


<?php function checkIfUserisLogged($usernameLogged,$storyusername){
    return $usernameLogged == $storyusername;

 }?> 


<?php function draw_one_story_only($story){
    ?>
    <article class="story" >
    
        <header><h3><a href="../pages/story.php?story_id=<?=$story['postID']?>"><?=$story['Title']?></a></h3></header>
       
        <p>Category: <?=$story['CategoryName']?></p>
        <p>Story by <a href="../pages/user.php?username=<?=$story['username']?>" > <?=$story['username']?></a></p>
        <p><?=nl2br($story['Dados'])?></p>
        
        <div class="vote-section">
            <div id="votesUp<?=$story['postID']?>" >
             
                <a href="../api/vote.php?story_id=<?=$story['postID']?>&type=up">
                <i class="fa fa-thumbs-o-up"></i>
                </a>
            </div>
            <div class="votesDown<?=$story['postID']?>">
                
                <a href="../api/vote.php?story_id=<?=$story['postID']?>&type=down">
                <i class="fa  fa-thumbs-o-down"></i>
                </a>
            </div>
        
            <p><?=$story['up']-$story['down']?></p>

        </div>
        <button onclick="addcomment()"> 
                <i class="fa fa-comment"></i></button>  


        <div id="comment_section"style="display: none;">
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
        <?php if(checkIfUserisLogged($_SESSION['username'],$story['username'])){
            ?>
            <div class="trash can">
                <a href="../api/delete_story.php?story_id=<?=$story['postID']?>">
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
        
    </article>

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
    <section id="commentsStory">
        <?php
        foreach ($comments as $comment) {
        draw_comment($comment);
        } 
        ?>


    </section>

<?php }?>


<?php function draw_comment($comment){
    ?>
    
        <article class="comment">
        <p>comment by <?=$comment['username']?></p>
        <p><?=nl2br($comment['Dados'])?></p>
        
        <div class="vote-section-comments">
            <div id="votesUp<?=$comment['CommentID']?>" >
               
                <p><?=$comment['PostID']?> <?=$comment['CommentID']?></p>
                <a href="../api/vote_comment.php?story_id=<?=$comment['PostID']?>&type=up&comment_id=<?=$comment['CommentID']?>">
                <i class="fa fa-thumbs-o-up"></i>
                </a>
            </div>
            <div class="votesDown<?=$comment['CommentID']?>">
            
                <a href="../api/vote_comment.php?story_id=<?=$comment['PostID']?>&type=down&comment_id=<?=$comment['CommentID']?>">
                <i class="fa  fa-thumbs-o-down"></i>
                </a>
            </div>
        
            <p><?=$comment['up']-$comment['down']?></p>
            

        </div>
        <?php if(checkIfUserisLogged($_SESSION['username'],$comment['username'])){
            ?>
            <div class="trash can">
                <a href="../api/delete_comment.php?story_id=<?=$comment['PostID']?>&comment_id=<?=$comment['CommentID']?>">
                <i class="fa fa-trash"></i>
                </a>
            </div>

        <?php }?>
        
        <div class="comment_button"> 
                <i class="fa fa-comment"></i></div>  

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
       
        </article>
    

<?php }?>