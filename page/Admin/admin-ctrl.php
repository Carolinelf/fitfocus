<?php

$headTemplate = new HeadTemplate('Add/Edit | Fit Focus', 'Edit or add a activity');
        
$activityNames = ['bench press', 'curl reps', 'squats', 'lunges'];
//$activityNames = ['','bench press', 'curl reps', 'squats', 'lunges'];
$errors = array();
$todo = null;
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $dao = new ActivityDao();
    $activity = Utils::getObjByGetId($dao);
} else {
    // set defaults
    $activity = new Activity();
    $activity->setActivityName('');
 
}

//if (array_key_exists('cancel', $_POST)) {
//    // redirect
//    Utils::redirect('detail', array('id' => $todo->getId()));
//} else

if (array_key_exists('save', $_POST)) {
    // for security reasons, do not map the whole $_POST['todo']
    $data = array(
        'activity_name' => $_POST['activity']['activity_name'],
        
    );
    
//    var_dump($data);
//    die();
        
    // map
    ActivityMapper::map($activity, $data);
    // validate
    $errors = ActivityValidator::validate($activity);
    // validate
    if (empty($errors)) {
        // save
        $dao = new ActivityDao();
        $activity = $dao->save($activity);
        Flash::addFlash('Activity saved successfully.');
        // redirect
        Utils::redirect('list', array('module'=>'activity'));
    }
}
