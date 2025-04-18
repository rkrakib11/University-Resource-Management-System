<?php

// Strategy Interface
interface NotificationStrategy {
    public function sendNotification();
}

// Concrete Strategy: Email Notification
class EmailNotification implements NotificationStrategy {
    public function sendNotification() {
        echo  "<script>alert('Booking request canceled.'); window.location.href='viewmanageroom.php';</script>";
    }
}

// Concrete Strategy: Mobile Notification
class MobileNotification implements NotificationStrategy {
    public function sendNotification() {
        echo "<script>alert('Booking Accepted!'); window.location.href='viewmanageroom.php';</script>";
    }
}

// Context Class
class NotificationService {
    private $strategy;

    public function setNotificationStrategy(NotificationStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function notify() {
        $this->strategy->sendNotification(); // Polymorphic Behavior
    }
}


?>
