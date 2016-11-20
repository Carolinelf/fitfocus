<?php
/**
 * Description of User
 */
class Activity {
    
    private $id;
    private $activtyName;
    private $activtyArticle;
   private $status;
    
    function getId() {
        return $this->id;
    }
    function getActivityName() {
        return $this->activtyName;
    }
    function getActivityArticle() {
        return $this->activityArticle;
    }
    function getEmail() {
        return $this->email;
    }
    function getPassword() {
        return $this->password;
    }
     
    function getstatus() {
        return $this->status;
    }
    function setId($id) {
        $this->id = $id;
    }
 
    function setStatus($status) {
        $this->status = $status;
    }
}