


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
           <h3> <?php // echo Utils::escape($activity->getCategory()->getName());?></h3>
           <h3> <?php echo Utils::escape($activity->getTitle());?></h3>
           <p><?php // echo Utils::escape($activity->getCategoryId());?></p>
           <p><?php echo Utils::escape($activity->getDetails());?></p>
           <img src="<?php echo Utils::escape($activity->getImageUrl());?>" alt="imagetobereplaced"><br>           
<!--        get video add to datatbase-->

            <a href="index.php?module=home&page=activity-add-edit&id=<?php echo $activity->getId()?>" class="btn btn-warning" role="button">edit</a>
        <a href="index.php?module=activity&page=delete&id=<?php echo $activity->getId();?>" class="btn btn-info" role="button">delete</a>
        </div>   
        
       
       
       
        <?php endforeach; ?>
    
<?php endif; ?>


    </div>
</div>