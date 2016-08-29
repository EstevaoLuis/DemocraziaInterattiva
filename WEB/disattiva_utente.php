<?php

    include ("start_session.php");
    include ("controllo_sessione_admin.php");
    include ("header.php");
    include ("connessione.php");


    echo "<h1>Elenco utenti</h1>";
    // query: elenco utenti
    $query="SELECT * FROM democrazia.utente";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    // Stampa tabella con tutti gli utenti
    if (!$riga)
    {
     echo "<p>Nessun utente presente</p>";}
    else{
        echo "<table border=1><th>Nome</th><th>Cognome</th><th>User</th><th>Attiva/Disattiva</th>" ;
        while($riga){
            echo "<tr>" ;
            echo "<td>". $riga["Nome"] ."</td>";
            echo "<td>". $riga["Cognome"]. "</td>"  ;
            echo "<td>". $riga["User"] ."</td>";
            if ($riga["Banned"]==0)    // Disattiva utente
                echo "<td> <a href=\"disattiva_utente2.php?id=".$riga["User"] .'"> Disattiva </a></td>';
            else                       // Attiva utente
                echo "<td> <a href=\"disattiva_utente2.php?id=".$riga["User"] .'"> Attiva </a></td>';
            echo "</tr>" ;
            $riga=mysql_fetch_array($tabella);
        }
        echo "</table>";
    }
    // chiusura db
    mysql_close($link);
    include ("footer.php");
 ?>