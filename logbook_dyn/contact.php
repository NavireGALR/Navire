<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include("head.php"); ?>
    </head>

    <body>
        <header>
            <link href="css/contact_style.css" rel="stylesheet"/>
            <?php include("body_header.php"); ?>
        </header>
        
        <section>
            <div class="article_side">
                <article>   <!-- article ? -->

                    <div class="titre_article">
                        <img class="logo_article" src="images/ancre.png" alt="logo article"/>
                        <h3> Contact </h3>
                    </div>

                    <form method="post" action="contact_logbook.html">
                        <p>
                        <fieldset>
                            <legend>Formulaire de contact</legend>

                            <div class="form">
                                <label for="nom"> Votre nom* :</label> 
                                <input placeholder="Votre nom" type="text" name="nom" id="nom" maxlength="20" autofocus required>
                            </div>

                            <div class="form">
                                <label for="prenom"> Votre prénom* :</label> 
                                <input placeholder="Votre prénom" type="text" name="prenom" id="prenom" maxlength="20" required>
                            </div>

                            <div class="form">
                                <label for="organisation"> Entreprise/Organisation :</label> 
                                <input placeholder="Nom de votre entreprise" type="text" name="organisation" id="organisation">
                            </div>
            
                            <div class="form">
                                <label for="email"> Votre adresse email* :</label> 
                                <input placeholder="email@exemple.com" type="email" name="email" id="email" required>
                            </div>

                            <div class="form">
                                <label for="objet">Objet de votre demande de contact* :</label>
                                <select name="objet" id="objet">
                                    <optgroup label="Me recruter">
                                        <option value="recontact">Envoyer mes coordonnées afin d'être recontacté</option>
                                        <option value="entretien" selected>Proposer un entretien</option>
                                    </optgroup>
                                    <optgroup label="Mes projets">
                                        <option value="proposition">Proposer un projet</option>
                                        <option value="avis">Donner mon avis</option>
                                    </optgroup>
                                    <optgroup label="Autre">
                                        <option value="amelioration">Proposer une amélioration pour ce site</option>
                                        <option value="autre">Autre...</option>
                                    </optgroup>
                                </select>
                            </div>
                            
                            <div class="form">
                                <label for="commentaire"> Votre commentaire :</label>
                                <textarea placeholder="Texte" name="commentaire" id="commentaire"></textarea>
                            </div>

                            <input id="envoi" type="submit" name="envoi"/>
                    
                        </fieldset>
                        </p>
                    </form>

                </article> 

                <aside> <!-- Info contact -->
                    <h3> Ederhy Bastien <br/> Mes coordonnées </h3>

                    <div class="rs"> 
                        <img class="discord" src="images/discord.png" alt="discord"/>
                        <p>Ekawa#3878</p>
                    </div>

                    <div class="rs"> 
                        <img class="skype" src="images/skype.png" alt="skype"/>
                        <p>steok13</p>
                    </div>

                    <div id="lien_rs">
                        <a href="https://www.facebook.com/bastien.ederhy.5" target="_blank">
                            <img class="fb" src="images/facebook.png" alt="fb"/> 
                            Bast Eder
                        </a>
                        <a href="https://twitter.com/BasThaura" target="_blank">
                            <img class="tw" src="images/twitter.png" alt="twitter"/> 
                            @BasThaura
                        </a>
                        <a href="https://www.linkedin.com/in/bastien-ederhy/" target="_blank">
                            <img class="lin" src="images/linkedIn.png" alt="linkedin"/>
                            Bastien Ederhy
                        </a>
                        <a href="mailto:steo.ederhy@gmail.com" target="_blank">
                            <img class="mail" src="images/mail.png" alt="link to mail"/> 
                            steo.ederhy@gmail.com
                        </a>
                    </div>
                </aside> 

            </div>   
            <div class="bordure_section"></div>
        </section>

        <footer>
           <?php include("footer.php"); ?>
        </footer>

    </body>
</html>