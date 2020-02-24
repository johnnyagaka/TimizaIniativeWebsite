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
	<title>Volunteer List</title>
	  <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/timiza_logo.png">
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <style>
            #tableItems {
              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            #tableItems td, #tableItems th {
              border: 1px solid #ddd;
              padding: 8px;
            }

            #tableItems tr:nth-child(even){background-color: #f2f2f2;}

            #tableItems tr:hover {background-color: #ddd;}

            #tableItems th {
              padding-top: 12px;
              padding-bottom: 12px;
              text-align: center;
              background-color: #827717;
              color: white;
            }
        </style>
	</head>
	
<body>
  <div>
    <nav>
      <div class="nav-wrapper brown darken-2">
        <a id="top" href="admin_page.php" class="brand-logo" style="font-family:Roboto"></a><li class="brand-logo center" style="font-family:Roboto">Volunteer List</li><br>
      </div></nav></div>
      <div class="container" style="padding-top: 25px">
        <table class="striped highlight" id="tableItems">
            <tr>
               <thread>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>GENDER</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                </thread> 
            </tr>

            <?php

        //connecting to a database
        $dbase = mysqli_connect("localhost","root","","timiza") or  
        die("Error encountered while trying to connect to MySQL");

        //Querying a database
        $dbquery = "SELECT * FROM person";
        mysqli_query($dbase, $dbquery) or die("Error Querying");

        //getting results
        $result = mysqli_query($dbase, $dbquery); 

        if($result->num_rows>0){
        //$row = $result->fetch_assoc())
		    while($row = $result->fetch_assoc()){

                echo "<tr><td>" . $row["FName"]. "</td><td>" . $row["LName"]. 
                "</td><td>" . $row["gender"].  "</td><td>" . $row["phone"]. "</td><td>".
                $row["email"]. "</td><tr>";
                  }  
            }

        //Closing database
        mysqli_close($dbase);
        ?>
        </table></div>



    <!--JavaScript Component-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

  </body>
</html>