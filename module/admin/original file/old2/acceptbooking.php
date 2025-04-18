<?php
include_once('../../service/mysqlcon.php');
require_once 'observer.php';
require 'strategy.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomNumber = $_POST['roomNumber'];
    $facultyID = $_POST['facultyID'];
    $facultyName = $_POST['facultyName'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Insert data into bookings table
    $insert_sql = "INSERT INTO bookings (roomNumber, facultyID, facultyName, date, time) 
                   VALUES ('$roomNumber', '$facultyID', '$facultyName', '$date', '$time')";

    if (mysqli_query($link, $insert_sql)) {
        // Delete data from request table after successful insertion
        $delete_sql = "DELETE FROM request WHERE roomNumber='$roomNumber' AND date='$date' AND time='$time'";
        mysqli_query($link, $delete_sql);


        // Create notification message
        $message1 = "Room no:$roomNumber in $date at $time has been Booked .";

        
        // MAIN EXECUTION
$broadcaster = new MessageBroadcaster();

// Create Observers
$device = new Display("IQN");

// Attach Observers
$broadcaster->attach($device);

// Send Message
$broadcaster->setMessage($message1);


        
$service = new NotificationService();
$service->setNotificationStrategy(new MobileNotification());
$service->notify();


        
    } else {
        echo "<script>alert('Error while booking!'); window.location.href='viewmanageroom.php';</script>";
    }
}
?>
