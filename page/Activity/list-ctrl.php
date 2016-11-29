<?php

//$headTemplate = new HeadTemplate('Home | FitFocus', '');
//
//
//
////TodoValidator::validateStatus($status);
//
//$dao = new ActivityDao();
////$search = new TodoSearchCriteria();
////$search->setStatus($status);
//
//// data for template
////$title = Utils::capitalize($status) . ' TODOs';
//
//if(array_key_exists('cat_id', $_GET)){
//$sql = 'SELECT * FROM Activity WHERE category_id = ' . $_GET['cat_id']; 
//$activities= $dao->find($sql);
//}else{
    //redirect to home
   

$headTemplate = new HeadTemplate('Activity | Fit Focus', 'List of activities');

$dao = new ActivityDao();
$sql = 'select c.name, a.title, a.details, a.image_url from Activity a,Category c WHERE a.category_id = c.id;';
//
////$sql = 'select * from Activity,Category WHERE activity.category_id = category.id';
$activities = $dao->find($sql);
//echo '<pre>';
//var_dump($activities);
//echo '</pre>';
//die();


// header('location: index.php');
//    exit;


//
//$headTemplate = new HeadTemplate('Booking list | Fly to the Limit', 'List of bookings');
//$dao = new BookingDao();
//$sql = 'SELECT u.id as user_id, u.first_name, u.last_name, b.flight_name, b.flight_date FROM bookings b, users u WHERE u.id = b.user_id;';
//$bookings = $dao->find($sql);