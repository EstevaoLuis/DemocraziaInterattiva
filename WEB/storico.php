<?php

    include ("start_session.php");
    include ("header.php");

    echo "<h1> Storico elezioni </h1>" ;
    // connessione db
    include("connessione.php");
    // query: storico elezioni
    $query="SELECT elezione.*, COUNT(User) AS Tot_voti
    FROM democrazia.elezione LEFT JOIN democrazia.voti
    ON elezione.ID  = voti.ID_Elezione
    WHERE Data_fine < CURDATE()
    GROUP BY ID
    ORDER BY Data_fine DESC;";

    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    if (!$riga) // Nessuna elezione
    {
     echo "<p>Nessuna elezione nello storico </p>";}
    else{       // Elenco elezioni
        echo "<table border=1><th>Inizio</th><th>Fine</th><th>Carica</th><th>Votanti</th><th>Classifica</th>" ;
        while($riga){
            echo "<tr>" ;
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_inizio"])) ."</td>";
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_fine"])). "</td>"  ;
            echo "<td>". $riga["Carica_Nome"] ."</td>";
            echo "<td>". $riga["Tot_voti"] ."</td>";
            echo "<td> <a href=\"classifica.php?id=".$riga["ID"] .'"> Classifica </a></td>';
            echo "</tr>" ;
            $riga=mysql_fetch_array($tabella);
        }
        echo "</table>";
    }

    mysql_close($link);

    include ("footer.php");
 ?>