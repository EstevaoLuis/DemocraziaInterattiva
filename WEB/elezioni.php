<?php

    include ("start_session.php");
    include ("header.php");

    echo "<h1> Elezioni in corso </h1>" ;
    // verifico se c'è un utente loggato
    $log=0;
    if (isset($_SESSION["log"]) && $_SESSION["log"]==1)
        $log=1;
    // connessione menu
    include("connessione.php");
    // query: elenco elezioni in corso
    $query="SELECT elezione.*, COUNT(User) AS Tot_voti
    FROM democrazia.elezione LEFT JOIN democrazia.voti
    ON elezione.ID  = voti.ID_Elezione
    WHERE Data_inizio < CURDATE() AND Data_fine > CURDATE()
    GROUP BY ID;";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    if (!$riga)             // Nessun risultato
    {
     echo "<p>Nessuna elezione in corso</p>";}
    else{                   // Risultati
        if ($log==1)        // Un utente loggato avrà la possibilità di votare
            echo "<table border=1><th>Inizio</th><th>Fine</th><th>Carica</th><th>Votanti</th><th>Vota</th>" ;
        else
            echo "<table border=1><th>Inizio</th><th>Fine</th><th>Carica</th><th>Votanti</th>" ;
        while($riga){
            echo "<tr>" ;
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_inizio"])) ."</td>";
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_fine"])). "</td>"  ;
            echo "<td>". $riga["Carica_Nome"] ."</td>";
            echo "<td>". $riga["Tot_voti"] ."</td>";
            if ($log==1)    // Un utente loggato avrà la possibilità di votare
                echo "<td> <a href=\"vota.php?id=".$riga["ID"] .'"> Vota </a></td>';
            echo "</tr>" ;
            $riga=mysql_fetch_array($tabella);
        }
        echo "</table>";
    }
    // chiusura db
    mysql_close($link);

    include ("footer.php");
 ?>

