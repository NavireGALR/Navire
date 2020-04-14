<?php $title = 'Maquette Logbook'; ?>

<?php ob_start(); ?>
    

   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="row">
          <div class="col-lg-4">4 colonnes</div>
          <div class="col-lg-8">8 colonnes</div>
      </div>

      <div class="row">
        <div class="col-lg-3">3 colonnes</div>
        <div class="offset-6 col-lg-3">3 colonnes</div>
      </div>

    </div><!-- /.container -->


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>