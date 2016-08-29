<?php

    include ("start_session.php");
    include ("header.php");

?>
    <h1> Inserisci i tuoi dati </h1>
    <!-- Form di registrazione -->
     <form action="registrazione2.php" method="post">
     <table>
        <tr><td>Nome: </td><td><input type="text" name="nome"> </td></tr>
        <tr><td>Cognome: </td><td><input type="text" name="cognome"></td></tr>
        <tr><td>Username: </td><td><input type="text" name="user"></td></tr>
        <tr><td>Password: </td><td><input type="password" name="password"></td></tr>
        <tr align="left"><td><input type="radio" name="cand" value="1"> Candidato Elettore<br>
        <input type="radio" name="cand" checked="checked" value="0"> Solo Elettore</td></tr>


        <tr><td></td><td><input type="submit" value="crea"> </td></tr>
     </table>
     </form>
     <!-- Fine Form di registrazione -->

<?php
    include ("footer.php");
 ?>