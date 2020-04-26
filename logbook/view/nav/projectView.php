<?php $title = 'Mes projets'; ?>

<?php ob_start(); ?>

<article class="my-5 offset-lg-1 col-lg-10">

    <div class="mx-2 title_post row">
      <img class="icon_title" src="zressources/images/ancre_project.png" alt="ancre">
      <h3>Mes Projets</h3>
    </div>

    <div class="row">

      <div class="my-5 col-lg-4">
        <div class="border-primary list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-logbook" data-toggle="list" href="#logbook" role="tab" aria-controls="logbook">
            Logbook
          </a>
          <a class="list-group-item list-group-item-action" id="list-asteam" data-toggle="list" href="#asteam" role="tab" aria-controls="asteam">
            AsTeam
          </a>
        </div>
      </div>

      <div class="my-lg-5 col-lg-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="logbook" role="tabpanel" aria-labelledby="list-logbook"> 

            <h3>Avancement</h3>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="row my-3" id="list_progress">
              <ul class="col-lg-4">
                <li><i class="material-icons success">check</i><em>Logbook_Statique</em> <br/>-> HTML5/CSS3</li>
                <li><i class="material-icons success">check</i><em>Logbook_Dynamique</em> <br/>-> PHP/mySQL</li>
                <li><i class="material-icons success">check</i><em>Logbook_MVC</em> <br/>-> Structure MVC et POO</li>
              </ul>
              <ul class="col-lg-4">
                <li><i class="material-icons success">check</i><em>Logbook_Bootsrap</em> <br/>-> Adaptation CSS</li>
                <li><i class="material-icons success">check</i><em>Logbook_Responsive</em> <br/>-> Adaptation responsive</li>
              </ul>
              <ul class="col-lg-4">
                <li><i class="material-icons success2">close</i><em>Logbook_Symfony</em><br/></li>
                <li><i class="material-icons success2">close</i><em>Logbook_Javascript</em> <br/></li>
                <li><i class="material-icons success2">close</i><em>Logbook_Sécurité</em> <br/></li>
              </ul>
            </div>

          </div>
          <div class="tab-pane fade" id="asteam" role="tabpanel" aria-labelledby="list-asteam">
             PAS ENCORE DISPONIBLE 
          </div>
        </div>
      </div>
    </div>
    <span id="leNavire"></span>
    
    <div class="mx-2 title_post row">
      <img class="icon_title" src="zressources/images/ancre_project.png" alt="ancre">
      <h3>Le Navire</h3>
    </div>
    <div class="row">
        <div class="my-5 col-lg-4">
          <div class="border-primary list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-navire" data-toggle="list" href="#navire" role="tab" aria-controls="navire">
              Le Navire
            </a>
            <a class="list-group-item list-group-item-action" id="list-jdr" data-toggle="list" href="#jdr" role="tab" aria-controls="jdr">
              JDR- Hack Sword Without Master
            </a>
            <a class="list-group-item list-group-item-action" id="list-music" data-toggle="list" href="#music" role="tab" aria-controls="music">
              La Menuiserie
            </a>
            <a class="list-group-item list-group-item-action" id="list-youtube" data-toggle="list" href="#youtube" role="tab" aria-controls="youtube">
              Notre chaîne Youtube
            </a>
          </div>
        </div>
        
        <div class="my-lg-5 col-lg-8">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="navire" role="tabpanel" aria-labelledby="list-navire">
                <img class="i_project my-2 mx-2" src="zressources/images/navire_logo.png" alt="navire"/>
                <p class="text_project">Bienvenue sur Logbook, le journal de bord du Navire !<br/><br/>
                Le Navire c'est une association de galériens qui tente de faire quelque chose de leurs petits cerveaux. De la musique aux jeux-vidéos, du bénévolat à l'écriture; chacun de nous souhaite développer un talent, une envie, une passion. Sans prétention.<br/>
                L'idée est née de notre envie de continuer de faire des projets ensemble, de ne pas rester enfermés dans nos quotidiens personnels qui parfois brident notre créativité et notre motivation.
                <br/><br/>Vous pouvez retrouver ici l'intégralité des projets en cours, abandonnés ou finalisés.
                <br/>Beaucoup de l'activité du navire se déroule sur notre discord alors <a href="index.php?action=view&view=contact">n'hésitez pas à nous rejoindre</a>. 
                <br/>Tout le monde est le bienvenu sur le navire, nul besoin d'avoir un projet ou un talent ! Aucun prérequis, aucune question; la galère appartient à tout le monde!
                </p>
            </div>
            <div class="tab-pane fade" id="jdr" role="tabpanel" aria-labelledby="list-jdr">
              <h2 class="mb-3">SWM - L'enfer de Jade</h2>
              <img class="i_project my-2 mx-2" src="zressources/images/swm.jpg" alt="swm"/>
              <p class="text_project">
                <br/><br/>
                &emsp; &emsp; Dans SWM, le MJ n'a pas autant d'importance. Ce sont les joueurs qui construisent l'histoire au fur et à mesure de l'avancée du jeu. Il y a très peu de lancers de dés et ceux-ci servent à déterminer le "ton" de l'interprétation du joueur et non la réussite ou non de son action. Ainsi les joueurs peuvent décider à tout moment de se rendre invulnérable et de détruire le monde... si cela leur chante !
                <br/><br/><br/><br/>
                En effet, ce sont les joueurs qui décident des conséquences de leur propre action. A eux d'être mesurés ou non ! Le MJ pourra s'il le souhaite surenchérir afin de créer certaines surprises ou conséquences inattendues. Ainsi, l'intérêt est mis sur l'interprétation de chacun et non pas sur un choix arbitraire de caractéristiques ou le hasard d'un jet de dé. Le jeu en devient très vivant et riche en rebondissements...
                <a class="text-uppercase" href="zressources/docs/swm_rules.pdf"> 
                  Cliquez ici pour télécharger les règles du jeu 
                </a>
              </p> 
              
              <h3> Et d'une saison, une... ! </h3>
              <h4 class="text-capitalize">éléments nouveaux</h4>
                <ul>
                  <li>Galixchibre prisonnier</li>
                  <li>Alduin, la fée et le démon sont retournés chez eux.</li>
                  <li>Kopala est le roi de l'Est</li>
                  <li>Tout le monde veut s'emparer du pouvoir du démon</li>
                  <li>Rak souhaite conquérir le monde et possède des pouvoirs de téléportation immense.</li>
                  <li>Il est impossible pour les aventuriers de pouvoir concurrencer Rak sur le plan économique. Son pouvoir le rend extrêmement efficient. <em>Il n'est pas roi d'Orion pour rien !</em></li>
                  <li>Les aventuriers, s'ils ils la rejoignent, ne pourront quitter la Mangroove à cause des pouvoirs du roi Rak</li>
                  <li>Les aventuriers ne peuvent quitter tous ensemble le royaume de l'Est</li>
                  <li>Un des mystères est <em>"Comment affaiblir et d'ou viennent les pouvoir du roi Rak ?"</em></li>
                </ul>

                <h4>Gameplay</h4>
                <ul>
                  <li>Deux nouveaux tons : <em>Téméraire ou Prudent.</em></li>
                  <li>Le Ton Général est maintenant <em>le Ton du roi Rak</em></li>
                  <li>Le Mj joue le roi Rak pendant l'aventure.</li>
                  <li><em>Un jet inférieur à 6</em> impose maintenant une contrariété mais n'inverse pas le Ton du roi Rak</li>
                  <li><em>Un jet supérieur à 8</em> épuise désormais la magie de l'aventurier. Il doit effectuer de nouveau un jet supérieur à 8 pour se reposer.</li>
                  <li>Les égalités sont toujours des contrariétés mais celles-ci <em>inversent le Ton du roi Rak</em></li>
                  <li>Les morales et mystères restent inchangé.</li>
                  <li>Nouvelle phase : <em>La phase de répit.</em>
                  <br/>Durant cette phase, il n'y a pas de tonnerre, les joueurs doivent incarner leurs personnages et évoquer leurs histoires. Ils se reposent automatiquement et peuvent en apprendre plus les uns des autres. C'est une phase de réflexion ou chacun peut lancer les dés comme bon lui semble. Les égalités font basculer le ton du roi Rak. Il n'a pas de contrariété. C'est au joueur au MJ de changer la phase en :
                    <ol>
                      <li>Demandant à un aventurier "Montre-nous comment..."</li>
                      <li>évoquant un sujet et en posant une question ouverte au MJ</li>
                      <li>évoquant un tonnerre et en tendant les dés au MJ </li>
                    </ol>
                  </li>
                </ul>
              
              <h3>Résumé de la première saison </h3>
              <p class="text_project">
     &emsp; &emsp;<em>Edwige, Kopala, Negga, Hanushul et son dragon, le Koon et Galixchibre</em> ont fui l'empire d'Orion pour se réfugier au royaume de l'est. Ils ont dû passer par les <em>Mangrooves</em> et ont ainsi affronté les sbires de la Reine Vraska qui les attendaient de pied ferme au temple de l'arbre aux milles pieds. 
 <br/> &emsp; &emsp; En effet, celle-ci défendaient son territoire et les lieux magiques qui s'y trouvaient. C'était, bien sûr, sans compter sur les pouvoirs du Koon et de Hanushul qui les terrassa aussitôt. C'est à ce moment là que décida Alduin (<em>un roi dragon!</em>) du royaume de bordeciel pour téléporter nos amis dans son enfer. <em>Une épidémie y sévissait</em> et nos amis, grâce à Edwige et ses pouvoirs de guérison, ont ainsi usé d'inventivité pour survivre et sauver les habitants du royaume du Nord. Leurs exploits leurs ont permis de dompter Alduin et c'est sur son dos qu'ils repartirent en direction du temple. Un an passa et nos aventuriers purent ainsi faire plus ample connaissance.
<br/>
   &emsp; &emsp;  De nouveau au temple de l'arbre aux milles pieds, les aventuriers investirent le temple, et <em>libérèrent le démon qui s'y trouvait.</em> La ruse de Kopala leur permis de le faire asservir par une fée rencontrée sur le chemin qui les eu rejoints dans leurs périple. La dame sans nom fut terrasser par Alduin pendant que Negga libérait les prisonniers de la reine vraska. Afin de se venger, <em>Kopala fit oublier toute son existence à la reine et prit le contrôle du royaume de l'Est.</em>
<br/>
    &emsp; &emsp; <em>Fort d'un démon, d'une fée, d'un nouveau dragon et d'une armée entière,</em> nos aventuriers décidèrent d'attaquer le royaume d'Orion. Mais le roi Rak était préparé et décima les navires de nos alliés à l'aide de ses pouvoirs magiques. Fou de rage, Galixchibre usa  de sa dextérité et de ses manœuvres de combat pour terrasser à lui seul l'armée d'Orion. Kopala en profita pour créer un <em>SUPRACANON</em> leur permettant de creuser un chemin jusqu'au palais du Roi. 
<br/>
    &emsp; &emsp; Negga voulant prouver sa valeur, chevaucha mer et terre dans l'unique optique de se moquer du roi, montrant ainsi toute l'étendue de sa puissance. Celui-ci apeuré, dressa des barrières magiques dans son sanctuaire, que seul Galixchibre parvint à contourner. Sa cécité lui fit défaut et il tomba dans le piège du roi, qui profitant du répit, <em>téléporta l'intégralité de notre compagnie d'aventurier à l'autre bout du monde</em>:  au fin fond du royaume de l'Est. Galxchibre est maintenant prisonnier et le roi Rak, rageur, est maintenant décidé à conquérir ce monde une bonne fois pour toute.
              </p>  
            </div>
            <div class="tab-pane fade" id="music" role="tabpanel" aria-labelledby="list-music">
              PAS ENCORE DISPONIBLE
            </div>
            <div class="tab-pane fade" id="youtube" role="tabpanel" aria-labelledby="list-youtube">
              PAS ENCORE DISPONIBLE 
            </div>
          </div>
        </div>
    </div>
    <span id="travel"></span>

    <div class="mx-2 title_post row">
      <img class="icon_title" src="zressources/images/ancre_project.png" alt="ancre">
      <h3>Voyages</h3>
    </div>
    <div class="row">
      <div class="my-5  col-lg-4">
        <div class="border-primary list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-lebanon" data-toggle="list" href="#lebanon" role="tab" aria-controls="lebanon">
            Voyage Liban
          </a>
          <a class="list-group-item list-group-item-action" id="list-turkey" data-toggle="list" href="#turkey" role="tab" aria-controls="turkey">
            Voyage Turquie
          </a>
        </div>
      </div>
      <div class="my-lg-5 col-lg-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="lebanon" role="tabpanel" aria-labelledby="list-lebanon">    
              <h2 class="mb-3">La route du pays des cèdres dénué de cèdre</h2>
              <p class="text_project">
              Ah le liban ! Un magnifique pays, riche de ses couleurs, riche de ses cultures mais endetté jusqu'au cou. "Pourquoi venir ici ?" vous dira le premier barman venu et pourtant...!
              Il y a en effet beaucoup à dire du pays où 3 langues se mélangent sans accroc et où 3 religions s'accrochent sans mélange. Mais reprenons du début car notre voyage commence par un atterissage :
              </p>
              <h3>La côte beyroutine</h3>
              <img class="i_project my-2 mx-2" src="zressources/images/beyrouth.jpg" alt="beyrouth"/>
              <p class="text_project"> J'ai un peu couru, le soleil se couche tôt et je voulais voir la Méditerranée orange le premier soir. Quand j'arrive en slalomant entre les voitures folles, il est déjà caché derrière l'horizon. Je m'accoude à la rambarde devant la mer. Une brume sombre orange et rose flotte comme de la fumée sur l'horizon. Le ciel est déjà sombre et les vagues semblent lourdes. La mer est donc aussi immense et hypnotisante à tous les coins du monde. "Ouaed, please, ouaed ?", un petit garçon les bras pleins de roses rouges détache mes yeux de la mer, je répète "shukran, shukran, i don't want " mais il insiste un moment. La lumière vaporeuse du crépuscule est trompeuse, l'atmosphère n'est absolument pas paisible. On ne m'avait pas menti, le fameux tumulte. Les klaxons. Un air de musique d'ici s'échappant d'une enceinte. Les klaxons. Les vagues qui meurent sur les pierres. Les klaxons. Les apostrophes dans toutes les langues. Les klaxons. Les supplications des mendiants au pied des magestueux immeubles lumineux. Les klaxons. L'odeur est iodée et salée mais aussi salie. Le plastique qui flotte, les bouteilles à la mer et l'écume. Des regard qui me toisent, okay je ne mettrais plus de short. Un lampadaire qui clignote. Un phare un peu plus loin dans la nuit. Les milliers de petites lumières de la capitale perdues dans l'obscurité. C'est les lumières de Beyrouth. Son odeur, son bruit. Ça y est, j'y suis enfin. Je suis à Beyrouth. <cite title="author">- Juliette Bqx</cite> <p>
              
              <h3>A suivre : </h3>
              <p>TYR / CHYPRE / LA THAOURA / BYBLOS / BCHARREE / SAIDA / BALBEK / TRIPOLI / HARISSA / LES STELES DE NAHR EL KELB</p>


          </div>
          <div class="tab-pane fade" id="turkey" role="tabpanel" aria-labelledby="list-turkey">
          <h2 class="mb-3">Des vacances mouvementées</h2>
              <p class="text_project">
              La Turquie c'est la porte entre l'Europe et l'Orient. Les deux cultures s'y mélangent sans appriori. Encore un pays très riche de son histoire. Istanbul, anciennement constantinople, est la ville la plus intéréssante qu'il m'ai été donné de voir. On y sent le poids des années et des changements de régime. On y retrouve la richesse ostentatoire européenne et la grandeur arabe. Comme deux couleurs qui se mélangent, Istanbul est unique. En revanche le pays est grand, fidèle à lui même, il faut des heures pour le parcourir. Arrivé en son sein, c'est sa simplicité et son acceuil qui nous fait cette fois-ci vibré.
              </p>
              <h3>Istanbul</h3>
              <img class="i_project my-2 mx-2" src="zressources/images/ist_pont.jpg" alt="istanbul"/>
              <p class="text_project"> A SUIVRE </p>
          </div>
        </div>
      </div>
    </div>

</article>

<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>
