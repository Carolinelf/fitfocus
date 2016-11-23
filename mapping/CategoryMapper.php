<?php


class CategoryMapper {

    private function __construct() {
    }

    public static function map(Category $category, array $properties) {
        
        if (array_key_exists('id', $properties)) {
            $category->SetId($properties['id']);
        }
        if (array_key_exists('name', $properties)) {
            $category->SetName($properties['name']);
        }
        if (array_key_exists('description', $properties)) {
            $category->SetDescription($properties['description']);
        }
        
    }
}