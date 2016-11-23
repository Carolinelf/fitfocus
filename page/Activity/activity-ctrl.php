<?php

$headTemplate = new HeadTemplate('Home | FitFocus', '');


//$status = Utils::getUrlParam('status');
//TodoValidator::validateStatus($status);

$dao = new ActivityDao();
//$search = new TodoSearchCriteria();
//$search->setStatus($status);

// data for template
//$title = Utils::capitalize($status) . ' TODOs';
$sql = 'SELECT * FROM activity';
$activities= $dao->find($sql);

