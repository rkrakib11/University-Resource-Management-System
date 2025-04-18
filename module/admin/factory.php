<?php

interface Location {
    public function getDetails();
}

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

class LocationFactory {
    public static function createLocation($type) {
        switch ($type) {
            case 'NAC':
                return new NACLocation();
            case 'SAC':
                return new SACLocation();
            case 'Library Buildin':
                return new LibLocation();
            case 'Admin Building':
                return new AdminLocation();
            default:
                throw new Exception("Invalid location type.");
        }
    }
}


?>