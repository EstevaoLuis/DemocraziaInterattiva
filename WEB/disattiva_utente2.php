<?php
    // controllo sessione admin
    include ("start_session.php");
    include ("controllo_sessione_admin.php");
    // controllo parametri
    if (!isset ($_GET["id"]))
           header("location:index.php");
    $user=$_GET["id"];
    // connessione db
    include("connessione.php");
    // procedura per attivare/disattivare un utente
    $query="CALL attiva_disattiva_utente('".$user."');";
    $tabella=mysql_query($query) or die (mysql_error());
    // chiusura db
    mysql_close($link);
    // torna alla pagina precedente
    header("location:disattiva_utente.php");
 ?>