<?php

$ticketError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
		$ticketID = mysqli_real_escape_string($conn, $_POST["ticketIDfield"]);

    if (!is_numeric($ticketID)) {
      $ticketError = "Please enter a number";
    } else {
      {
        getComments($conn, $ticketID);
      }
    }
}

function clean($data)
{
  $data = trim($data, "<>");
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
	return $data;
}

function getComments($conn, $ticketID)
{

$sql = "select * from comments where ticketID = ?;";
$statement = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($statement, $sql))
{
	//binds the parameters (s declares the value in SQL query (?) is a string)
	mysqli_stmt_bind_param($statement, "i", $ticketID);
	mysqli_stmt_execute($statement);
	$result = mysqli_stmt_get_result($statement);
	$resultcheck = mysqli_num_rows($result);

	if ($resultcheck > 0)
		{
      echo "<form method='post' action=''";
      echo "<div id='scrolltable'><table class='viewComments'>";
      echo "<tr><th>Ticket Number</th>
                <th>Comment Number</th>
                <th>Date Added</th>
                <th>Comment</th>
            </tr>";
      while($row = mysqli_fetch_assoc($result))
        {
          echo "<tr><td>" . clean($row['ticketID']) . "</td><td>" . clean($row['commentID']) . "</td><td>" . clean($row['dateAdded']) . "</td><td>" . clean($row['comment']) . "</td>
                </tr>";
        }
  echo "</table>";
  echo "<form>";
} else { echo "No Tickets Found";}
	} else {
          echo "SQL Failure";
        }
}


 ?>
