<?php
	session_start();

include_once 'includes/db.php';

$userError = $passError = "";
$name = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["user"])) {
    $userError = "Username is required";
  } elseif
		(strlen($_POST["user"]) < 8) {
			$userError = "Username must be 8-20 characters";
		} else {
    $name = mysqli_real_escape_string($conn, $_POST["user"]);
  }
	  if (empty($_POST["pass"])) {
    $passError = "Password is required";
  } elseif
		(strlen($_POST["pass"]) < 8) {
			$passError = "Password must be 8-20 characters";
		} else {
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
		authentice($conn, $name);
		// $pass = hashPassword($pass);
  }
}

function hashPassword($inputPass) {
	$hashedPass = password_hash($inputPass, PASSWORD_DEFAULT);
	return $hashedPass;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function authentice($conn, $name) {

$sql = "select * from users where username = ?;";
$statement = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($statement, $sql))
{
	//binds the parameters (s declares the value in SQL query (?) is a string)
	mysqli_stmt_bind_param($statement, "s", $name);
	mysqli_stmt_execute($statement);
	$result = mysqli_stmt_get_result($statement);
	$resultcheck = mysqli_num_rows($result);

	if ($resultcheck > 0)
		{
			$_SESSION['loggedInUser'] = $name;
			$_SESSION['loggedIn'] = true;
		header("Location: ./tickets.php");
		} else
			{
				echo "Login Failed";
			}
} else
	{
		echo "SQL Failure";
	}
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span class="error">* required field</span>
<br><br>
	Username :
	<input type="text" name="user" placeholder ="Enter Username">
	<span class="error">* <?php echo $userError;?></span>
	<br>
	Password :
	<input type="password" name="pass" placeholder ="Enter Password">
	<span class="error">* <?php echo $passError;?></span>
	<br>
	<button name="submit">Submit</button>
	<br>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
