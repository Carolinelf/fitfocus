<?php
/**
 * Description of User
 */
class Activity {
    
    private $id;
    private $title;
    private $details;
    private $categoryId;
    private $imageUrl;
    private $status;
    
    private $category;
    
    
    function getCategory() {
        return $this->category;
    }

    function setCategory(Category $category) {
        $this->category = $category;
    }

        function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getDetails() {
        return $this->details;
    }

    function getCategoryId() {
        return $this->categoryId;
    }

    function getImageUrl() {
        return $this->imageUrl;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDetails($details) {
        $this->details = $details;
    }

    function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    function setStatus($status) {
        $this->status = $status;
    }




}


