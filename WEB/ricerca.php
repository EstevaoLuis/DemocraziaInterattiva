<?php

    include ("start_session.php");
    include ("header.php");
    // connessione db
    include("connessione.php");
?>
      <h1>Ricerca per candidato</h1>

      <form name="" method="post" action="ricerca_candidato.php">
       <select name="cand">

<?php

    // query: elenco candidati
    $query="SELECT DISTINCT Nome, Cognome, utente.User FROM democrazia.candidati INNER JOIN democrazia.utente
    ON candidati.User = utente.User";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);
    // Visualizzazione elenco candidati
    while($riga){
        echo '<option value="'. $riga["User"] .'">'.$riga["Nome"]." ".$riga["Cognome"]."</option>";
        $riga=mysql_fetch_array($tabella);
    }

?>
     </select>            <br>
     <input type="submit" value="Ricerca"></form>


      <h1>Ricerca per carica</h1>

<table>
      <form name="" method="post" action="ricerca_carica.php" align="left">
       <select name="carica">

<?php

    // query: elenco cariche
    $query="SELECT * FROM carica";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);
    // Visualizzazione elenco cariche
    while($riga){
        echo '<option value="'. $riga["Nome"] .'">'.$riga["Nome"]."</option>";
        $riga=mysql_fetch_array($tabella);
    }

?>

</select>         <br>
     <input type="submit" value="Ricerca"></form>
</table>


<h1>Ricerca per periodo</h1>

<?php
    // cerco l'anno più basso in cui si è svolta un'elezione
    $query="SELECT anno_minimo() AS min;";
    $tabella=mysql_query($query) or die (mysql_error());
    $riga=mysql_fetch_array($tabella);
    $anno_min = $riga["min"];          // anno minimo
?>


<form method="post" action="ricerca_periodo.php">
<table><tr><td>
Periodo inizio: </td><td>
<select name="inizio_g">
        <?php
            // giorno
            for ($i=1; $i<32; $i++)
            {
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
        </select>
        <select name="inizio_m"><option value="1">Gennaio</option>
        <option value="2">Febbraio</option><option value="3">Marzo</option><option value="4">Aprile</option>
        <option value="5">Maggio</option><option value="6">Giugno</option><option value="7">Luglio</option>
        <option value="8">Agosto</option><option value="9">Settembre</option><option value="10">Ottobre</option>
        <option value="11">Novembre</option><option value="12">Dicembre</option></select>
        </select>
        <select name="inizio_a">
        <?php
            // Anno
            for ($d=Date("Y"); $d>=$anno_min; $d--)
            {
                echo '<option value="'.($d).'">'.($d).'</option>';
            }
        ?>
        </select>
</td></tr><td>Periodo fine: </td><td>
 <select name="fine_g">
        <?php
            // Giorno
            for ($i=1; $i<32; $i++)
            {
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
        </select>
        <select name="fine_m"><option value="1">Gennaio</option>
        <option value="2">Febbraio</option><option value="3">Marzo</option><option value="4">Aprile</option>
        <option value="5">Maggio</option><option value="6">Giugno</option><option value="7">Luglio</option>
        <option value="8">Agosto</option><option value="9">Settembre</option><option value="10">Ottobre</option>
        <option value="11">Novembre</option><option value="12">Dicembre</option></select>
        </select>
        <select name="fine_a">
        <?php
            // Anno
            for ($d=Date("Y"); $d>=$anno_min; $d--)
            {
                echo '<option value="'.($d).'">'.($d).'</option>';
            }
        ?>
        </select> </td></tr>
        <tr><td><input type="submit" value="Ricerca">
</td></tr></table>
</form>

 <?php
    // chiusura db
    mysql_close($link);
    include ("footer.php");
 ?>
