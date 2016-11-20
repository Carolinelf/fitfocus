<?php

$headTemplate = new HeadTemplate('Add/Edit | Fit Focus', 'Edit or add a User');

$errors = array();
$todo = null;
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $dao = new UserDao();
    $user = Utils::getObjByGetId($dao);
} else {
    // set defaults
    $user = new User();
    $user->getFirstName();
    $user->getLastName();
    $user->getEmail();
    $user->getPassword();
    $user->setStatus('pending');
}

//if (array_key_exists('cancel', $_POST)) {
//    // redirect
//    Utils::redirect('detail', array('id' => $b->getId()));
//} else
    
    if (array_key_exists('save', $_POST)) {
    // for security reasons, do not map the whole $_POST['todo']
    $data = array(
        'first_name' => $_POST['user']['first_name'],
        'last_name' => $_POST['user']['last_name'], 
        'email' => $_POST['user']['email'],
        'password' => $_POST['user']['password']
    );
    
    // map
    UserMapper::map($user, $data);
    // validate
    $errors = UserValidator::validate($user);
    // validate
    if (empty($errors)) {
        // save
        $dao = new UserDao();
        $user = $dao->save($user);
        Flash::addFlash('User saved successfully.');
        // redirect
        Utils::redirect('list', array('module'=>'user'));
     }
}
