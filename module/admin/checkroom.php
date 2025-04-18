<?php
include_once('../../service/mysqlcon.php');

if(isset($_GET['number'])){
    $room_number = $_GET['number'];
    
    // Delete past bookings automatically
    $current_date = date('Y-m-d');
    $delete_sql = "DELETE FROM bookings WHERE date < '$current_date'";
    mysqli_query($link, $delete_sql);

    // Check for active bookings (today or future)
    $sql = "SELECT * FROM bookings WHERE roomNumber='$room_number' AND date >= '$current_date'";
    $res = mysqli_query($link, $sql);

    if(mysqli_num_rows($res) > 0) {
        echo "<p style='color: red;'>This Room has Bookings. Press view to see:</p>";
        echo "<a href='viewbooking.php?number=$room_number'><button>View</button></a>";
    } else {
        echo "<p style='color: green;'>This Room has no Bookings.</p>";
    }
} else {
    echo "Room number not provided.";
}
?>
