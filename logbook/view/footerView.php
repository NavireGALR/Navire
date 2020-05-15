	<div class="my-3 my-lg-5 col-lg-3">
		<h2>Liens utiles</h2>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><a href="index.php?action=view&view=resume"> Me recruter </a></li>
			<li class="list-group-item"><a href="index.php?action=view&view=project"> Avancement Logbook </a></li>
			<li class="list-group-item"><a href="index.php?action=view&view=contact"> Demander plus d'informations </a></li>
			<li class="list-group-item"><img src="zressources/images/github.png" alt="github" class="icon"><a href="https://github.com/NavireGALR/Navire"> GitHub </a></li>
		</ul>
		<div class="my-3 my-lg-5">
			<h2>Mes Voyages</h2>
			<ul class="row justify-content-around">
				<li><a href="index.php?action=view&view=project#travel"> En Turquie </a></li>
				<li><a href="index.php?action=view&view=project#travel"> Au Liban </a></li>
			</ul>
		</div>
	</div>

	<div class="my-3 my-lg-5 col-lg-4">
		<div class="justify-content-around">
			<h2>Mes recommandations</h2>
			<blockquote class="my-3 blockquote">
	  				<p class="quote mb-0">"...une excellente maturité professionelle."</p>
					<footer class="blockquote-footer">Elisabeth Poindron <cite title="poste">Resp. pédagogique</cite>
					<br/>
					<?php if(isset($_SESSION['connected']) AND $_SESSION['connected']) { ?> 
				    		<a href="zressources/docs/lr1.pdf" target="_blank">Télécharger la lettre</a>
			  		<?php }else { ?>
							<a href="index.php?action=login">Vous devez vous connecter pour télécharger ce document</a>
		        	<?php } ?>
					</footer>
			</blockquote>
			<blockquote class="my-3 blockquote">
					<p class="quote mb-0">"...toujours à la recherche de moyens pertinents pour assurer la réussite dans son travail"</p>
					<footer class="blockquote-footer">Matthieu Martin <cite title="poste">Resp. agence</cite>
					<br/>
					<?php if(isset($_SESSION['connected']) AND $_SESSION['connected']) { ?> 
				    		<a href="zressources/docs/lr2.pdf" target="_blank">Télécharger la lettre</a>
			  		<?php }else { ?>
							<a href="index.php?action=login">Vous devez vous connecter pour télécharger ce document</a>
		        	<?php } ?>
					</footer>
			</blockquote>
		</div>
	</div>

	<div class="my-3 my-lg-5 col-lg-3">
		<h2>Me contacter</h2>
		<div class="my-4 row justify-content-around" id="rs_footer">
			<div class="col-lg-1 col-3">
	          	<a href="https://www.facebook.com/bastien.ederhy.5" target="_blank">
	        		<img class="icon" src="zressources/images/facebook.png" alt="fb"/>
	        	</a>
    		</div>
	        <div class="col-lg-1 col-3">
	        	<a href="https://twitter.com/EderCaptain" target="_blank">
                    <img class="icon" src="zressources/images/twitter.png" alt="twitter"/>        
                </a>
	        </div>
	        <div class="col-lg-1 col-3">
	          	<a href="https://www.linkedin.com/in/bastien-ederhy/" target="_blank">
	        		<img class="icon" src="zressources/images/linkedIn.png" alt="linkedin"/>
	        	</a>
    		</div>
    		<div class="col-lg-1 col-3">
	          	<a href="mailto:ederhy.bastien@gmail.com" target="_blank">
	        		<img class="icon" src="zressources/images/mail.png" alt="mail"/>
	        	</a>
    		</div>
        </div>

        <ul class="row justify-content-around mb-5">
			<li class="row"><img class="icon mr-2" src="zressources/images/skype.png" alt="skype"/><h4 class="align-self-center">steok13</h4></li>
			<li class="row"><img class="icon mr-2" src="zressources/images/discord.png" alt="discord"/><h4 class="align-self-center">Ekawa#3878</h4></li>
		</ul>

		<h2>Rejoindre le navire</h2>
		<ul>
			<li><a href="index.php?action=view&view=contact">Demander le lien discord du navire</a></li>
		</ul>
		
	</div>

	