<?php
include_once('main.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Admin Tools</title>
  <link rel="stylesheet" href="des.css">
  <style>
    body {
      background-color: black;
    }

    .column {
      width: 45%;

    }

    .nav {
      width: auto;

      font-family: Arial, Helvetica, sans-serif;

    }
    .rw{
      width: 65%;
      padding: 10px;
      text-align: center;
      margin: auto;
    }



    .main {
      width: 50%;
      margin: auto;
    }

    .main a:hover{
      background-color: cadetblue;
      color: black;
    }


    h1 {
      color: aqua;
    }

    h2 {
      color: bisque
    }
  </style>
</head>

<body>

  <div class="row">
    <div class="column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="column">

      <br>
      <h2>Admin Tools</h2>
    </div>
  </div>

  <div class="nav">

    <center>
     
      <a href="home.php">Home</a>

      <a href="logout.php">Logout</a>
    </center>
  </div>
  <br><br><br>
  <div class="rw">

    <div class="main">
      <center>
        <a class="active" href="addfaculty.php" target="iframe_a" style="background-color:mediumaquamarine;">Add Faculty</a>
        <a class="active" href="viewfaculty.php" target="iframe_a" style="background-color:mediumaquamarine;">View Faculties</a>
        <a class="active" href="deletefaculty.php" target="iframe_a" style="background-color:mediumaquamarine;">Remove Faculty</a>
        <a class="active" href="addroom.php" target="iframe_a" style="background-color:mediumaquamarine;">Add Room</a>
        <a class="active" href="addimpdates.php" target="iframe_a" style="background-color:mediumaquamarine;">Add Dates</a>
      </center>
      <br>
      <iframe height="500px" width="100%" name="iframe_a" src="addfaculty.php"></iframe>
    </div>
  </div>
  </div>

</body>