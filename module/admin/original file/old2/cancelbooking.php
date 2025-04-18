
<?php
include_once('../../service/mysqlcon.php');
require_once 'observer.php';
require 'strategy.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomNumber = $_POST['roomNumber'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    
    // Delete request entry
    $delete_sql = "DELETE FROM request WHERE roomNumber='$roomNumber' AND date='$date' AND time='$time'";
    if (mysqli_query($link, $delete_sql)) {
        // Create notification message
        $message1 = "Room no:$roomNumber  which was booked in $date at $time has been canceled.";

        // MAIN EXECUTION
$broadcaster = new MessageBroadcaster();

// Create Observers
$device = new Display("IQN");


// Attach Observers
$broadcaster->attach($device);


// Send Message
$broadcaster->setMessage($message1);

$service = new NotificationService();
$service->setNotificationStrategy(new EmailNotification());
$service->notify();


        

        
    } else {
        echo "<script>alert('Error while canceling!'); window.location.href='viewmanageroom.php';</script>";
    }
}
?>
