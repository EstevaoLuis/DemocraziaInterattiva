<?php
    // controllo parametri
    if (!isset ($_GET["id"]))
           header("location:index.php");
    $id=$_GET["id"];

    include ("start_session.php");
    include ("header.php");
    echo "<h1>Classifiche</h1>";
    // connessione
    include("connessione.php");
    // query: totale dei voti dell'elezione
    $query="SELECT elezione.*, COUNT(User) AS Tot_voti
    FROM democrazia.elezione LEFT JOIN democrazia.voti
    ON elezione.ID  = voti.ID_Elezione
    WHERE Data_fine < CURDATE()
    AND ID = '".$id."'";

    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);
    // totale dei voti
    if (!$riga)
        echo "<p class=\"red\">Classifiche non disponibili</p>";
    else
        $totale = $riga["Tot_voti"];

    if (isset($totale)){
          // query: candidati dell'elezione ordinati per voti ricevuti
          $query="SELECT *
          FROM democrazia.candidati INNER JOIN democrazia.utente
          ON candidati.User = utente.User
          WHERE ID_Elezione = '".$id."'
          ORDER BY Voti_ricevuti DESC;";

          $tabella=mysql_query($query) or die (mysql_error());
          $riga=mysql_fetch_array($tabella);

      if (!$riga)               // Nessun candidato
      {
       echo "<p>Nessuna candidato<\p>";
      }
      else{                     // Tabella con la classifica dei candidati
          $cont=1;              // contatore
          echo "<table border=1><th>Posizione</th><th>Nome</th><th>Cognome</th><th>Voti Ricevuti</th>" ;
          while($riga){
              echo "<tr>" ;
              echo "<td>". $cont ."</td>";
              echo "<td>". $riga["Nome"]. "</td>"  ;
              echo "<td>". $riga["Cognome"] ."</td>";
              echo "<td>". $riga["Voti_ricevuti"] ."</td>";
              echo "</tr>" ;
              $totale = $totale - $riga["Voti_ricevuti"];
              $cont=$cont+1;          // incremento contatore
              $riga=mysql_fetch_array($tabella);
          }
          echo "</table><br>";
          echo "Schede nulle: ".$totale. "<br>";   // schede nulle
      }
    }
    // chiusura db
    mysql_close($link);

    include ("footer.php");
 ?>