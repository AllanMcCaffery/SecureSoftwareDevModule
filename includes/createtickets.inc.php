<?php

$ticketError = $assignError = $descriptionError = "";
$priorityError = "";
$ticketType = $assignTo = $priority = "";
$statusType = $description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $valid = true;
  $ticketType = mysqli_real_escape_string($conn, $_POST["ticketType"]);
  $assignTo = mysqli_real_escape_string($conn, $_POST["assignTo"]);
  $priority = mysqli_real_escape_string($conn, $_POST["priority"]);
  $description = mysqli_real_escape_string($conn, $_POST["description"]);

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($ticketType == 0) {
    $ticketError = "Ticket type required";
    $valid = false;
  }
  if ($assignTo == 0) {
    $assignError = "Assign To required";
    $valid = false;
  }
  if ($priority == 0) {
    $priorityError = "Priority required";
    $valid = false;
  }
  if (strlen($description) < 1 || strlen($description) > 250) {
    $descriptionError = "Description upto 250 characters required";
    $valid = false;
  }

  if ($valid) {
    authenticate($conn, $ticketType, $assignTo, $priority, $description);
  }

}

function authenticate($conn, $ticketType, $assignTo, $priority, $description)
{

  $createdBy = mysqli_real_escape_string($conn, $_SESSION['userid']);
$sql = "insert into tickets (ticketTypeID, createdBy, assignedTo, description,
        priorityID) VALUES (?, ?, ?, ?, ?);";
$statement = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($statement, $sql))
{
	//binds the parameters (s declares the value in SQL query (?) is a string)
	mysqli_stmt_bind_param($statement, "isssi", $ticketType, $createdBy, $assignTo, $description, $priority);
	mysqli_stmt_execute($statement);
	} else {
          echo "SQL Failure";
        }
}
