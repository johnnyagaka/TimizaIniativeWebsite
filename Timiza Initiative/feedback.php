<?php 
//THIS CODE INCLUDES FUNCTIONALITES AND CLASSES FROM 'person_class.php'
include_once("person_class.php");
//INSTANTIATING THE OBJECT "person" of the class Person
$person = new Person();
//CHECKS IF THE SUBMIT BUTTON IS CLICKED
if (isset($_POST['submit'])) {
    extract($_POST);
    $new_feedback=$person->feedback($email,$feedback);
    if ($new_feedback) {
        // Registration success
        echo "<div style='text-align:center'>Registration Successful!</div>";
    }
    else {
        // Registration Failed!
        echo "<div style='text-align:center'>Please complete all fields!</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	  <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/timiza_logo.png">
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	</head>
	
<body>
  <div>
    <nav>
      <div class="nav-wrapper black" >
        <a id="top" href="#!" class="brand-logo" style="font-family:Roboto">TIMIZA INITIATIVE</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
        <li class="brand-logo center" style="padding-top: 7px"><img width="50" hieght="50" src="img/timiza_white.png"></li>
          <li class="active">
            <a href="index.html">Home</a>
          </li>
          <li>
            <a href="about.html">About</a>
          </li>
          <li>
            <a href="volunteer.php">Volunteer</a>
          </li>
          <li>
            <a href="feedback.php">Feedback</a>
          </li>
          <li>
            <a href="donate.html">Donate</a>
          </li>
        </ul>

        <!--Side Menu-->
        <ul class="side-nav" id="mobile-demo">
          <li>
            <a href="index.html">Home</a>
          </li>
          <li>
            <a href="about.html">About</a>
          </li>
          <li>
            <a href="volunteer.php">Volunteer</a>
          </li>
          <li>
            <a href="feedback.php">Feedback</a>
          </li>
          <li>
            <a href="donate.html">Donate</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <!--Line Separator-->
  <div class="col s12 grey lighten-3" style="height:5px"></div>

  <h4>Provide Your Feedback Here</h4>

  <!--flow text-->
  <p class="flow-text center-align">We Would Love To Hear From You</p>

<!--Feedback-->
<div class="container">
    <form class="col s6" action="" method="post">
      <div class="center">
      <div class="input-field col s6" >
          <input id="email" name="email" type="email" class="validate">
          <label for="email" style="text-align: center">Type Your Email Here</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" name="feedback" class="materialize-textarea" data-length="200"></textarea><label for="icon_prefix2">Message</label>
        </div>
        </div>
      <div>
          <div class="center">   
            <button class="btn waves-effect waves-light grey darken-4" type="submit" name="submit">Submit
          </button></div>    
        </div>
    </form>
  </div>

    <!--JavaScript Component-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>$(".button-collapse").sideNav();</script>

  </body>
</html>


