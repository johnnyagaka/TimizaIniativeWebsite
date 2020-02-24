<?php
//THIS CODE INCLUDES FUNCTIONALITES AND CLASSES FROM 'class.user.php'
include_once('person_class.php');
 // Initialize the session
session_start();

/* Check if the user is logged in, if not then redirect him to login page*/
if(!isset($_SESSION["login"]) || $_SESSION["login"] !==true) {
    header("location: admin_login.php");
    exit;
    
}
//INSTANTIATING THE OBJECT "user" of the class User which takes into account $password, $confirmpassword from the form
$person = new Person();
if (isset($_POST['submit'])) { 
    extract($_POST);   
      $person->changepass($password, $confirmpassword);
    
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
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
      <div class="nav-wrapper brown darken-2">
        <a id="top" href="admin_page.php" class="brand-logo" style="font-family:Roboto"><i class="large material-icons">arrow_back</i></a>
      </div></nav></div>

  <!--Line Separator-->
  <div class="col s12 grey lighten-3" style="height:5px"></div>

  <h4>Change Password</h4>

<!--Form-->
<div class="container">
  <div class="row">
    <form class="col s12" action="" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" name ="password" type="password" class="validate">
          <label for="first_name">New Password</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" name="confirmpassword" type="password" class="validate">
          <label for="last_name">Comfirm New Password</label>
        </div>
        <div>
          <div class="center">   
            <button class="btn waves-effect waves-light brown darken-2" type="submit" name="submit">Submit
          </button></div>
        </div>

      </div>
    </form>
  
</div></div>

    <!--JavaScript Component-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

  </body>
</html>