<?php

// Define the common interface for locations
interface Location {
    public function getDetails();
}

// Concrete classes for different locations
class NACLocation implements Location {
    public function getDetails() {
        return "Booked for class purposes in NAC building.";
    }
}

class SACLocation implements Location {
    public function getDetails() {
        return "Booked for class purposes in SAC building.";
    }
}

class LibLocation implements Location {
    public function getDetails() {
        return "Booked For Lab Purposes.";
    }
}

class AdminLocation implements Location {
    public function getDetails() {
        return "Booked For official Purposes.";
    }
}

// Factory class that creates different location types dynamically
class LocationFactory {

    // Mapping location types to their respective classes
    private static $locationMap = [
        'NAC' => NACLocation::class,
        'SAC' => SACLocation::class,
        'Library Building' => LibLocation::class,
        'Admin Building' => AdminLocation::class,
    ];

    // Method to create a location dynamically based on the type
    public static function createLocation($type) {
        if (!array_key_exists($type, self::$locationMap)) {
            throw new Exception("Invalid location type.");
        }
        
        // Instantiate the corresponding location class dynamically
        return new self::$locationMap[$type]();
    }
}
?>
