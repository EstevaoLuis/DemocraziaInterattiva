<?php
    // variabili di sessione
    session_start();
    session_register("log");
    session_register("usr");
    session_register("admin");
    session_register("cand");

    // connessione db
    include("connessione.php");
    // parametri
    $username=$_POST["user"];
    $password=$_POST["psw"];
    // query: verifica esistenza utente
    $query="SELECT * FROM democrazia.utente where User='".$username."' and Password='".$password."'";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);
    // chiusura connessione
    mysql_close($link);
    // verifico se l'utente non è presente oppure è stato disattivato
    if (!$riga || $riga["Banned"]==1)
    {
        $_SESSION["log"]=-1;
        header("location:index.php");
    }
    else{     // utente esistente, aggiorno le variabili di sessione
        $_SESSION["log"]=1;
        $_SESSION["usr"]=$username;
        $_SESSION["admin"]=$riga["Admin"];
        $_SESSION["cand"]=$riga["Cand"];
    }
    header("location:index.php");
?>


