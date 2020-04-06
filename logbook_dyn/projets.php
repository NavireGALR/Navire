<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include("head.php"); ?>
    </head>

    <body>
        <header>
            <?php include("body_header.php"); ?>
            <link href="css/projets_style.css" rel="stylesheet"/>
        </header>
        
        <section>

            <div class="article_side">
                <article class="article_long">  
                    <div class="titre_article">
                        <h1> Tous mes projets ! </h1>
                    </div>

                    <div id="logbook">
                        <div class="titre_article">
                            <img class="logo_article" src="images/ancre.png" alt="logo article"/>
                            <h2>logbook</h2>
                        </div>
                        
                        <p><img id="jdb" src="images/jdb.png" alt="jdb">Un Logbook (ou journal de bord en français) est un registre dans lequel le capitaine ou les officiers d'un navire, consignent chronologiquement les différents événements, manœuvres, caps et observations. Ce site est donc mon journal de bord ! L'idée est né après un séjour à l'étranger où un simple barman considérait sa présence sur le web comme étant indispensable dans son métier. Outre l'univers de la navigation et de la piraterie que j'affectionne particulièrement, c'est un projet qui me tenait à coeur de réaliser pour plusieurs raisons :</p>
                        <ul>
                            <li>Avoir une présence sur le web</li>
                            <li>Démontrer mes capacités et compétences à des recruteurs potentiels </li>
                            <li>Suivre et centraliser mes projets </li>
                            <li>Tenir une liste chronologique de mes réalisations</li>
                        </ul>

                        <p>J'ai commencé la réalisation de ce site web le 28 mars 2020. Une semaine après l'annonce du confinement lié au virus Covid-19. J'ai donc eu le temps d'acquérir les compétences nécessaires à sa réalisation (notamment PHP et photoshop) et mettre en pratique les compétences que je possédaient déjà (html/css). Ce projet est donc très enrichissant à plus d'un titre et me permettra à l'avenir d'assurer la continuité de mes projets</p>
                    </div>

                    <div id="panam">
                        <div class="titre_article">
                            <img class="logo_article" src="images/ancre.png" alt="logo article"/>
                            <h2>Nam ou panam ?</h2>
                        </div>

                        <p class="intro"> Projet de création musical</p>
                            <div class="dl">
                                <audio controls>
                                Veuillez mettre à jour votre navigateur !
                                <source src="Nam.mp3">
                                <source src="Nam.ogg">
                                </audio>
                            </div>
                    </div>

                    <div id="asteam">
                        <div class="titre_article">
                            <img class="logo_article" src="images/ancre.png" alt="logo article"/>
                            <h2>asteam</h2>
                        </div>
                        <p class="intro">Vous êtes-vous déjà demandé comment motiver votre équipe, votre groupe de musique, de sport, vos amis ou bien vous-même ? Si oui, vous vous êtes peut-être confronté au manque de support, de suivi et vous vous êtes certainement
                        rendu compte de la difficulté que cette tâche représente !<br/>
                        « AsTeam » est un outil de motivation sociale sous forme d’un serious game, cette activité qui combine intention sérieuse et ressort ludique. Il permet de motiver les utilisateurs et les équipes en leur proposant des challenges associés à des récompenses. Le petit plus ? L’application permet de créer ses challenges
                        « faits maison » permettant une expérience personnalisée à chaque attente des utilisateurs. « AsTeam » c’est donc à la fois un outil de team-building, un jeu ludique et stimulant se rapprochant de l’expérience proposée par les RPG (Rôle-Playing-Game) et un réseau social complet : Liste d’amis, messagerie instantanée, groupes, gestion des évènements… A terme, l’application peut également être un outil de réseautage important. En effet, elle offre la possibilité de comptabiliser les objectifs atteints ; le profil des utilisateurs devient ainsi un véritable CV à « soft-skills », ces compétences de plus en plus recherchées par les entreprises.</p>
                        <p> Images de l'application</p>
                        <p> Vous pouvez retrouvez ci-dessous le business plan de ce projet ainsi que l'apk-demo de l'application</p>
                        <div class="dl"> 
                            <a href="docs/bpasteam.pdf" target="_blank"> 
                            Télécharger le Business plan
                            </a>
                            <a href="docs/apk-demo"> Télécharger apk android </a>
                        </div>
                    </div>
                </article> 

                <aside id="dl_projects"> 
                   <!-- More info ?-->
                </aside> 

            </div>
            <div class="bordure_section"></div>
        </section>

        <footer>
           <?php include("footer.php"); ?>
        </footer>

    </body>
</html>