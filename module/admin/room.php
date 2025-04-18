<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Manage Rooms</title>
    <link rel="stylesheet" href="des.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <center>
        <h2>Manage Rooms</h2>
        <input type="search" id="searchBar" placeholder="Search by Room Number or type...">
        <br><br>
        <table id="admin">
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
                        <a href="deleteroom.php?number=' . $row['number'] . '" onclick="return confirm(\'Are you sure you want to delete this room?\');">
                            <button>Delete</button>
                        </a>
                        <a href="editroom.php?number=' . $row['number'] . '">
                            <button>Edit</button>
                        </a>
                        <a href="checkroom.php?number=' . $row['number'] . '">
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
