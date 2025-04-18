<?php
include_once('main.php');
$string = "";
$sql = "SELECT * FROM faculty where id='$loged_user_id';";
$sql = "SELECT * FROM faculty where name='$loged_user_name';";
$res = mysqli_query($link, $sql);


?>
<!DOCTYPE html>
<html>

<head>
  <title>Faculty Home Page</title>
  <style>
    h1 {
      text-shadow: 0 0 3px #FF0000;
    }

    h2{
      width: 25%;
      background-color:lightsalmon;
      padding: 10px 15px;
      margin: auto auto;
      border: none;
      border-radius: 10px;
   }



    body {
      font-family: Arial;
      padding: 10px;
      background: black;
    }

    /* Header/Blog Title */
    .header {
      padding: 30px;
      text-align: center;
      background: black;
    }

    .header h1 {
      font-size: 50px;
      color: cyan;
    }

    /* Style the top navigation bar */
    .topnav {
      width: fit-content;
      overflow: hidden;
      background-color: #333;
      margin: auto;
    }

    .logout {
      background-color:thistle;

      overflow: hidden;
      width: 8%;
      border-radius: 20px;
      margin: 30px auto;
      display: flex;
      justify-content: center;

    }

    .logout a:hover {
      color: khaki;
      transition: color 0.8s;
    }


    /* Style the topnav links */
    .topnav a {
      color: #f2f2f2;
    }

    /* Change color on hover */
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    

    .na a:hover{
      background-color: cadetblue;
      color: black;
    }

    /* Create two unequal columns that floats next to each other */
    /* Left column */
    .leftcolumn {
      float: left;
      width: 75%;
    }

    /* Right column */
    .rightcolumn {
      float: left;
      width: 25%;
      background-color: #f1f1f1;
      padding-left: 20px;
    }

    /* Fake image */
    .fakeimg {
      background-color: #aaa;
      width: 100%;
      padding: 20px;
    }

    /* Add a card effect for articles */
    .card {
      background-color: white;
      padding: 30px;
      margin-top: 20px;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      padding: 0 16px;
      width: 75%;
      justify-content: center;
      margin: auto;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Footer */
    .footer {
      padding: 20px;
      text-align: center;
      background: #ddd;
      margin-top: 20px;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 800px) {

      .leftcolumn,
      .rightcolumn {
        width: 100%;
        padding: 0;
      }
    }

    /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
    @media screen and (max-width: 400px) {
      .topnav a {
        float: none;
        width: 100%;
      }
    }

    a {
      float: left;
      display: block;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <div class="header">
    <center>
      <table>
        <tr>

          <th>
            <h1>Faculty Home Page</h1>
          </th>
        </tr>
      </table>
    </center>
  </div>

  <div class="topnav">
    <a href="index.php">Dashboard</a>
    <a href="changepw.php">Change Password</a>
    <a href="feedback.php">Send Feedback</a>

  </div>



  <div class="row">
    <div class="leftcolumn">
      <div class="card">
        <center>
          <h2>Quick Navigation</h2>
        </center>
       </br>
        <center>
          <div class="na">
          <a href="viewbooking.php" target="iframe_a">View Bookings</a>
          <a href="bookroom.php" target="iframe_a" >Book Room</a>
          <a href="report.php" target="iframe_a">Inbox</a>
          <a href="announcements.php" target="iframe_a">Announcement</a>
          </div>

        </center>
        <iframe height="300px" width="100%" name="iframe_a" src="viewbooking.php"></iframe>
      </div>

    </div>

  </div>

  <div class="logout">
    <a href="logout.php">Logout</a>
  </div>


</body>

</html>