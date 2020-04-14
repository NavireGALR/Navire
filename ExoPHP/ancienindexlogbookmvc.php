<?php

session_start();

require_once('controller/frontend/membersController.php');
require_once('controller/frontend/postController.php');
require_once('controller/backend/adminController.php');


try {

	if(isset($_GET['action'])) {

		switch ($_GET['action']) {


		    case 'signinpage' :
		        signInView();
		        break;
	        case 'signin':
		        toSignIn();;
		        break;
	        case 'connect':
		        toLogIn();
		        break;
	        case 'profil':
		        profil();
		        break;
		    case 'out':
		        signOut();
		        break;
		    case 'update':
		        updateInfo();
		        break;
		    case 'update_group':
		        updateGroupMember();
		        break; 
		    case 'admin':
		        adminView();
		        break;
		    case 'add':
		        if (isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0){ avatar();}
				addInfo();
		        break;
		    case 'listpost':
		        listPost();	
		        break;
		    case 'none':
		        loginView();
		        break;
		    default:
		       throw new Exception('Aucune page n\'a pu être chargé');
		       break;
		}

	}elseif(isset($_COOKIE['known']) AND strlen($_COOKIE['known']) >= 1) {
			
		isKnown();

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
    ?><br/><a href="index.php?action=none">Retour à l'acceuil</a><?php

}