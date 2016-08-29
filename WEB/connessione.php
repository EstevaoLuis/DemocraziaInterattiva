<?php
    // connessione
    $link = mysql_connect('localhost', 'root', 'database');
    if (!$link) {
        die('Impossibile connettersi: ' . mysql_error());
    }
    // selezione base di dati
    $db_selected = mysql_select_db('democrazia', $link);
    if (!$db_selected) {
        die ('Impossibile usare il database : ' . mysql_error());
    }

?>