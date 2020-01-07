<?php
include 'includes/db.php';
include 'includes/index.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
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
		        <a class="nav-link" href="logout.php">Log Out</a>
		      </li>
		    </ul>
		  </div>
		</nav>
</header>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span class="error">* required field</span>
<br><br>
	Username :
	<input type="text" name="username" placeholder ="Enter Username" autocomplete=”off” autofocus>
	<span class="error">* <?php echo $userError;?></span>
	<br>
	Password :
	<input type="password" name="password" placeholder ="Enter Password" autocomplete=”off”>
	<span class="error">* <?php echo $passError;?></span>
	<br>
	<button name="submit">Submit</button>
	<br><br>

</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
