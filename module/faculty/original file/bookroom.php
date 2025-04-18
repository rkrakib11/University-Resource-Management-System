<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Book Room</title>
    <link rel="stylesheet" href="des.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <br/>
    <center>
        <h2>Book Room</h2>
        <input type="search" id="searchBar" placeholder="Search by Room Number or type...">
        <br><br>
        <table id="faculty">
            <tr>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
            <tbody id="roomBody">
                <?php
                $sql = "SELECT * FROM room;";
                $res = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($res)) {
                    echo '<tr>';
                    echo '<td>' . $row['number'] . '</td>';
                    echo '<td>' . $row['type'] . '</td>';
                    echo '<td>' . $row['location'] . '</td>';
                    echo '<td>
                        <a href="booking.php?number=' . $row['number'] . '">
                            <button>Check Availability</button>
                        </a>
                    </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </center>

    <script>
        $(document).ready(function() {
            $("#searchBar").on("keyup", function() {
                var searchText = $(this).val().toLowerCase();
                $("#roomBody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
                });
            });
        });
    </script>
</body>

</html>
