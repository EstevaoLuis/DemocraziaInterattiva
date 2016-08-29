<?php

    include ("start_session.php");
    include ("header.php");
    // connessione db
    include ("connessione.php");

    echo "<h1>Elezioni con candidature aperte</h1>";
    // variabile che indicherà se l'utente è di tipo candidato
    $cand=1;
    // controllo se un utente è loggato
    if ( !isset ($_SESSION["log"]) || $_SESSION["log"] != 1) {
        echo '<p class="red">Non hai il permesso per candidarti</p>';
        echo "<p>Non sei registrato</p>";
        $cand=0;
    }
    else
    {       // controllo se l'utente ha il permesso di candidarsi
      if ($_SESSION["cand"]!= 1){
        echo '<p class="red">Non hai il permesso per candidarti</p>';
        $cand=0;
      }
      else    // l'utente ha il permesso per candidarsi, ma bisogna effettuare altri controlli
      {
              // controllo se l'utente ha già una candidatura attiva
              $query="SELECT *
              FROM candidati INNER JOIN elezione
              ON candidati.ID_Elezione = elezione.ID
              WHERE Data_fine > CURDATE()
              AND User = '".$_SESSION["usr"]."';";
              $tabella=mysql_query($query) or die (mysql_error());
              $riga=mysql_fetch_array($tabella);
              if ($riga)
              {
                  echo "<p class=\"red\">Hai gia' una candidatura attiva.</p>";
                  echo "<p>Non puoi candidarti ad una nuova elezione.</p>";
                  $cand=0;
              }
              else
              {
                  // controllo se l'utente detiene già una carica
                  $query="SELECT *
                  FROM candidati, elezione, carica
                  WHERE candidati.ID_Elezione = elezione.ID
                  AND carica.Nome = elezione.Carica_Nome
                  AND DATE_ADD(Data_fine, INTERVAL Durata YEAR)  > CURDATE()
                  AND User = '".$_SESSION["usr"]."';";
                  $tabella=mysql_query($query) or die (mysql_error());
                  $riga=mysql_fetch_array($tabella);
                  if ($riga)
                  {
                     echo "<p class=\"red\">Detieni gia' una carica.</p>";
                     echo "<p>Non puoi candidarti ad una nuova elezione.</p>";
                     $cand=0;
                  }
              }
        }
    }

    // query: elenco elezioni in cui ci si può candidare
    $query="SELECT * FROM democrazia.elezione
    WHERE Data_inizio > CURDATE()";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    // Visualizzazione elenco elezioni
    if (!$riga)
    {
     echo "<p>Nessuna elezione in corso</p>";
    }
    else{
        if ($cand==1)
            echo "<table border=1><th>Inizio</th><th>Fine</th><th>Carica</th><th>Candidati</th>" ;
        else
            echo "<table border=1><th>Inizio</th><th>Fine</th><th>Carica</th>" ;
        while($riga){
            echo "<tr>" ;
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_inizio"])) ."</td>";
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_fine"])). "</td>"  ;
            echo "<td>". $riga["Carica_Nome"] ."</td>";
            if ($cand==1)               // link per candidarsi se attivo
                echo "<td> <a href=\"candidatura2.php?id=".$riga["ID"] .'"> Candidati </a></td>';
            echo "</tr>" ;
            $riga=mysql_fetch_array($tabella);
        }
        echo "</table>";
    }
    // chiusura db
    mysql_close($link);
    include ("footer.php");
 ?>