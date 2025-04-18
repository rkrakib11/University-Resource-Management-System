<?php
include_once('main.php');

$today = date("Y-m-d");



$string = "";
$sql = "SELECT * FROM admin where name='$loged_user_name';";
$res = mysqli_query($link, $sql);
$images_dir = "../images/";
while ($row = mysqli_fetch_array($res)) {
  $picname = $row['id'];
  $string .=   "<img src='" . $images_dir . $picname . ".jpg' alt='$picname' width='150' height='150'>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Faculty Dashboard</title>
  <style>
    #faculty {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #faculty td,
    #faculty th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #faculty tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #faculty tr:hover {
      background-color: #ddd;
    }

    #faculty th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }

    body {
      height: 100%;
      background-color: #E0E0E0;
    }

    a:link,
    a:visited {
      background-color: blue;
      color: white;
      padding: 20px 30px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    a:hover,
    a:active {
      background-color: darkcyan;
    }

    img {
      border-radius: 50%;
    }

    .grid-container {
      display: grid;
      grid-template-columns: 50% 50%;
      grid-gap: 10px;
      padding: 10px;
    }

    .grid-container>div {
      text-align: center;
      font-size: 20px;
    }

    .divi {
      background-color: #64B5F6;
      padding: 5px;
      border-radius: 5px;
    }

    body {
      background-image: url("dashfac.png");
    }
  </style>
</head>

<body>
  <br>
  <center>
    <h1>Resource Management</h1>
    <?php echo $string; ?>
    <h2>Welcome <?php echo ucfirst($loged_user_name); ?></h2>
    <p id="demo"></p>

    <script>
      var d = new Date();
      document.getElementById("demo").innerHTML = d;
    </script>

    <a href="home.php">Home</a>
    <a href="logout.php">Logout</a>
  </center>

</body>