<?php
    // controlli sessione + header
    include ("start_session.php");
    include ("controllo_sessione_admin.php");
    include ("header.php");
    include ("connessione.php");


    echo "<h1>Attivata funzione per il rinnovo automatico</h1>";
    // chiama procedura per il rinnovo automatico
    $query="SELECT rinnovo_automatico() AS R;";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    if (!$riga)
    {
     echo "<p> Errore </p>";}
    else{     // Output: Numero nuove elezioni indette
        echo "<p> Create ".$riga["R"]." nuove elezioni";
    }

    mysql_close($link);
    include ("footer.php");
 ?>