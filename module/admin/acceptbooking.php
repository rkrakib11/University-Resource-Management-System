<?php
include_once('../../service/mysqlcon.php');
require_once 'observer.php';
require 'strategy.php';
require_once 'facade.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomNumber = $_POST['roomNumber'];
    $facultyID = $_POST['facultyID'];
    $facultyName = $_POST['facultyName'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Insert data into bookings table
    $insert_sql = "INSERT INTO bookings (roomNumber, facultyID, facultyName, date, time) 
                   VALUES ('$roomNumber', '$facultyID', '$facultyName', '$date', '$time')";

    //getting faculty name whose request is going to be accepted

        $update_sql2 = "SELECT * FROM request WHERE roomNumber='$roomNumber' AND date='$date' AND time='$time'";
        $result = mysqli_query($link, $update_sql2);
        $row = mysqli_fetch_assoc($result);
        $name = $row['facultyName'];
        $id = $row['facultyID'];


    if (mysqli_query($link, $insert_sql)) {
        // Delete data from request table after successful insertion
        $delete_sql = "DELETE FROM request WHERE roomNumber='$roomNumber' AND date='$date' AND time='$time'";
        mysqli_query($link, $delete_sql);

        $apiGateway = new APIGateway();
        $details= $apiGateway->getFullBookingDetails( $roomNumber, $date, $time);
        $today = date('Y-m-d');


        // Create notification message
        $message1 = "New Room Accepted by Admin. Details: $details .Notification sent in: $today. Requested by:$name ";

        
        // MAIN EXECUTION
$broadcaster = new MessageBroadcaster();

// Create Observers
$device = new Display($id);

// Attach Observers
$broadcaster->attach($device);

// Send Message
$broadcaster->setMessage($message1);



echo "<script> window.location.href='viewmanageroom.php';</script>";
        
    } else {
        echo "<script>alert('Error while booking!'); window.location.href='viewmanageroom.php';</script>";
    }
}
?>
