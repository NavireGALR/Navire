<?php

session_start();

require_once('controller/controller.php');

try {

	if(isset($_GET['action'])) {

		switch ($_GET['action']) {

			case 'view':
		        getView();
		        break;
		  	case 'login':
		        toLogIn();
		        break;
	        case 'signin':
		        toSignIn();;
		        break;
	        case 'profil':
		        profil();
		        break;
	        case 'admin':
		        adminView();
		        break;
	        case 'update_group':
		        updateGroupMember();
		        break; 
		    case 'out':
		        signOut();
		        break;
	        case 'post':
	        	if (isset($_GET['post']) AND $_GET['post'] > 0 ){ listComments($_GET['post']); }
				else{ throw new Exception('Aucun article trouvé !'); }
		        break;
	        case 'add_post':
		        addPost();
		        break;
	        case 'modif_post':
		        modifPost();
		        break;
	        case 'add_comment':
	        	if (isset($_GET['idcomment']) AND $_GET['idcomment'] == $_POST['id_post'] )
	        	{ addComment($_GET['idcomment']); }
				else{ throw new Exception('Vous n\'avez pas saisi de commentaires !'); }
		        break;
		    case 'update':
		        if (isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0){ avatar(); }
		        else { updateInfo();}
		        break;
	        case 'mailto':
		        mailToAdmin();
		        break;
		    case 'none':
		        homeView();
		        break;
		    default:
		       throw new Exception('Aucune page n\'a pu être chargé');
		       break;
		}
		
	}else {
	    homeView();
	}


} catch(Exception $e) {
	$_SESSION['alert'] = $e->getMessage();
	header('Location: index.php?action=view&view=alert');
}


