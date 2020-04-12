<?php


require_once('model/loginManager.php');
require_once('model/membersManager.php');
require_once('model/manager.php');
require_once('model/postManager.php');

function listPost()
{
	$postManager = new PostManager();
	$posts = $postManager->displayListPost();
	require('view/frontend/postsView.php');

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