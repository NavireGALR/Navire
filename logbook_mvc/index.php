<?php

session_start();

require_once('controller/membersController.php');

try {
		if(isset($_GET['action'])) {

			if($_GET['action'] == 'signinpage'){
				signInView();
			}elseif($_GET['action'] == 'out') {
		    	signOut();
			}elseif($_GET['action'] == 'connect') {
				toLogIn();
			}elseif($_GET['action'] == 'signin') {
				toSignIn();
			}elseif($_GET['action'] == 'update') {
				updateInfo();
			}elseif($_GET['action'] == 'profil') {
				profil();
			}elseif($_GET['action'] == 'add') {
				addInfo();
			}elseif($_GET['action'] == 'listpost') {
				listPost();	
			}elseif(isset($_COOKIE['known']) AND strlen($_COOKIE['known']) >= 1) {
				isKnown();
			}elseif($_GET['action'] == 'none') {
				loginView();
			}else {
				throw new Exception('Aucune page n\'a pu être chargé');
			}
		}elseif (isset($_GET['post'])){
			if($_GET['post'] > 0){
				listComments($_GET['post']);
			}else{
				throw new Exception('Aucun article trouvé !');
			}
			
		}elseif(isset($_GET['idcomment'])) {
			if(strlen($_POST['comment']) > 0){
				addComment($_GET['idcomment']);
			}else{
				throw new Exception('Vous n\'avez pas saisi de commentaires !');
			}
		}else {
		    loginView();
		}


} catch(Exception $e) {
    echo '<br/>'. $e->getMessage();
    ?><br/><a href="index.php?action=none">Retour à l'acceuil</a>
    <br/><a href="index.php?action=listpost"> Retour aux articles </a>
    <br/><a href="index.php?action=profil"> Retour au Profil </a><?php

}

