<?php
    include ("start_session.php");
    include ("controllo_sessione.php");
    // controllo variabili
    if (!isset ($_GET["id"]))
           header("location:index.php");
    $id=$_GET["id"];
    if (!isset ($_GET["cand"]))
           header("location:index.php");
    $cand=$_GET["cand"];
    // connessione
    include("connessione.php");
    // vota
    $query="CALL vota('".$_SESSION["usr"]."',".$id.",'".$cand."');";
    $tabella=mysql_query($query) or die (mysql_error());

    mysql_close($link);
    header("location:elezioni.php");
 ?>