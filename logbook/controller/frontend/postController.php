<?php


/* MODEL MANAGER */
require_once('model/frontend/postManager.php');
require_once('model/frontend/loginManager.php');
require_once('model/frontend/membersManager.php');
require_once('model/backend/fileManager.php');
require_once('model/backend/adminManager.php');
require_once('model/backend/reCaptcha.php');
require_once('model/manager.php');

/* OTHER CONTROLLER */
require_once('controller/frontend/membersController.php');
require_once('controller/frontend/loginController.php');
require_once('controller/backend/adminController.php');



function homeView()
{	

	$postManager = new PostManager();
	$loginManager = new LoginManager();
	$memberManager = new MemberManager();
	$adminmanager = new AdminManager();
	$add_post_view = "";
	$adminmanager->countVisit();
	$nbPages = $postManager->getNbPages();


	if(isset($_SESSION['alert'])){
			$alert = $_SESSION['alert'];
			unset($_SESSION['alert']);
	}elseif(isset($_SESSION['alert_ok'])){
			$alert_ok = $_SESSION['alert_ok'];
			unset($_SESSION['alert_ok']);
	}

	if(isset($_SESSION['connected'])){

		$pseudo = $_SESSION['login'];
		
		$id_group = $memberManager->getInfoMembers('id_group', $pseudo);
		$writer = $loginManager->checkWriter($id_group);
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
	require('view/frontend/nav/homeView.php');

}

function addPostView()
{

	require('view/frontend/btn/addPostView.php');
}

function modifPostView()
{
	$id_post = $_GET['post'];
	$postManager = new PostManager();
	$post = $postManager->displayPost($id_post);
	require('view/frontend/btn/modifPostView.php');
}




function listComments($id)
{
	$postManager = new PostManager();
	$post = $postManager->displayPost($id);
	$comments = $postManager->displayComments($id);
	require('view/frontend/btn/commentsView.php');

}


function addComment($id)
{
	$postManager = new PostManager();
	$com_added = $postManager->addCommentToDb($id);
	if($com_added){
		listComments($id);
	} else {
		throw new Exception("Impossible d'ajouter le commentaire !");
	}
	
}


function addPost()
{
	$postManager = new PostManager();
	$post_added = $postManager->addPostToDb();
	if($post_added){
		$_SESSION['alert_ok'] = "Article publié !";
		header('location: index.php?action=none');
	}else{
		throw new Exception("Impossible d'ajouter cet article");
		
	}
	
}

/*function modifPost()
{
	$id_post = $_GET['post'];
	$postManager = new PostManager();
	$post_modified = $postManager->updatePostToDb($id_post);
	if($post_modified){
		$_SESSION['alert_ok'] = "Article modifié !";
		header('location: index.php?action=none');
	}else{
		throw new Exception("Impossible de modifier cet article");
		
	}
	
}*/


