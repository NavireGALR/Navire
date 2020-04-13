<?php


require_once('model/frontend/loginManager.php');
require_once('model/frontend/membersManager.php');
require_once('model/manager.php');
require_once('model/backend/fileManager.php');
require_once('model/frontend/postManager.php');

function listPost()
{

	if(isset($_SESSION['connected'])){
			
		$postManager = new PostManager();
		$posts = $postManager->displayListPost();
		require('view/frontend/postsView.php');

	} else {
		throw new Exception('Vous n\'êtes plus connecté');
	}
	

}

function listComments($id)
{
	$postManager = new PostManager();
	$post = $postManager->displayPost($id);
	$comments = $postManager->displayComments($id);
	require('view/frontend/commentsView.php');

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