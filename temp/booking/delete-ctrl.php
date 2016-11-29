<?php

$bookingDao = new BookingDao();
$activity = Utils::getObjByGetId($bookingDao);


$bookingDao->delete($activity->getId());
Flash::addFlash('Booking deleted successfully.');

Utils::redirect('list', array('module'=>'booking'));
