
<?php function draw_categories($categories){
    ?>

<div class="select_category">
    <h4>Select By Category</h4>
    <div class="category">
 <?php
  foreach ($categories as $category) {
   draw_category($category);
} 
?>
</div>
</div>
<?php } ?>

<?php function draw_category($category){
    ?>
    <div>
        <a href="../pages/category_story.php?category_id=<?=array_values($category)[0]?>"> <?=array_values($category)[0]?></a>
    </div>
<?php }?> 



<?php function category_name($category){
    ?>
    <div class="Category Title">
        <h2><a href="../pages/category_story.php?category_id=<?=$category?>"> <?=$category?></a></h2>
    </div>
<?php }?> 

<?php function  draw_subscribe_category(){
    ?>
    
    <header class="subs" id="subs" >
        
        <div class="Subscribe_cat"  id="Subscribe_cat">
            <button class="button_subscribe"><p>Subscribe</p></button>
        </div>
    </header> 
<?php } ?>

<?php function  draw_unsubscribe_category(){
    ?>
    <header >
        <div class="UnSubscribe_cat"  id="UnSubscribe_cat">
            <button class="Unbutton_subscribe"><p>UnSubscribe</p></button>
        </div>
    </header> 
<?php } ?>

