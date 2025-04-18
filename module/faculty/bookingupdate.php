<?php
include_once('main.php');
include_once('../../service/AppSettings.php');

// Get DB connection
$appSettings = AppSettings::getInstance();
$link = $appSettings->link;

// Get the currently logged-in faculty's ID from session
$facultyID = $_SESSION['login_id']; // This assumes you saved faculty ID during login

// Fetch only that faculty's reports
$sql = "SELECT * FROM `quicknotifications` WHERE facultyID= '$facultyID'  ORDER BY sendingtime DESC";
$res = mysqli_query($link, $sql);

$string = "";
while ($row = mysqli_fetch_array($res)) {
    $string .= '<tr>
                    <td>' . $row['Notice'] . '</td>
                    
                </tr>';
}
?>

<html>
<head>
    <link rel="stylesheet" href="des.css">
</head>
<body>
    <br/>
    <center>
        <h2>Latest Notification on Booking Room:</h2>
        <table border="1" id='faculty'>
            <tr>
                
            </tr>
            <?php echo $string; ?>
        </table>
    </center>
</body>
</html>
