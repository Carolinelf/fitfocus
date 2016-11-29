<?php
$errors = '';

if (isset($_POST['submit'])) {
    
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
       $email = filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'inputPassword', FILTER_SANITIZE_STRING);
        $userDao = new UserDao();
        $user = $userDao->findByCredentials($email, $password);
//        if ($user === null) {
//            Utils::redirect('login', array('module' => 'auth'));
//        }
        if ($email === $user->getEmail() && $password === $user->getPassword()) {
            if (isset($_POST['remember-me'])) {
                setcookie('remember-me', 'username', time() + 60, '/login.php');
            }
            $_SESSION['first_name'] = $user->getFirstName();
            $_SESSION['role'] = $user->getRole();
            $_SESSION['user_id'] = $user->getUserId();
            header('Location: index.php');
        }
        else {
            $error = "Username and/or password is incorrect!";
        }
}
////}
//////          redirect once logged in
////            Utils::redirect('list', array('module' => 'review'));
////        } 
////    if (isset($_COOKIE['remember-me'])) {
////        $_SESSION['username'] = $_COOKIE['remember-me'];
////        
////    }
//
//if (isset($_GET['logout'])) {
//    session_destroy();
//    header('Location: index.php?module=auth&page=home');
}