<?php $title = 'Mes projets'; ?>

<?php ob_start(); ?>

<article class="my-5 offset-lg-1 col-lg-8">

  <div class="row">

    <div class="col-lg-4">
      <div class="border-primary list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-logbook" data-toggle="list" href="#logbook" role="tab" aria-controls="logbook">
          Avancement Logbook
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
        <a class="list-group-item list-group-item-action" id="list-navire" data-toggle="list" href="#navire" role="tab" aria-controls="navire">
          Le Navire
        </a>
        <a class="list-group-item list-group-item-action" id="list-lebanon" data-toggle="list" href="#lebanon" role="tab" aria-controls="lebanon">
          Voyage Liban
        </a>
        <a class="list-group-item list-group-item-action" id="list-turkey" data-toggle="list" href="#turkey" role="tab" aria-controls="turkey">
          Voyage Turquie
        </a>
        <a class="list-group-item list-group-item-action" id="list-asteam" data-toggle="list" href="#asteam" role="tab" aria-controls="asteam">
          AsTeam
        </a>
      </div>
    </div>

    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="logbook" role="tabpanel" aria-labelledby="list-logbook">logbook</div>
        <div class="tab-pane fade" id="jdr" role="tabpanel" aria-labelledby="list-jdr">jdr</div>
        <div class="tab-pane fade" id="music" role="tabpanel" aria-labelledby="list-music">music</div>
        <div class="tab-pane fade" id="youtube" role="tabpanel" aria-labelledby="list-youtube">youtube</div>
        <div class="tab-pane fade" id="navire" role="tabpanel" aria-labelledby="list-navire">navire</div>
        <div class="tab-pane fade" id="lebanon" role="tabpanel" aria-labelledby="list-lebanon">lebanon</div>
        <div class="tab-pane fade" id="turkey" role="tabpanel" aria-labelledby="list-turkey">turkey</div>
        <div class="tab-pane fade" id="asteam" role="tabpanel" aria-labelledby="list-asteam">asteam</div>
      </div>
    </div>

  </div>

</article>

<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>
