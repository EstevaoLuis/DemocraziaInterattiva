<?php
    // menu visualizzabile solo se l'amministratore è loggato
    if (isset($_SESSION["admin"])){
       if ($_SESSION["admin"]==1){

        print "         <div class=\"right-nav-back\">
                    <div class=\"right-nav-top\"><p>. : Admin Services</p></div>
                    <ul>
                      <li><a href=\"disattiva_utente.php\">Attiva/Disattiva utenti</a></li>
                      <li><a href=\"crea_carica.php\">Crea una nuova carica</a></li>
                      <li><a href=\"rinnovo_automatico.php\" style=\"background-image: none;\">Rinnovo elezioni</a></li>
                    </ul>
                    <div class=\"right-nav-bottom\"></div>
                  </div>\n";

       }
 }

 ?>