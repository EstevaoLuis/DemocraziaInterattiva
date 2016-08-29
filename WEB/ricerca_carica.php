<?php

    include ("start_session.php");
    include ("header.php");
    // controllo parametri
    if (!isset ($_POST["carica"]))
       header("location:index.php");
    $carica=$_POST["carica"];
    // connessione db
    include("connessione.php");
    // query: ricerca cariche
    $query="SELECT * FROM cariche_detenute
    WHERE Carica_Nome = \"".$carica.'"';
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    if (!$riga)     // Nessun risultato
    {
     echo "<p>Nessuna elezione</p>";
     }
    else{           // Stampa risultati
        echo "<table border=1><th>Inizio</th><th>Nome</th><th>Cognome</th><th>Voti Ricevuti</th>" ;
        while($riga){
            echo "<tr>" ;
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_fine"])). "</td>"  ;
            echo "<td>". $riga["Nome"] ."</td>";
            echo "<td>". $riga["Cognome"] ."</td>";
            echo "<td>". $riga["Tot_voti"] ."</td>";
            echo "</tr>" ;
            $riga=mysql_fetch_array($tabella);
        }
        echo "</table>";
    }
    // chiusura db
    mysql_close($link);

    include ("footer.php");
 ?>

