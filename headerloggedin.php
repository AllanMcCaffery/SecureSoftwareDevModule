<?php
session_start();

if (!isset($_SESSION['loggedInUser'])) {
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ticketing System</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<ul>
			<li><a href="mainmenu.php">Main Menu</a></li>
			<li><a href="createtickets.php">Create Ticket</a></li>
			<li><a href="viewtickets.php">View Tickets</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
	</nav>
</header>
