<?php

// Strategy Interface
interface NotificationStrategy {
    public function sendNotification();
}

// Concrete Strategy: Email Notification
class EmailNotification implements NotificationStrategy {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function sendNotification() {
        // You can use $this->email for actual email logic
        echo "<script>alert('Booking request updated. Notification sent in this {$this->email}'); </script>";
    }
}

// Concrete Strategy: Mobile Notification
class MobileNotification implements NotificationStrategy {
    private $phoneno;

    public function __construct($phoneno) {
        $this->phoneno = $phoneno;
    }

    public function sendNotification() {
        // You can use $this->phoneno for actual SMS logic
        echo "<script>alert('Booking request updated.Notification is sent in this number {$this->phoneno}.'); window.location.href='viewmanageroom.php';</script>";
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

// Example usage:
// $emailNotifier = new EmailNotification("user@example.com");
// $smsNotifier = new MobileNotification("1234567890");

// $service = new NotificationService();
// $service->setNotificationStrategy($emailNotifier);
// $service->notify();
?>
