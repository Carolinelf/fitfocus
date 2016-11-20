<?php

require 'db.php';
$articles = getArticles();

?>
<!--//$posts = array(
//    array("Today I went To The Supermarket", "I bought Apples, Brocolli, Carrots, Yoghurt and Muesli, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "22 August 2016", "User42"),
//    array("Today I Went To The Shops", "It was great Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "12 August 2016", "User42"),
//    array("Today I Went To Orana Park", "I thought I saw harambe at orana park, but it was just a regular gorilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "4 August 2016", "User42")
//);
//?>-->

<p> <?php
// loops over items in the $posts array
for ($i = 0; $i < count($articles); $i++) {
echo '<div class="post">';
echo '<div class="title">' . $articles[$i][1] . '</div>';
echo $articles[$i][2];
echo '<div class="date">' . $articles[$i][3] . " on " . $articles[$i][2] .'</div>';
echo '</div>';
}


//// loops over items in the $posts array
//for ($i = 0; $i < count($posts); $i++) {
//echo '<div class="post">';
//echo '<div class="title">' . $posts[$i][0] . '</div>';
//echo $posts[$i][1];
//echo '<div class="date">' . $posts[$i][3] . " on " . $posts[$i][2] .'</div>';
//echo '</div>';
//}

?>
</p>



