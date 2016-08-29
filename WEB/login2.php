<?php
    // controllo se l'utente non è loggato
    if ( !isset ($_SESSION["log"]) || $_SESSION["log"] == 0) {
      print "
      <div class=\"right-nav-back\">
                  <div class=\"right-nav-top\"><p>. : Log in</p></div>
                    <br />
                    <div id=\"subscribe\">
                      <form action=\"controllo.php\" enctype=\"multipart/form-data\" method=\"post\">
                        User:
                        <input name=\"user\" type=\"text\" value=\"Username\" class=\"inputstyle\" />
                        Password:
                        <input name=\"psw\" type=\"password\" value=\"Pass\" class=\"inputstyle\" />
                        <input type=\"submit\" value=\"log in\" class=\"button\" />
                      </form>
                      <a href=\"registrazione.php\">Registrati</a>
                    </div>
                  <div class=\"right-nav-bottom\"></div>
                </div>\n";
    }
    else
    {
        // controllo se l'utente ha sbagliato a fare il login
        if ($_SESSION["log"] == -1) {
        print "

             <div class=\"right-nav-back\">
                <div class=\"right-nav-top\"><p>. : Log in</p></div>
                  <br />
                  <div id=\"subscribe\">
                    <form action=\"controllo.php\" enctype=\"multipart/form-data\" method=\"post\">
                    <p class=\"red\"> Username o password sbagliati!</p>
                      User:
                      <input name=\"user\" type=\"text\" value=\"Username\" class=\"inputstyle\" />
                      Password:
                      <input name=\"psw\" type=\"password\" value=\"Pass\" class=\"inputstyle\" />
                      <input type=\"submit\" value=\"log in\" class=\"button\" />
                    </form>
                    <a href=\"registrazione.php\">Registrati</a>
                  </div>
                <div class=\"right-nav-bottom\"></div>
              </div>\n";

        }
        else
        {
            // caso utente loggato
            print "
            <div class=\"right-nav-back\">
                        <div class=\"right-nav-top\"><p>. : Logged in</p></div>
                          <br />
                          <div id=\"subscribe\">
                            <form action=\"disconnetti.php\" enctype=\"multipart/form-data\" method=\"post\">

                              <input type=\"submit\" value=\"log out\" class=\"button\" />
                            </form>
                          </div>
                        <div class=\"right-nav-bottom\"></div>
                      </div>\n";
        }
    }

 ?>