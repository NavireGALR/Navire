<?php $title = 'Logbook'; ?>

<?php ob_start(); ?>

<img src="zressources/images/paysage_cappa.jpg" alt="paysage" id="img_header" class="order-lg-1 order-1"/>


<article class="my-5 px-5 col-lg-8 order-lg-2 order-3">

  <?= $alert ?>
 

  <div class="row justify-content-between">
    <div class="row mx-1">
      <img src="zressources/images/ancre.png" alt="ancre" class="icon_title">
      <h1>Derniers Articles</h1>
    </div>
      <?php if(strlen($add_post_view) >= 1){?>
      <a href="<?= $add_post_view ?>">
        <button id="add_post_btn" class="my-lg-0 my-5 btn btn-primary">Ajouter un article</button>
      </a>
      <?php }?>
  </div>
  
  <?php
    while($post = $posts->fetch()){
  ?>
        <div class="mx-auto my-lg-5">
          <div class="title_post my-3 row align-items-center justify-content-between">
              <h3><i class="mx-3 material-icons post">explore</i><?= $post['title'] ?></h3> 
              <small class="text-muted">par <?= $post['author'] ?>  le <?= $post['date_post_fr'] ?> </small>
          </div>
    <?php if(isset($_SESSION['login']))
          {
            if($post['author'] == $_SESSION['login'])
            {?>
              <a href="index.php?action=modif_post&post=<?= $post['id'] ?>">
                <button id="modif_post_btn" class="btn btn-secondary">Modifier l'article</button>
              </a>
      <?php }
          } ?>
              <p class="my-3 post_corpus"><?= $post['content'] ?></p>
              <a class="offset-lg-8" href="index.php?action=post&amp;post=<?= $post['id'] ?>"> Voir les commentaires </a>
        </div>
    
  <?php
      }
      $posts->closeCursor();
  ?>  

  <ul class="offset-5 pagination">
    <li class="page-item">
    <?php if($page>1){
      ?><a class="page-link" href="index.php?action=none&page=<?= ($page-1) ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
      <?php
    }
    ?>
    </li>
    <?php
      for ($i=1; $i <= $nbPages ; $i++) { 
        ?><li class="page-item <?php if($i == $page){ echo 'active'; }?> "><a class="page-link" href="index.php?action=none&page=<?= $i ?>"><?= $i ?></a></li><?php
      }
    ?>
    <li>
    <?php if($page < $nbPages){
        ?><a class="page-link" href="index.php?action=none&page=<?= ($page+1) ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
        <?php
      }
      ?>
    </li>
  </ul>

</article>


<aside class="my-5 col-lg-4 order-lg-3 order-2">
  <div class="card border-primary">
    <h3 class="card-header text-white bg-dark">Qui suis-je ? <small class="text-muted">#Ekawa</small></h3>
    <div class="card-body">
      <h2 class="card-title">Informations personnelles</h2>
      <p class="card-text"><em>Bastien, 23ans</em>. Après une expérience professionnelle dans le domaine bancaire, je recherche désormais <em>une alternance dans le développement informatique</em>.</p>
      <h2 class="card-title">Logbook</h2>
      <p class="card-text">
        <em>Un Logbook</em> (ou journal de bord en français) est un registre dans lequel le capitaine ou les officiers d'un navire, consignent chronologiquement les différents événements, manœuvres, caps et observations.<br/> Ce site est donc mon journal de bord. <br/>Vous y retrouverez :
        <ul>
          <li><a href="index.php?action=view&view=project">Mes différents projets</a></li>
          <li><a href="index.php?action=view&view=resume">Mon CV</a></li>
          <li><a href="index.php?action=view&view=contact">Mes coordonnées</a></li>
          <li>Des articles pertinents... ou non !</li>
          <li>Mon carnet de voyage</li>  
        </ul>
      </p>
      <h2 class="card-title">Hobbies</h2>
      <p class="card-text">
        <ul>
          <li>Musique: Guitare et MAO -> <a href="index.php?action=view&view=project#leNavire">La Menuiserie</a></li>
          <li>Voyages: Parcourir le monde -> <a href="index.php?action=view&view=project#travel">Mes voyages</a></li>
          <li>Littérature: Lire et écrire -> <a href="index.php?action=view&view=project#leNavire">JDR</a></li>
          <li>L'univers des jeux-vidéos -> <a href="index.php?action=view&view=project">AsTeam</a></li>
          <li>Natation/Vélo</li>
        </ul>
      </p>
      <a href="index.php?action=view&view=resume" class="btn btn-dark">En savoir plus</a>
    </div>
  </div>
</aside>

<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>