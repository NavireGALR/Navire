<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SIGN UP</title>
    </head>
    <body>
        <h1>SIGN UP</h1>
            
            <form action="sign_up.php" method="post">
                <p>
                    Tout les champs sont obligatoires <br/>
                    <label for="pseudo"> Pseudo :</label><br/>
                    <input type="text" name="pseudo" id="pseudo" autofocus required>
                    <br/>

                    <label for="password"> Mot de passe:</label><br/>
                    <input type="Password" name="password" id="password" required>
                    <br/>

                    <label for="confirm_password"> Confirmation mot de passe:</label><br/>
                    <input type="Password" name="confirm_password" id="confirm_password" required>
                    <br/>

                    <label for="mail"> Adresse m@il :</label>
                    <input type="mail" name="mail" id="mail" required><br/>

                    <input type="submit" name="enregistrer" id="enregistrer" value="S'enregistrer">
                    <br/>
                </p>
            </form>

            <?php

                include("sign_up_verif.php");

            ?>
        
    </body>
</html>