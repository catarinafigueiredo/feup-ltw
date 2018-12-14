<?php function draw_categories($categories){
    ?>

<div>
    <h4>Select By Category</h4>
 <?php
  foreach ($categories as $category) {
   draw_category($category);
} 
?>
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

