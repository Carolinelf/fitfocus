<?php
if(isset($_SESSION['user_id'])){
echo 'You are logged in';
}else{
echo 'You are not logged in';
}
?>


<!--nav goes here-->

<!--hero image will go here-->

<nav class="navbar navbar-inverse">
  la la la 
</nav>

<h1>Welcome to Fit Focus</h1>
<div class="hero">
<img src="../images/hero.jpg" width="1200" height="500" alt="imagetobereplaced">
</div>
<p>some interesting information and great design will go here eventually</p>

<div class="container"> 
    <div class="row">

   <?php if (empty($categories)): ?>
        <p>No categories found.</p>
   <?php else: ?>
    
        <?php foreach ($categories as $category): ?>
             <div class="col-md-3">          
           <img src="http://placehold.it/150x150" alt="imagetobereplaced">
           <h3> <?php echo Utils::escape($category->getName());?></h3>
           <p><?php echo Utils::escape($category->getDescription());?></p>
                           
            <a href="index.php?module=activity&page=list&cat_id=<?php echo $category->getId();?>" class="btn btn-primary" role="button">read full article</a>  
            </div> 
                <?php endforeach; ?>

<?php endif; ?>


    </div>
</div>