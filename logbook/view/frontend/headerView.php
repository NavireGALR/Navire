
<div class="col-lg-12">
    <div class="row">
	    <div class="col-lg-12" id="menu">
	    	<div class="container-fluid">
		    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between px-4">
		    		<a class="navbar-brand" href="index.php?action=none"><img src="zressources/images/bateau.png" class="d-inline-block" alt="logo" id="logo_header">Logbook</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggleCollapse" aria-controls="toggleCollapse" aria-expanded="false" aria-label="Toggle navigation">
				    	<span class="navbar-toggler-icon"></span>
				  	</button>
				  <div class=" offset-lg-6 collapse navbar-collapse align-items-center mr-auto mt-2 mt-lg-0 justify-content-between" id="toggleCollapse">
				    <div class="navbar-nav">
				      <a class="nav-item nav-link" href="index.php?action=none">Accueil</a>
				      <a class="nav-item nav-link" href="index.php?action=resume">Me recruter</a>
				      <a class="nav-item nav-link" href="index.php?action=project">Projets</a>
				      <a class="nav-item nav-link" href="index.php?action=contact">Contact</a>
				    </div>

				    <div>
				    	<?php
				    	if(isset($_SESSION['connected']) AND $_SESSION['connected']){
				    		?>
				    		<a href="index.php?action=profil">
			    			<?= $_SESSION['login'] ?>
				    		<img src="zressources/avatars/<?= $_SESSION['id'] ?>.jpg?filemtime(<?php echo time(); ?>)" alt="avatar" class="ml-2 rounded-circle" id="avatar_header"/>
				    		</a>
				    		<?php
				    	}else{
				    		?>
				    		<a class="nav-item nav-link" href="index.php?action=login">
				    			<button id="connect" class="btn btn-primary">Connexion</button>
				    		</a>
				    		<?php
				    	}
				    	?>
				    </div>
				  </div>
				</nav>
			</div>
	    </div>  
    </div>
</div>