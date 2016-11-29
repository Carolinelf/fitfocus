<?php
/**
 * Description of UserMapper
 
 */
class ActivityMapper {
    private function __construct() {
    }
    /**
     * Maps an array to a User object.
     * @param User $activity
     * @param array $properties
     */
    public static function map(Activity $activity, array $properties) {
        if (array_key_exists('id', $properties)) {
            $activity->setId($properties['id']);
        }
        if (array_key_exists('title', $properties)) {
            $activity->setTitle($properties['title']);
        }
        if (array_key_exists('details', $properties)) {
            $activity->setDetails($properties['details']);
        }
//        if (array_key_exists('category_id', $properties)) {
//            $activity->setCategoryId($properties['category_id']);
//        }
       
        if (array_key_exists('image_url', $properties)) {
            $activity->setImageUrl($properties['image_url']);
        }
        if (array_key_exists('status', $properties)) {
            $activity->setStatus($properties['status']);
        }
        
        if (array_key_exists('category_id', $properties)) {
            $category = new Category();
            $category->setCategoryId($properties['category_id']);
            if (array_key_exists('name', $properties)) {
                $category->setName($properties['name']);
            }
            
            $activity->setCategory($category);
        }
    }
}


   