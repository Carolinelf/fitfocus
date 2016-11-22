<?php

$headTemplate = new HeadTemplate('Add/Edit | Fit Focus', 'Edit or add a activity');
        
$activityNames = ['bench press', 'curl reps', 'squats', 'lunges'];
$activityNames = ['','bench press', 'curl reps', 'squats', 'lunges'];
$errors = array();
$todo = null;
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $dao = new ActivityDao();
    $booking = Utils::getObjByGetId($dao);
} else {
    // set defaults
    $booking = new Booking();
    $booking->setFlightName('');
    $flightDate = new DateTime("+1 day");
    $flightDate->setTime(0, 0, 0);
    $booking->setFlightDate($flightDate);
    $booking->setStatus('pending');
    $userId = 1;
    $booking->setUserId($userId);
}

//if (array_key_exists('cancel', $_POST)) {
//    // redirect
//    Utils::redirect('detail', array('id' => $todo->getId()));
//} else

if (array_key_exists('save', $_POST)) {
    // for security reasons, do not map the whole $_POST['todo']
    $data = array(
        'flight_name' => $_POST['booking']['flight_name'],
        'flight_date' => $_POST['booking']['flight_date'] . ' 00:00:00'
    );
    
//    var_dump($data);
//    die();
        
    // map
    BookingMapper::map($booking, $data);
    // validate
    $errors = BookingValidator::validate($booking);
    // validate
    if (empty($errors)) {
        // save
        $dao = new BookingDao();
        $booking = $dao->save($booking);
        Flash::addFlash('Booking saved successfully.');
        // redirect
        Utils::redirect('list', array('module'=>'booking'));
    }
}
