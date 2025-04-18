<?php
// APIGateway.php

class UserRoomno {
    public function getRoomDetails($roomNumber) {
        return "Room Number: " . $roomNumber;
    }
}

class BookingDate {
    public function getDateDetails($date) {
        return "Booking Date: " . $date;
    }
}

class BookingTime {
    public function processTime($time) {
        return "Booking Time: " . $time;
    }
}

class APIGateway {
    private $userRoomno;
    private $bookingDate;
    private $bookingTime;

    public function __construct() {
        $this->userRoomno = new UserRoomno();
        $this->bookingDate = new BookingDate();
        $this->bookingTime = new BookingTime();
    }

    public function getFullBookingDetails($roomNumber, $date, $time) {
        $roomDetails = $this->userRoomno->getRoomDetails($roomNumber);
        $dateDetails = $this->bookingDate->getDateDetails($date);
        $timeProcessing = $this->bookingTime->processTime($time);

        return $roomDetails . ". " . $dateDetails . ". " . $timeProcessing;
    }
}
?>
