<?php

$headTemplate = new HeadTemplate('Category list | Fit Focus', 'List of categories');
//$status = Utils::getUrlParam('status');
//TodoValidator::validateStatus($status);
$dao = new CategoryDao();

//$search = new TodoSearchCriteria();
//$search->setStatus($status);
// data for template
//$title = Utils::capitalize($status) . ' TODOs';
$sql = 'SELECT * FROM category WHERE status != "deleted"';

$category = $dao->find($sql);
