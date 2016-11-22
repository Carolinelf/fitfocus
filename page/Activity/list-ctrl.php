<?php

$headTemplate = new HeadTemplate('Activity list | Fit Focus', 'List of activities');
//$status = Utils::getUrlParam('status');
//TodoValidator::validateStatus($status);
$dao = new ActivityDao();
//$search = new TodoSearchCriteria();
//$search->setStatus($status);
// data for template
//$title = Utils::capitalize($status) . ' TODOs';
$sql = 'SELECT * FROM activity WHERE status != "deleted"';
$bookings = $dao->find($sql);