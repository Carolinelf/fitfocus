
 
  
  $headTemplate = new HeadTemplate('Add/Edit | Fit Focus', 'Edit or add a Activity');
          
 -$activityNames = ['bench press', 'curl reps', 'squats', 'lunges'];
 +$activityNames = ['','bench press', 'curl reps', 'squats', 'lunges'];
  $errors = array();
  $todo = null;
  $edit = array_key_exists('id', $_GET);
 @@ -30,13 +30,16 @@
      // for security reasons, do not map the whole $_POST['todo']
      $data = array(
          'flight_name' => $_POST['activity']['activity_name'],
 -        'flight_date' => $_POST['booking']['flight_date']
 +        'flight_date' => $_POST['booking']['flight_date'] . ' 00:00:00'
      );
 +    
 +//    var_dump($data);
 +//    die();
          
      // map
      ActivityMapper::map($activity, $data);
      // validate
 -    //$errors = ActivityValidator::validate($activity);
 +    $errors = ActivityValidator::validate($activity);
      // validate
      if (empty($errors)) {
          // save