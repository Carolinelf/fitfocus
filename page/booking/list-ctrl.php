<?php

$headTemplate = new HeadTemplate('Booking list | Fly to the Limit', 'List of bookings');
//$status = Utils::getUrlParam('status');
//TodoValidator::validateStatus($status);
$dao = new BookingDao();
//$search = new TodoSearchCriteria();
//$search->setStatus($status);
// data for template
//$title = Utils::capitalize($status) . ' TODOs';
$sql = 'SELECT * FROM bookings WHERE status != "deleted"';
$bookings = $dao->find($sql);