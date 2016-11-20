<?php

class Booking {

    private $id;
    private $flightName;
    private $flightDate;
    private $dateCreated;
    private $userId;
    private $status;
    
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }
    function getId() {
        return $this->id;
    }

    function getFlightName() {
        return $this->flightName;
    }

    function getFlightDate() {
        return $this->flightDate;
    }

    function getDateCreated() {
        return $this->dateCreated;
    }

    function getUserId() {
        return $this->userId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFlightName($flightName) {
        $this->flightName = $flightName;
    }

    function setFlightDate($flightDate) {
        $this->flightDate = $flightDate;
    }

    function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }
}
