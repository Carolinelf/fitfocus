<?php 
session_start(); 
require 'partials/header.php'; 
if(isset($_SESSION['user_email'])){
    require 'partials/dashboard.php';
}else{
    require 'partials/intro.php';
}
 require 'partials/footer.php'; 
?>
