<?php
    // disconnessione
    session_start();
    $_SESSION["log"]=0;
    session_destroy();
    header("location:index.php");
?>