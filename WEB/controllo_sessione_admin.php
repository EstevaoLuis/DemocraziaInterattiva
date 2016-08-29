<?php
    // controllo sessione admin
    if ( !isset ($_SESSION["log"]) || $_SESSION["log"] != 1 || $_SESSION["admin"]!=1) {
           header("location:forbidden.php");
    }
?>