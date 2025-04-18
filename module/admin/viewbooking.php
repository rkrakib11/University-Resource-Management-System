<?php
include_once('../../service/mysqlcon.php');

if(isset($_GET['number'])){
    $room_number = $_GET['number'];
    $current_date = date('Y-m-d');

    // Fetch bookings with faculty name
    $sql = "SELECT b.date AS booking_date, f.name AS faculty_name 
            FROM bookings b 
            JOIN faculty f ON b.facultyId = f.id
            WHERE b.roomNumber='$room_number' 
            AND b.date >= '$current_date'";

    $res = mysqli_query($link, $sql);

    if(mysqli_num_rows($res) > 0) {
        echo "<center><h2>Room Booking Details</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Faculty Name</th><th>Booking Date</th></tr>";

        while($row = mysqli_fetch_array($res)){
            echo "<tr>
                    <td>{$row['faculty_name']}</td>
                    <td>{$row['booking_date']}</td>
                  </tr>";
        }
        echo "</table></center>";
    } else {
        echo "No active bookings for this room.";
    }
} else {
    echo "Room number not provided.";
}
?>
