<?php

    include ("start_session.php");
    include ("controllo_sessione.php");
    include ("header.php");

    // controllo parametri
    if (!isset ($_GET["id"]) || $_SESSION["cand"]!=1)
           header("location:index.php");
    $id=$_GET["id"];
    // connessione db
    include("connessione.php");

    // candidatura utente
    $query="SELECT candidatura_utente('".$_SESSION["usr"]."','".$id."') AS R;";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    // Risultato query
    if (!$riga)
        echo "<p class=\"red\"> Errore! </p>";
    else{            // Il candidato non poteva candidarsi
       if ($riga["R"] == -1){
            echo "<p class=\"red\">Non puoi candidarti! </p>" ;
            echo "<p>Hai gia' detenuto due volte la carica </p>" ;
       }            // Candidatura avvenuta con successo
       else if ($riga["R"] == 0){
            echo "<p>Candidatura avvenuta con successo! </p>"  ;
    }
    //echo '<form><input type="button" value="Torna indietro" onClick="javascript:location.href='."'index.php'".'" name="button"></form>';


    }
    // chiusura db
    mysql_close($link);

    include ("footer.php");

 ?>