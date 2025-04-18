<?php
    include_once('main.php');
    include_once('../../service/mysqlcon.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Faculty</title>
    <link rel="stylesheet" href="des.css">
    <style>
        div {
            width: 70%;
            border-radius: 5px;
            background-color: #4DD0E1;
            padding: 20px;
            margin: auto;
        }
        input[type=submit] {
            width: 20%;
            background-color: #1231aa;
            color: white;
            padding: 14px 20px;
            margin: auto;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            text-align: center;
        }
        input[type=submit]:hover {
            background-color: mediumslateblue;
            transition: background-color 0.8s;
        }
    </style>
</head>
<body>
    <center><h1>Add Faculty</h1></center>
    
    <form action="#" method="post" enctype="multipart/form-data">
        <div>
            Enter Faculty ID: 
            <input type="text" placeholder="Enter Faculty ID" name="fid" required>
            Enter Faculty Name: 
            <input type="text" placeholder="Enter Faculty Name" name="fname" required>
            Enter Password: 
            <input type="text" placeholder="Enter Password" name="fpass" required>
            Enter Phone No: 
            <input type="text" placeholder="Enter Phone no." name="fphno" required>
            Enter Email ID: 
            <input type="text" placeholder="Enter Email ID" name="femail" required>

            Enter Date of Birth: 
            <input type="date" name="fdob" required>
            Enter Date of Joining: 
            <input type="date" name="fdoj" required>
            Select Gender:
            <select name="fgender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select>
            <br><br>
            <input id="submit" type="submit" name="submit" value="Submit">
        </div>
    </form>
</body>
</html>

<?php
if (!empty($_POST['submit'])) {
    $facID = mysqli_real_escape_string($link, $_POST['fid']);
    $facName = mysqli_real_escape_string($link, $_POST['fname']);
    $facPass = mysqli_real_escape_string($link, $_POST['fpass']);
    $facPhone = mysqli_real_escape_string($link, $_POST['fphno']);
    $facEmail = mysqli_real_escape_string($link, $_POST['femail']);
    $facDOB = mysqli_real_escape_string($link, $_POST['fdob']);
    $facDOJ = mysqli_real_escape_string($link, $_POST['fdoj']);
    $facGender = mysqli_real_escape_string($link, $_POST['fgender']);
    
   
    $checkQuery = "SELECT * FROM faculty WHERE id='$facID' OR email='$facEmail'";
    $checkResult = mysqli_query($link, $checkQuery);
    
    if (mysqli_num_rows($checkResult) > 0) {
        echo '<script>alert("Faculty ID or Email already exists. Please use a different one.");</script>';
    } else {
        // Insert into faculty table
        $sql = "INSERT INTO faculty (id, name, password, phone, email, dob, doj, gender) VALUES ('$facID', '$facName', '$facPass', '$facPhone', '$facEmail', '$facDOB', '$facDOJ', '$facGender')";
        
        if (mysqli_query($link, $sql)) {
            // Insert into users table
            $sql1 = "INSERT INTO users (userid, password, usertype) VALUES ('$facID', '$facPass', 'faculty')";
            
            if (mysqli_query($link, $sql1)) {
                echo '<script>alert("Data Entered Successfully! Faculty ID: ' .$facID. '");</script>';
            } 
            else {
                echo '<script>alert("Error inserting into users table: ' . mysqli_error($link) . '");</script>';
            }

        } 
        else {
            echo '<script>alert("Error inserting into faculty table: ' . mysqli_error($link) . '");</script>';
        }
    }
}
?>
