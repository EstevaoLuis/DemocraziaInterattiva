<?php

    include ("start_session.php");
    include ("header.php");
    // controllo parametri
    if (!isset ($_POST["cand"]))
       header("location:index.php");
    $cand=$_POST["cand"];
    // connessione db
    include("connessione.php");
    // query: ricerca per candidato
    $query="SELECT * FROM democrazia.candidati INNER JOIN democrazia.elezione
    ON candidati.ID_Elezione = elezione.ID
    WHERE candidati.User = \"".$cand.'"';
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    if (!$riga)           // Nessun risultato
    {
     echo "<p>Nessuna elezione</p>";}
    else{                 // Stampa risultati
        echo "<table border=1><th>Inizio</th><th>Fine</th><th>Carica</th><th>Voti Ricevuti</th>" ;
        while($riga){
            echo "<tr>" ;
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_inizio"])) ."</td>";
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_fine"])). "</td>"  ;
            echo "<td>". $riga["Carica_Nome"] ."</td>";
            echo "<td>". $riga["Voti_ricevuti"] ."</td>";
            echo "</tr>" ;
            $riga=mysql_fetch_array($tabella);
        }
        echo "</table>";
    }
    // chiusura db
    mysql_close($link);

    include ("footer.php");
 ?>

