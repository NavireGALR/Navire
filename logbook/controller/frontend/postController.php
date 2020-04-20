<?php


require_once('model/frontend/loginManager.php');
require_once('model/frontend/membersManager.php');
require_once('model/manager.php');
require_once('model/backend/fileManager.php');
require_once('model/backend/reCaptcha.php');
require_once('model/frontend/postManager.php');


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


function addPostView()
{

	require('view/frontend/btn/addPostView.php');
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

function contactView()
{

	require('view/frontend/nav/contactView.php');
}

function mailToAdmin()
{
	
	$objet = $_POST['objet'];
	$arraymsg = array (
    'prenom' => strip_tags($_POST['firstname']),
    'nom' => strip_tags($_POST['name']),
    'organisation' => strip_tags($_POST['company']),
    'email' => strip_tags($_POST['email']),
    'message' => nl2br(strip_tags($_POST['message']))
	);
	$message = '<pre>'.implode(",/<br>",$arraymsg).'</pre>';
	$alert_ok = "Votre message a bien été envoyé !";

    /*$mail_ok = mail('steo.ederhy@gmail.com', $objet , $message, 'From : no-reply@logbook.fr');

    //if ($mail_ok) {
        
    }
    */
	require('view/frontend/nav/contactView.php');
}
