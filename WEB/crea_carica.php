<?php
    // controllo sessione admin
    include ("start_session.php");
    include ("controllo_sessione_admin.php");
    include ("header.php");

?>

    <h1> Crea una nuova carica e le relative elezioni </h1>
    <!-- form creazione carica -->
     <form action="crea_carica2.php" method="post">
     <table>
        <tr><td>Nome: </td><td><input type="text" name="nome"> </td></tr>
        <tr><td>Durata: </td><td><input type="text" name="durata"></td></tr>
        <tr><td>Descrizione:Nome: </td><td><input type="text" name="descr_c"></td></tr>
        <tr><td>Inizio Elezioni: </td><td>
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
            // anno
            $d=Date("Y");
            for ($i=0; $i<10; $i++)
            {
                echo '<option value="'.($d+$i).'">'.($d+$i).'</option>';
            }
        ?>
        </select>
        </td></tr>
        <tr><td>Fine Elezioni: </td><td>
        <select name="fine_g">
        <?php
            // giorno
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
            // anno
            $d=Date("Y");
            for ($i=0; $i<10; $i++)
            {
                echo '<option value="'.($d+$i).'">'.($d+$i).'</option>';
            }
        ?>
        </select>
        </td></tr>
        <tr><td>Descrizione Elezione: </td><td><input type="text" name="descr_e"></td></tr>

        <tr><td></td><td><input type="submit" value="crea"> </td></tr>
     </table>
     </form>

<?php

    include ("footer.php");
?>