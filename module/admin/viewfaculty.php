<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Faculty List</title>
    <link rel="stylesheet" href="des.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
  
</head>
<body>
    <center>
        <h1>Faculty List</h1>
        <input type="search" id="searchBar" placeholder="Search by ID or Name...">
        <br><br>
        <table id="admin">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Hire Date</th>
                <th>Gender</th>
            </tr>
            <tbody id="facultyBody">
                <?php
                $sql = "SELECT * FROM faculty;";
                $res = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($res)) {
                    echo '<tr onclick="showDetails(this)">';
                    echo '<td class="searchable">'.$row['id'].'</td>';
                    echo '<td class="searchable">'.$row['name'].'</td>';
                    echo '<td>'.$row['password'].'</td>';
                    echo '<td>'.$row['phone'].'</td>';
                    echo '<td>'.$row['email'].'</td>';
                    echo '<td>'.$row['dob'].'</td>';
                    echo '<td>'.$row['doj'].'</td>';
                    echo '<td>'.$row['gender'].'</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </center>

    <script>
        $(document).ready(function(){
            $("#searchBar").on("keyup", function(){
                var searchText = $(this).val().toLowerCase();
                $("#facultyBody tr").filter(function(){
                    $(this).toggle($(this).find(".searchable").text().toLowerCase().indexOf(searchText) > -1);
                });
            });
        });

        function showDetails(row) {
            var cells = row.getElementsByTagName("td");
            var details = "Faculty ID: " + cells[0].innerText + "\n"
                        + "Name: " + cells[1].innerText + "\n"
                        + "Phone: " + cells[3].innerText + "\n"
                        + "Email: " + cells[4].innerText + "\n"
                        + "DOB: " + cells[5].innerText + "\n"
                        + "Hire Date: " + cells[6].innerText + "\n"
                        + "Gender: " + cells[7].innerText;
            alert(details);
        }
    </script>
</body>
</html>
