<?php
session_start();

include 'includes/db.php';

if (isset($_SESSION['loggedIn']) != true) {
	header ("Location: logout.php");

}

	$timeoutTime = 1440;

	if(isset($_SESSION['last_action'])){
	    $Inactive = time() - $_SESSION['last_action'];
	    if($Inactive >= $timeoutTime){
				session_unset();
        session_destroy();
				header ("Location: index.php");
	    }
	}

$_SESSION['last_action'] = time();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ticketing System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Bug Ticketing System</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="mainmenu.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="createtickets.php">Create Ticket</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="viewtickets.php">View Tickets</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="createComments.php">Create Comments</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="recordComments.php">View Comments</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="logout.php">Log Out</a>
	      </li>
	    </ul>
	  </div>
	</nav>

</header>
