<?php
include_once('person_class.php');
 // Initialize the session
session_start();

/* Check if the user is logged in, if not then redirect him to login page*/
if(!isset($_SESSION["login"]) || $_SESSION["login"] !==true) {
    header("location: admin_login.php");
    exit;
    
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Page</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="img/timiza_logo.png">
</head>

<body>
  <div>
    <nav>
      <div class="nav-wrapper brown darken-2" >
        <a id="top" href="admin_page.php" class="brand-logo" style="font-family:Roboto">TIMIZA INITIATIVE</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
        <li class="brand-logo center" style="padding-top: 7px"><img width="50" hieght="50" src="img/timiza_white.png"></li>
          <li class="active">
            <a href="index.html">Home Page</a>
          </li>
          <li>
            <a href="view_volunteers.php">View Volunteers</a>
          </li>
          <li>
            <a href="view_feedback.php"> View Feedback</a>
          </li>
          <li>
            <a href="changepass.php"> Change Password</a>
          </li>
          <li>
            <a href="logout.php"> Logout</a>
          </li>
        </ul>

        <!--Side Menu-->
        <ul class="side-nav" id="mobile-demo">
          <li>
            <a href="index.html">Home Page</a>
          </li>
          <li>
            <a href="view_volunteers.php">View Volunteers</a>
          </li>
		<li>
            <a href="view_feedback.php">View Feedback</a>
          </li>
          <li>
            <a href="changepass.php">Change Password</a>
          </li>
          <li>
            <a href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <!--Line Separator-->
  <div class="col s12 grey lighten-3" style="height:5px"></div><br>

  <!--Timiza Logo-->
  <img src="img/timiza_logo.png" alt="Timiza Logo" style=" display: block;
  margin-left: auto; margin-right: auto;padding-top: 50px">

  <!--JavaScript Component-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script>$(".button-collapse").sideNav();</script>
  <!--Parallax Function-->
  <script>   $(document).ready(function () {
      $('.parallax').parallax();
    });</script>

  </body>
</html>




