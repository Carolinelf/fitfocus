<?php
/**
 * Description of UserMapper
 
 */
class ActivityMapper {
    private function __construct() {
    }
    /**
     * Maps an array to a User object.
     * @param User $user
     * @param array $properties
     */
    public static function map(Activity $user, array $properties) {
        if (array_key_exists('id', $properties)) {
            $user->setId($properties['id']);
        }
        if (array_key_exists('activity_name', $properties)) {
            $user->setFirstName($properties['first_name']);
        }
        if (array_key_exists('last_name', $properties)) {
            $user->setLastName($properties['last_name']);
        }
        if (array_key_exists('email', $properties)) {
            $user->setEmail($properties['email']);
        }
        if (array_key_exists('password', $properties)) {
            $user->setPassword($properties['password']);
        }
        if (array_key_exists('status', $properties)) {
            $user->setStatus($properties['status']);
        }
    }
}
