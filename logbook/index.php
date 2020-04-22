<?php

session_start();

require_once('controller/frontend/membersController.php');
require_once('controller/frontend/postController.php');
require_once('controller/frontend/loginController.php');
require_once('controller/backend/adminController.php');


try {

	if(isset($_GET['action'])) {

		switch ($_GET['action']) {


		    case 'signinView' :
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
		    case 'update_group':
		        updateGroupMember();
		        break; 
		    case 'admin':
		        adminView();
		        break;
	        case 'add_post':
		        addPostView();
		        break;
	        case 'add_new_post':
		        addPost();
		        break;
	        /*case 'modif_post':
		        modifPostView();
		        break;
	        case 'post_modified':
		        modifPost();
		        break;*/
		    case 'update':
		        if (isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0){ avatar(); }
		        else { updateInfo();}
		        break;
	        case 'login':
		        loginView();
		        break;
	        case 'alert':
		        alertView();
		        break;
	        case 'contact':
		        contactView();
		        break;
	        case 'resume':
		        resumeView();;
		        break;
	        case 'project':
		        projectView();;
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
	    homeView();
	}


} catch(Exception $e) {
	$_SESSION['alert'] = $e->getMessage();
	header('Location: index.php?action=alert');
}


