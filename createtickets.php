<?php

include 'header.php';
include 'includes/db.php';
include 'includes/createtickets.inc.php';

?>

<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
    <fieldset>
    <legend>Create Bug Ticket</legend>
    <div class="labels">
        Ticket Type :<br>
        Assign To :<br>
        Priority Type :<br>
        Bug Description :<br>
    </div>
    <div class="inputs">
      <select name="ticketType">
      <option value=0></option>
      <option value=1>Development</option>
      <option value=2>Testing</option>
      <option value=3>Production</option>
    </select>
      <span class="error">* <?php echo $ticketError;?></span>
      <br>
      <select name="assignTo">
      <option value=0></option>
      <option value=1>Allan McCaffery</option>
      <option value=2>John Smith</option>
      <option value=3>Siobhan ONeill</option>
      <option value=4>Karen Jones</option>
    </select>
      <span class="error">* <?php echo $assignError;?></span>
      <br>
        <select name="priority">
        <option value=0></option>
        <option value=1>Low</option>
        <option value=2>Medium</option>
        <option value=3>High</option>
      </select>
        <span class="error">* <?php echo $priorityError;?></span>
        <br>
        <textarea name="description" rows="4" cols="50" maxlength="250"></textarea>
        <span class="error">* <?php echo $descriptionError;?></span>
    </div>
    <br><br>
    <button name="submit">Submit</button>
    </fieldset>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
