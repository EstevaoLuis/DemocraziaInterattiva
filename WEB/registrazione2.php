<?php

    include ("start_session.php");
    include ("header.php");
    // controllo parametri
    if (!isset ($_POST["nome"]))
       header("location:index.php");
    if (!isset ($_POST["cognome"]))
       header("location:index.php");
    if (!isset ($_POST["user"]))
       header("location:index.php");
    if (!isset ($_POST["password"]))
       header("location:index.php");
    if (!isset ($_POST["cand"]))
       header("location:index.php");

    echo "<h1> Nuovo utente</h1>" ;
    // connessione db
    include("connessione.php");
    // inserimento nuovo utente
    $query="SELECT nuovo_utente('".$_POST["nome"]."','".$_POST["cognome"]."',
    '".$_POST["user"]."','".$_POST["password"]."','".$_POST["cand"]."') AS R;";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);

    if (!$riga)       // caso Errore
        echo "<p class=\"red\"> Errore! </p>";
    else{
       if ($riga["R"] == -1)        // caso dati sbagliati
            echo "<p class=\"red\">Errore inserimento dati </p>" ;
       else if ($riga["R"] == 0){   // caso OK
            echo "<p class=\"blue\">Registrazione avvenuta con successo! </p>"  ;
            echo "<p>Attendi che l'amministratore confermi la tua registrazione </p>"  ;
       }
       /*echo '<form><input type="button" value="Torna indietro" onClick="javascript:history.go(-1)" name="button"></form>';*/


    }
    // chiusura db
    mysql_close($link);

    include ("footer.php");
 ?>

