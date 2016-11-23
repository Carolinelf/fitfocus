<?php

$headTemplate = new HeadTemplate('Add/Edit | Fit Focus', 'Edit or add a category');
        
$categoryNames = ['Core', 'Yoga', 'Strength', 'balance'];
$errors = array();
$category = null;
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $dao = new CategoryDao();
    $category = Utils::getObjByGetId($dao);
} else {
    // set defaults
    $category = new Category();
    $category->setCategoryName('');
    
    $category->setStatus('pending');
    $userId = 1;
    $category->setUserId($userId);
}

//if (array_key_exists('cancel', $_POST)) {
//    // redirect
//    Utils::redirect('detail', array('id' => $todo->getId()));
//} else

if (array_key_exists('save', $_POST)) {
    // for security reasons, do not map the whole $_POST['todo']
    $data = array(
        'category_name' => $_POST['category']['category_name'],
        
    );
    
//    var_dump($data);
//    die();
        
    // map
    Category::map($category, $data);
    // validate
    $errors = CategoryValidator::validate($category);
    // validate
    if (empty($errors)) {
        // save
        $dao = new CategoryDao();
        $category = $dao->save($category);
        Flash::addFlash('Category saved successfully.');
        // redirect
        Utils::redirect('list', array('module'=>'Category'));
    }
}
