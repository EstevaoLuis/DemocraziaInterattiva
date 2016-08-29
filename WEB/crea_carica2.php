<?php
    // controllo sessione admin
    include ("start_session.php");
    include ("controllo_sessione_admin.php");
    include ("header.php");
    // controllo parametri
    if (!isset ($_POST["nome"]))
       header("location:index.php");
    if (!isset ($_POST["durata"]))
       header("location:index.php");
    if (!isset ($_POST["descr_c"]))
       header("location:index.php");
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
    if (!isset ($_POST["descr_e"]))
       header("location:index.php");
    // formattazione date
    $inizio="'".$_POST["inizio_a"]."-".$_POST["inizio_m"]."-".$_POST["inizio_g"]."'";
    $fine="'".$_POST["fine_a"]."-".$_POST["fine_m"]."-".$_POST["fine_g"]."'";
    // connessione db
    include("connessione.php");
    // procedura creazione nuova carica con relativa elezione
    $query="SELECT nuova_carica('".$_POST["nome"]."',".$_POST["durata"].",
    '".$_POST["descr_c"]."',".$inizio.",".$fine.",
    '".$_POST["descr_e"]."') AS R;";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);
    // Output: eventuali errori oppure OK
    if (!$riga)
        echo "<p class=\"red\"> Error </p>";
    else{
       if ($riga["R"] == -1)
            echo "<p class=\"red\">Errore inserimento dati </p>" ;
       else if ($riga["R"] == 0)
            echo "<p>Carica creata con successo </p>"  ;
       //echo '<form><input type="button" value="Torna indietro" onClick="javascript:history.go(-1)" name="button"></form>';


    }
    // chiusura db
    mysql_close($link);

    include ("footer.php");
 ?>

