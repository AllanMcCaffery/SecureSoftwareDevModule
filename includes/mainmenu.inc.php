<?php

if(isset($_POST['create'])) {
            header("Location: ./createtickets.php");
        }
        if(isset($_POST['view'])) {
            header("Location: ./viewtickets.php");
        }
