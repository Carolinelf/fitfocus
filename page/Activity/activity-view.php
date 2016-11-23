<?php
if(isset($_SESSION['user_id'])){
echo 'You are logged in';
}else{
echo '<h1>You are not logged in';
}
?>


<!--nav goes here-->

<!--hero image will go here-->




<h1>Welcome to Fit Focus</h1>


<p>some interesting information and great design will go here eventually</p>

<div class="container"> 
    <div class="row">

   <?php if (empty($activities)): ?>
        <p>No activities found.</p>
   <?php else: ?>
    
        <?php foreach ($activities as $activity): ?>
        <div class="col-md-3">    
           <h3> <?php echo Utils::escape($activity->getTitle());?></h3>
           <p><?php echo Utils::escape($activity->getCategoryId());?></p>
           <p><?php echo Utils::escape($activity->getDetails());?></p>
           <img src="<?php echo Utils::escape($activity->getImageUrl());?>" alt="imagetobereplaced">            
<!--        get video add to datatbase-->
        </div>     

        <?php endforeach; ?>
    
<?php endif; ?>


    </div>
</div>