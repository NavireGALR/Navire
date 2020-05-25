<?php

require_once('model/manager.php');
require_once('controller/controller.php');

function listComments($id)
{
	$postManager = new PostManager();
	$post = $postManager->displayPost($id);
	$comments = $postManager->displayComments($id);
	require('view/child/commentsView.php');

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

	if(isset($_GET['add']) AND $_GET['add']=='ok'){

		$postManager = new PostManager();
		$viewManager = new ViewManager();

		$post_added = $postManager->addPostToDb();
		if($post_added){
			$_SESSION['alert'] = $viewManager->alert('Article publié !', 'success');
			header('location: index.php?action=none');
		}else{ throw new Exception("Impossible d'ajouter cet article");}

	}else{ require('view/child/addPostView.php'); }
	
}



function modifPost()
{
	if(isset($_GET['modif']) AND $_GET['modif']=='ok'){

		$id_post = $_GET['post'];
		$postManager = new PostManager();
		$viewManager = new ViewManager();

		$postManager->updatePostToDb($id_post);
		$_SESSION['alert'] = $viewManager->alert('Article modifié !', 'success');
		header('location: index.php?action=none');

	}else{

		$id_post = $_GET['post'];
		$postManager = new PostManager();
		$post = $postManager->displayPost($id_post);
		require('view/child/modifPostView.php');
	}
	
}

function mailToAdmin()
{
	$viewManager = new ViewManager();
	
	if(isset($_POST['send'])){

		$objet = 'Objet : '.$_POST['objet'];
		$arraymsg = array (
		'objet' => $objet,
		'email' => 'Email : '.strip_tags($_POST['email']),
	    'organisation' => 'Organisation : '.strip_tags($_POST['company']),
	    'message' => 'Message :  '.strip_tags($_POST['message'])
		);
		$message = implode("\n\n",$arraymsg);
		

	    $mail_ok = mail('admin@logbook-ederhy.fr', $objet , $message, 'From : form_contact@logbook.fr');

	    if ($mail_ok) {
	        $alert = $viewManager->alert('Votre message a bien été envoyé !', 'success');
	    }else{
	    	$alert = $viewManager->alert('Erreur lors de l\'envoi du message', 'warning');
	    }
	}
	
 
	require('view/nav/contactView.php');
}

