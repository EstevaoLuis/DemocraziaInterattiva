<?php

    include ("start_session.php");
    include ("header.php");
    // controllo variabili
    if (!isset ($_POST["inizio_g"]))
       header("location:index.php");
    if (!isset ($_POST["inizio_m"]))
       header("location:index.php");
    if (!isset ($_POST["inizio_a"]))
       header("location:index.php");
    if (!isset ($_POST["fine_g"]))
       header("location:index.php");
    if (!isset ($_POST["fine_m"]))
       header("location:index.php");
    if (!isset ($_POST["fine_a"]))
       header("location:index.php");
    // formattazione date
    $inizio="'".$_POST["inizio_a"]."-".$_POST["inizio_m"]."-".$_POST["inizio_g"]."'";
    $fine="'".$_POST["fine_a"]."-".$_POST["fine_m"]."-".$_POST["fine_g"]."'";
    // connessione db
    include("connessione.php");
    // query: ricerca per periodo
    $query="SELECT elezione.*, COUNT(User) AS Tot_voti
    FROM democrazia.elezione LEFT JOIN democrazia.voti
    ON elezione.ID  = voti.ID_Elezione
    WHERE Data_fine < CURDATE()
    AND Data_inizio BETWEEN ".$inizio." AND ".$fine."
    OR Data_fine BETWEEN ".$inizio." AND ".$fine."
    GROUP BY ID
    ORDER BY Data_fine DESC;";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    if (!$riga)  // caso query vuota
    {
     echo "<p>Nessuna elezione in questo periodo</p>";}
    else{        // stampa risultati
        echo "<table border=1><th>Inizio</th><th>Fine</th><th>Carica</th><th>Votanti</th><th>Classifica</th>" ;
        while($riga){
            echo "<tr>" ;
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_inizio"]))."</td>";
            echo "<td>". date('d/m/Y' , strtotime($riga["Data_fine"])). "</td>"  ;
            echo "<td>". $riga["Carica_Nome"] ."</td>";
            echo "<td>". $riga["Tot_voti"] ."</td>";
            echo "<td> <a href=\"classifica.php?id=".$riga["ID"] .'"> Classifica </a></td>';
            echo "</tr>" ;
            $riga=mysql_fetch_array($tabella);
        }
        echo "</table>";
    }
    // chiusura connessione db
    mysql_close($link);

    include ("footer.php");
 ?>

