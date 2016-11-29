<?php
/**
 * Validator for {@link User}.
 * @see UserMapper
 */
final class RegisterValidator {
    private function __construct() {
    }
    /**
     * Validate the given {@link User} instance.
     * @param User $user {@link User} instance to be validated
     * @return array array of {@link Error} s
     */
    public static function validate(User $user) {
        $errors = array();
        if (!$user->getUsername()) {
            $errors[] = new Error('username', 'Empty or invalid Username.');
        }
        if (!$user->getPassword()) {
            $errors[] = new Error('password', 'Empty or invalid Password.');
        }
        if (!$user->getEmail()) {
            $errors[] = new Error('email', 'Empty or invalid Email.');
        }
        return $errors;
    }
    /**
     * Validate the given status.
     * @param string $status status to be validated
     * @throws Exception if the status is not known
     */
    public static function validateStatus($status) {
        if (!self::isValidStatus($status)) {
            throw new Exception('Unknown status: ' . $status);
        }
    }
    /**
     * Validate the given priority.
     * @param int $priority priority to be validated
     * @throws Exception if the priority is not known
     */
    public static function validatePriority($priority) {
        if (!self::isValidPriority($priority)) {
            throw new Exception('Unknown priority: ' . $priority);
        }
    }
    private static function isValidStatus($status) {
        return in_array($status, User::allStatuses());
    }
    private static function isValidPriority($priority) {
        return in_array($priority, User::allPriorities());
    }
}