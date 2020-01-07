<?php

function clean($data)
{
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
	return $data;
}

function statusValue($status, $ticket) {
  if ($status == "open")
  {
    return "<a class='dropdown-item' value='2|" . $ticket . "' href='password.php'>Resolved</a><a class='dropdown-item' value='3|" . $ticket . "' href=#'>Closed</a>";
  } elseif ($status == "resolved")
  {
    return "<a class='dropdown-item' value='1|" . $ticket . "' href=''>open</a><a class='dropdown-item' value='3|" . $ticket . "' href=#'>closed</a>";
  }
  return "<a class='dropdown-item' value='1|" . $ticket . "' href='#'>open</a>";
}

function viewComments() {
  header("Location: ./recordComments.php");
}

$sql = "select * FROM viewtickets ORDER BY ticketID ASC;";
$statement = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($statement, $sql))
{
	mysqli_stmt_execute($statement);
	$result = mysqli_stmt_get_result($statement);
	$resultcheck = mysqli_num_rows($result);

	if ($resultcheck > 0)
		{	
      echo "<form method='post' action=''";
			echo "<div id='scrolltable'><table class='viewticketstable'>";
			echo "<tr><th>Ticket Number</th>
								<th>Ticket Type</th>
								<th>Description</th>
								<th>Created By</th>
								<th>Date Created</th>
								<th>Status</th>
								<th>Priority</th>
						</tr>";
      while($row = mysqli_fetch_assoc($result))
        {
					echo "<tr><td>" . clean($row['ticketID']) . "</td><td>" . clean($row['ticketType']) . "</td><td>" . clean($row['description']) . "</td>
										<td>" . clean($row['CreatedBy']) . "</td><td>" . clean($row['dateCreated']) . "</td>
										<td>" . clean($row['statusName']) . "</td><td>" . clean($row['priorityName']) ."</td>
                    <td><div class='dropdown'>
                    <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Change Status</button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" . statusValue(clean($row['statusName']), clean($row['ticketID'])) .
                    "</div></div></td>
                    <td><button type='submit' value='" . clean($row['ticketID']) . "' formaction='' class='btn btn-outline-primary'>View Comments</button></td>
								</tr>";
        }
	echo "</table>";
  echo "<form>";
    } else
      {
        "No Tickets";
      }
    }
    else {
          echo "SQL Failure";
        }

?>
