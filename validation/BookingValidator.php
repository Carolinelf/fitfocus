<?php
/**
 * Validator for {@link Booking}.
 * @see BookingMapper
 */
final class BookingValidator {

    private function __construct() {
    }

    /**
     * Validate the given {@link Booking} instance.
     * @param Booking $booking {@link Booking} instance to be validated
     * @return array array of {@link Error} s
     */
    public static function validate(Booking $booking) {
        $errors = array();
        if (!$booking->getFlightName()) {
            $errors[] = new Error('flight_name', 'Empty or invalid Flight Name.');
        }
        if (!$booking->getFlightDate()) {
            $errors[] = new Error('flight_date', 'Empty or invalid Flight Date.');
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
        return in_array($status, Booking::allStatuses());
    }

    private static function isValidPriority($priority) {
        return in_array($priority, Booking::allPriorities());
    }

}
