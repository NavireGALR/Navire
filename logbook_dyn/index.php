<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include("head.php"); ?>
    </head>

    <body>
        <header>
            <link href="css/index_style.css" rel="stylesheet"/>
            <?php include("body_header.php"); ?>
        </header>
        
        <section>

            <div id="last_trip"> <!-- Dernier voyage -->
                <img src="images/paysage_cappa.jpg" alt="photo voyage turquie"/>

                <div id="description_banniere">
                    Retour sur mes vacances en turquie...
                </div>

                <a id="button" href="voyages.php#voy_turquie">
                    <img src="images/flecheblanchedroite.png" alt="link to voyages"/>
                    Voir l'article 
                </a>
            </div>

            <div class="article_side">
                <article>   <!-- Me présenter -->

                    <div class="titre_article">
                        <img class="logo_article" src="images/logo_article.png" alt="logo article"/>
                        <h1> Un nouveau départ </h1>
                    </div>

                    <p class="intro"> Après une expérience professionnelle de plus de 3 ans dans le domaine bancaire, je souhaite aujourd’hui élargir mon cercle de compétences en acquérant une expérience professionnelle dans le développement informatique. Je suis une personne empathique et avenante, aimant les challenges et le travail en équipe. Mon appétence pour le développement mobile et web me suit depuis la fin du collège. En outre, j'ai entamé la conception de ma propre application mobile dans le cadre d’une création d’entreprise. </p>
                    <p id="article_moi"> Cette année 2020 a été pour moi une année fort enrichissante ! <br/> Ce sont ces fameux moments de vie ou l'on se sent un peu vivre, renaître (pardonnez mon côté littéraire !) <br/> J'ai en effet voyagé au Liban, à Chypre, en Turquie... Vous trouverez d'ailleurs mon carnet de voyage sur ce site. Ces voyages m'ont formé, m'on fait prendre peu a peu conscience de certaines choses. J'ai toujours été une personne intéressée et curieuse mais comme on dit : Les voyages forment la jeunesse. J'en suis donc ressorti riche de nouvelles idées, de nouvelles ambitions...<br/> Il me tenait à coeur d'exploiter les connaissances que j'ai apprises durant mes précédentes années d'études : l'organisationnel, la vision business, la projection sur un projet précis ou encore l'appréhension des contraintes économiques, managériales mais aussi parfois juridiques. Ce sont des compétences que j'ai développées, maîtrisées et que je souhaite aujourd'hui exploiter... <br/> Cette année 2020 a également été marquée par un projet de création d'entreprise. <a href="projets.php#asteam"> AsTeam </a> (le nom n'a pas été déposé) est une application de gamification dédiée à la motivation salariale. Ce projet conciliait donc mes deux univers : la gestion des organisations et le développement web et mobile. Pour construire ce projet j'ai dû acquérir des compétences techniques notamment en Java que je continue de développer. Suite à ça, il m'est apparu que j'avais soif d'apprentissage et que je souhaitais élever mon appétence pour le développement informatique à un niveau professionnel. <br/> Ce site est ainsi la première étape qui, je l'espère, me permettra de convaincre des recruteurs (peut-être vous!) de ma motivation et de mon implication dans ce projet d'études. <br/> J'ai déjà passé plusieurs concours et j'ai été admis dans plusieurs écoles de renom : ESGI, IPSSI, EFREI, SUPDEWEB... qui me font donc confiance dans ce projet. <br/> Vous trouverez plus d'informations dans la rubrique <a href="cv.php#me_recruter">Me recruter</a> <br/><br/> Voilà ! Vous savez tout ! N'hésitez pas à me contacter via la rubrique dédiée ou via les différents réseaux ! </p>

                </article> 

                <aside id="side_moi"> <!-- Mes coordonnées-->

                    <h1> à propos de moi </h1>
                    <img id="bulle" src="images/bulle.png" alt="bulle"/>
                    <img id="photo_chien" src="images/insta_bilette.jpg" alt="photo_chien"/>
                    <p id="texte_apropos"> Prénommé Bastien, j'ai 23 ans et j'ai effectué un <em>bts banque</em> et une <em>licence gestion des organisations</em><br/><br/>Toujours plein d'idées et de nouveaux projets, j'adore les voyages, la littérature, la musique, les nouvelles technologies, le vélo, la natation, la randonnée...  <br/> J'ai aussi un bon niveau de guitare et je connais très bien les rouages de gamification (comment fonctionnent les jeux-vidéos pour faire simple!) <br/><br/>
                    </p>

                    <div id="lien_rs">
                        <a href="https://www.facebook.com/bastien.ederhy.5" target="_blank">
                            <img class="fb" src="images/facebook.png" alt="fb"/>
                        </a>
                        <a href="https://twitter.com/BasThaura" target="_blank">
                            <img class="tw" src="images/twitter.png" alt="twitter"/>
                        </a>
                        <a href="https://www.linkedin.com/in/bastien-ederhy/" target="_blank">
                            <img class="lin" src="images/linkedIn.png" alt="linkedin"/>
                        </a>
                        <a href="mailto:steo.ederhy@gmail.com" target="_blank">
                            <img class="mail" src="images/mail.png" alt="link to mail"/>
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