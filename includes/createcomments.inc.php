<?php
$commentError = $ticketError = "";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $valid = "true";
  $ticketType = mysqli_real_escape_string($conn, $_POST["ticketIDfield"]);
  $comment = mysqli_real_escape_string($conn, $_POST["commentarea"]);


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($ticketType == 0) {
    $ticketError = "Ticket ID required";
    $valid = false;
  }
  if (strlen($comment) == 0) {
    $commentError = "Description Required";
    $valid = false;
  }

  if ($valid) {
    addComment($conn, $ticketType, $comment);
  }
}
  function addComment($conn, $ticketType, $comment)
  {

    $createdBy = mysqli_real_escape_string($conn, $_SESSION['userid']);
  $sql = "insert into comments (comment, ticketID) VALUES (?, ?);";
  $statement = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($statement, $sql))
  {
  	//binds the parameters (s declares the value in SQL query (?) is a string)
  	mysqli_stmt_bind_param($statement, "si", $comment, $ticketType);
  	mysqli_stmt_execute($statement);
    echo "Submission Successful";
  	} else {
            echo "SQL Failure";
          }
  }
?>
