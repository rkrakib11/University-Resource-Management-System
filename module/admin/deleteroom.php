<?php
include_once('../../service/mysqlcon.php');

if(isset($_GET['number'])){ // Changed 'id' to 'number'
    $room_number = $_GET['number'];
    $sql = "DELETE FROM room WHERE number='$room_number'";

    if(mysqli_query($link, $sql)){
        echo "<script>alert('Room deleted successfully!'); window.location.href='room.php';</script>";
    } else {
        echo "Error deleting room: " . mysqli_error($link);
    }
} else {
    die("Room number not provided.");
}
?>
