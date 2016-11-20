<?php 
if(!isset($_SESSION['username'])) {
$login = '<a class="login" href="login.php">Login</a>';
} else {
$login = '<a class="login" href="login.php?logout">Logout</a>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Yatra+One" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
 <header>
     <nav>
         
         
         
         
     </nav>
     <?php
     echo "$login";
     ?>
</header>

