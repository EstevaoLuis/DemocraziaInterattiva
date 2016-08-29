<?php
    // controllo sessione
    if ( !isset ($_SESSION["log"]) || $_SESSION["log"] != 1) {
           header("location:forbidden.php");
    }
?>