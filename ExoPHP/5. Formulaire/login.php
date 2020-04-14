<?php

 session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>login php</title>
    </head>
    <body>
        <h1>S'identifier</h1>

        <?php

            if(isset($_SESSION['login']))
            {
                echo '<br/> Bonjour  '. $_SESSION['login']. '<br/>'; 
            }
            else if(isset($_COOKIE['login']) AND $_COOKIE['login'] != null)
            {
                echo '<br/> Re-Bonjour  '. $_COOKIE['login']. '<br/>'; 
            }
            else
            {
                echo '<br/> Bonjour inconnu, identifie toi ! <br/>';
            }
                ?>
        
        <form action="cible_id_ok.php" method="post">
            <p>
                <label for="login"> Login :</label>
                <input type="text" name="login" id="login" value=<?php 
                                                                    if(isset($_COOKIE['login']))
                                                                    {
                                                                         echo $_COOKIE['login'];
                                                                    }
                                                                ?>>
                <br/>

                <label for="password"> Password :</label>
                <input type="Password" name="password" id="password" value=<?php 
                                                                                if(isset($_SESSION['password']))
                                                                                {
                                                                                     echo $_SESSION['password'];
                                                                                }
                                                                            ?>>
                <br/>

                <input type="submit" name="valider" id="valider" value="valider">
                <br/>

            </p>
        </form>
    </body>
</html>