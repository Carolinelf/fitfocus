<?php

//check get for logout


$headTemplate = new HeadTemplate('Add/Edit | Fit Focus', 'Edit or add a User');

$errors = '';
$user = new User();
//default values
$user->setFirstName('');
$user->setLastName('');
$user->setEmail('');
$user->setPassword('');
//FIXME needs login form functionality
//if (isset($_POST['submit'])) {
    //mock db values
    
    $user->setEmail('bob@email.com');
    $user->setPassword('password123');
    $user->setId(1);
    
    
    //what we get from the post
    $email = 'bob@email.com';
    $password = 'password123';
    //$role = 'admin';
    //$email = $_POST['inputEmail'];
    //$password = $_POST['inputPassword'];
    //$userDao = new UserDao();
    //$user = $userDao->findByCredentials($email, $password);
    
    
    
    if($email === $user->getEmail() && $password === $user->getPassword()){
        //session_destroy();
        $_SESSION['user_id'] = $user->getId();
        //$_SESSION['role'] = $role;
        header('Location: index.php');
        exit;
    }else{
        $errors = 'These credentials are not recognised.';
    }
    
//}