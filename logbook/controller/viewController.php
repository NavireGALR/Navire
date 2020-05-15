<?php

require_once('model/manager.php');
require_once('controller/controller.php');

function homeView()
{	

	$postManager = new PostManager();
	$loginManager = new LoginManager();
	$memberManager = new MemberManager();
	$manager = new Manager();
	
	$add_post_view = "";

	$manager->countVisit();
	$nbPages = $postManager->getNbPages();


	if(isset($_SESSION['alert'])){
			$alert = $_SESSION['alert'];
			unset($_SESSION['alert']);
	}

	if(isset($_SESSION['connected'])){

		$pseudo = $_SESSION['login'];
		
		$infosMember = $memberManager->getMember($pseudo);
		$writer = $loginManager->checkWriter($infosMember['group']);
		if($writer)
		{
			$add_post_view = "index.php?action=add_post";
		}
	}
	
	if(isset($_GET['page']) AND ($_GET['page'] >= 2 AND $_GET['page'] <= $nbPages)){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}

	$posts = $postManager->displayListPost($page);
	require('view/nav/homeView.php');

}

function profil()
{
	if(isset($_SESSION['connected'])){

		if(isset($_SESSION['alert'])){
			$alert = $_SESSION['alert'];
			unset($_SESSION['alert']);
		}
		
		$pseudo = $_SESSION['login'];
		$memberManager = new MemberManager();
		$loginManager = new LoginManager();
		
		$infosMember = $memberManager->getMember($pseudo);
		$admin = $loginManager->checkAdmin($infosMember['group']);
		if($admin){
			$page_admin = 'index.php?action=admin';
		} else {
			$page_admin = '';
		}

		require('view/nav/profilView.php');
	    
	} else {
		throw new Exception('Impossible de se connecter');
	}
	
}


function adminView()
{
	$loginManager = new LoginManager();
	$memberManager = new MemberManager();
	$manager = new Manager();
	

	if(isset($_SESSION['connected']))
	{
		$pseudo = $_SESSION['login'];


		$infosMember = $memberManager->getMember($pseudo);
		$infos = $memberManager->allInfosMembers();
		$admin = $loginManager->checkAdmin($infosMember['group']);
		$nb_view = $manager->countVisit();

		if($admin){
			require('view/child/adminView.php');
		}else {
			throw new Exception("Vous ne pouvez pas accéder à cette page !");
		}

	} else {
		throw new Exception(" Vous n'etes pas connecté !");	
	}
	
}


function getView()
{

	if(isset($_GET['view'])){

		switch ($_GET['view']) {

	        case 'contact':
		        require('view/nav/contactView.php');
		        break;
	        case 'resume':
		        require('view/nav/resumeView.php');
		        break;
	        case 'project':
		        require('view/nav/projectView.php');
		        break;
	        case 'alert':
		        $alert = $_SESSION['alert'];
				unset($_SESSION['alert']);
				require('view/child/alertView.php');
		        break;
	        default:
		       throw new Exception('Aucune page n\'a pu être chargé');
		       break; 

	    }

    }else{
    	throw new Exception('Aucune page n\'a pu être chargé');

    }

	
}



