<?php

$headTemplate = new HeadTemplate('User List | Fly To The Limit', 'List of Users');

//$status = Utils::getUrlParam('status');
//TodoValidator::validateStatus($status);

$dao = new UserDao();
//$search = new TodoSearchCriteria();
//$search->setStatus($status);

// data for template
//$title = Utils::capitalize($status) . ' TODOs';
$sql = 'SELECT * FROM users WHERE status != "deleted"';
$users= $dao->find($sql);
