<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');

// Fetch logged-in faculty details
$facultyID = $loged_user_id; // Using session-stored faculty ID
$facultyName = $loged_user_name; // Using session-stored faculty Name

// Get today's date and calculate the minimum selectable date
$today = date('Y-m-d');
$minDate = date('Y-m-d', strtotime('+3 days')); // 3 days after today

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roomNumber = mysqli_real_escape_string($link, $_POST['room']);
    $date = mysqli_real_escape_string($link, $_POST['date']);
    $timeslot = mysqli_real_escape_string($link, $_POST['timeslot']);
    $reason = mysqli_real_escape_string($link, $_POST['reason']);

    // Check if the slot is already booked in 'bookings'
    $checkBookedQuery = "SELECT * FROM bookings WHERE roomNumber='$roomNumber' AND date='$date' AND time='$timeslot'";
    $checkBookedResult = mysqli_query($link, $checkBookedQuery);

    if (mysqli_num_rows($checkBookedResult) > 0) {
        echo "<script>alert('The slot is already booked. Please choose another slot.');</script>";
    } else {
        // Check if the slot is pending in 'request'
        $checkPendingQuery = "SELECT * FROM request WHERE roomNumber='$roomNumber' AND date='$date' AND time='$timeslot'";
        $checkPendingResult = mysqli_query($link, $checkPendingQuery);

        if (mysqli_num_rows($checkPendingResult) > 0) {
            echo "<script>alert('The time slot is already pending, please try again later.');</script>";
        } else {
            // Insert new booking request into 'request' table
            $insertQuery = "INSERT INTO request (roomNumber, facultyID, facultyName, date, time, reason) 
                            VALUES ('$roomNumber', '$facultyID', '$facultyName', '$date', '$timeslot', '$reason')";
            
            if (mysqli_query($link, $insertQuery)) {
                echo "<script>alert('Booking request submitted successfully.');</script>";
            } else {
                echo "<script>alert('Error submitting booking request: " . mysqli_error($link) . "');</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Room Booking</title>
    <link rel="stylesheet" href="des.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style> 
         input[type=submit] {
            width: 20%;
            background-color: darkcyan;
            color: white;
            padding: 17px 20px;
            padding: 17px 20px;
            margin: 30px auto;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            text-align: center;
        }
        input[type=submit]:hover {
            background-color:darkolivegreen;
            transition: background-color 0.8s;
        }

        form {
            width: 70%;
            background-color:antiquewhite;
            border-radius: 10px;
            padding: 20px;
            margin: auto;
        }


    </style>
</head>
<body>
    <br/>
    <center>
        <h2>Book a Room</h2>
        <h4>Selected Room: <?php echo htmlspecialchars($_GET['number']); ?></h4>
        <form action="booking.php?number=<?php echo htmlspecialchars($_GET['number']); ?>" method="post">
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" required min="<?php echo $minDate; ?>" max="<?php echo date('Y-m-d', strtotime('+1 month')); ?>">
            <br><br>
            
            <label for="timeslot">Select Time Slot:</label>
            <select name="timeslot" id="timeslot" required>
                <option value="">Select a date first</option>
            </select>
            <br><br>
            
            <label for="reason">Booking Reason:</label>
            <textarea name="reason" id="reason" placeholder="Write reason" required></textarea>
            <br><br>
            
            <input type="hidden" name="room" value="<?php echo htmlspecialchars($_GET['number']); ?>">
            <input type="submit" value="Book Room">
        </form>
    </center>

    <script>
        $(document).ready(function() {
            $('#date').on('change', function() {
                var selectedDate = new Date($(this).val());
                var day = selectedDate.getDay();
                var timeslotDropdown = $('#timeslot');
                timeslotDropdown.empty();
                
                if (day === 5) { // Friday
                    timeslotDropdown.append('<option value="8AM-9AM">8AM - 9AM</option>');
                    timeslotDropdown.append('<option value="9AM-10AM">9AM - 10AM</option>');
                    timeslotDropdown.append('<option value="10AM-11AM">10AM - 11AM</option>');
                    timeslotDropdown.append('<option value="11AM-12PM">11AM - 12PM</option>');
                    timeslotDropdown.append('<option value="3PM-4PM">3PM - 4PM</option>');
                    timeslotDropdown.append('<option value="4PM-5PM">4PM - 5PM</option>');
                } else { // Saturday to Thursday
                    timeslotDropdown.append('<option value="12PM-1PM">12PM - 1PM</option>');
                    timeslotDropdown.append('<option value="5PM-6PM">5PM - 6PM</option>');
                }
            });
        });
    </script>
</body>
</html>
