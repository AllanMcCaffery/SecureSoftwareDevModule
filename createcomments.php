<?php

include 'header.php';
include 'includes/db.php';
include 'includes/createcomments.inc.php';

 ?>

 <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <div class="col-sm-3 my-1">
     <label for="ticketLabel">Ticket Number</label>
     <input type="text" name="ticketIDfield" class="form-control" id="ticketIDfield" aria-describedby="emailHelp">
     <span class="error">* <?php echo $ticketError;?></span>
     <br>
     <label for="commentLabel">Comment</label>
     <textarea class="form-control" rows="5" name="commentarea" id="commentarea" class="form-control" id="commentfield" aria-describedby="emailHelp"></textarea>
     <span class="error">* <?php echo $commentError;?></span>
   </div>
   <button type="submit" class="btn btn-primary">Submit</button>
   <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
 </form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
