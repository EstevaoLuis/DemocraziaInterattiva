<?php
    // controllo variabili
    if (!isset ($_GET["id"]))
           header("location:index.php");
    $id=$_GET["id"];

    include ("start_session.php");
    include ("controllo_sessione.php");
    include ("header.php");
    $user = $_SESSION["usr"];

    echo "<h1>Candidati elezione</h1>";
    // connessione
    include("connessione.php");
    // query: controllo se l'utente ha gia' votato per questa elezione
    $query="SELECT *
    FROM democrazia.voti
    WHERE ID_Elezione = '".$id."'
    AND User = '".$user."';";

    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);
    if ($riga)  // caso utente ha gia' votato per l'elezione
        echo "<p class=\"red\">Hai gia' votato per questa elezione!</p>";
    else
        {
          // query: trova tutti i candidati all'elezione
          $query="SELECT *
          FROM democrazia.candidati INNER JOIN democrazia.utente
          ON candidati.User = utente.User
          WHERE ID_Elezione = '".$id."'";

          $tabella=mysql_query($query) or die (mysql_error());
          $riga=mysql_fetch_array($tabella);

          if (!$riga)         // Nessun candidato
          {
           echo "<p>Nessuna candidato</p>";
          }
          else{               // Elenco candidati
              echo "<table border=1><th>Nome</th><th>Cognome</th><th>Vota</th>" ;
              while($riga){
                  echo "<tr>" ;
                  echo "<td>". $riga["Nome"]. "</td>"  ;
                  echo "<td>". $riga["Cognome"] ."</td>";
                  echo '<td> <a href="vota2.php?id='.$id ."&cand=".$riga["User"] .'"> Vota </a></td>';
                  echo "</tr>" ;
                  $riga=mysql_fetch_array($tabella);
              }
              echo "</table><br>";
              echo '<td> <a href="vota2.php?id='.$id .'&cand="> Vota scheda nulla </a></td>';
          }
    }
    mysql_close($link);

    include ("footer.php");
 ?>