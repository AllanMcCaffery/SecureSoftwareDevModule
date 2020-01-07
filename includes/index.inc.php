<?php
session_start();
$userError = $passError = $loginError = "";
$name = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

		$name = mysqli_real_escape_string($conn, $_POST["username"]);
		$pass = mysqli_real_escape_string($conn, $_POST["password"]);

    if (strlen($name) < 8 || strlen($name) > 20) {
      $userError = "Username must be 8-20 characters";
    }

    elseif (strlen($pass) < 8 || strlen($pass) > 20) {
    	$passError = "Password must be 8-20 characters";
    }
    else
    {
      authenticate($conn, $name, $pass);
    }
}


function compareHash($pass, $dbpass) {
	return password_verify($pass, $dbpass);
}


function authenticate($conn, $name, $pass)
{

$sql = "select * from users WHERE username = ? AND enabled = ?;";
$statement = mysqli_stmt_init($conn);
$enabled = 1;
if (mysqli_stmt_prepare($statement, $sql))
{
	//binds the parameters (s declares the value in SQL query (?) is a string)
	mysqli_stmt_bind_param($statement, "si", $name, $enabled);
	mysqli_stmt_execute($statement);
	$result = mysqli_stmt_get_result($statement);
	$resultcheck = mysqli_num_rows($result);

	if ($resultcheck > 0)
		{	$row = mysqli_fetch_assoc($result);
			$dbpass = $row['password'];
			if (compareHash($pass, $dbpass))
      { $_SESSION['loggedInUser'] = $name;
				$_SESSION['userid'] = $row['userID'];
				$_SESSION['loggedIn'] = true;
        header("Location: ./mainmenu.php");
				mysqli_close($conn);
			}
    } echo "Login Failed";
	} else {
          echo "SQL Failure";
        }
}
