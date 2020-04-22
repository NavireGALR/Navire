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
require_once('controller/frontend/postController.php');
require_once('controller/frontend/membersController.php');
require_once('controller/backend/adminController.php');


function loginView()
{
	require('view/frontend/nav/loginView.php');
}

function signInView()
{
	require('view/frontend/btn/signInView.php');
}

function resumeView()
{
	require('view/frontend/nav/resumeView.php');
}

function projectView()
{
	require('view/frontend/nav/projectView.php');	
}

function contactView()
{

	require('view/frontend/nav/contactView.php');
}


function alertView()
{
	$alert = $_SESSION['alert'];
	unset($_SESSION['alert']);
	require('view/backend/alertView.php');
}


function toLogIn()
{
	$loginManager = new LoginManager();
	$user_check = $loginManager->checkUserOk();
	$memberManager = new MemberManager();

	if($user_check){
		$_SESSION['id'] = $memberManager->getInfoMembers('id', $_SESSION['login']);
		header('Location: index.php?action=none');
	} else {
		throw new Exception('Impossible de se connecter');
	}
    
}

function toSignIn()
{
	$memberManager = new MemberManager();

	$signin_ok = $memberManager->insertMembersDb();
	if($signin_ok){
		$_SESSION['alert_ok'] = 'Enregistré! Bienvenue à bord !';
		header('Location: index.php?action=profil');
	} else {
		$alert = $_SESSION['alert'];
		unset($_SESSION['alert']);
		require('view/frontend/btn/signInView.php');
	}
	
}

function signOut()
{
	$loginManager = new LoginManager();
	$loginManager->eraseData();
	session_start();
	$_SESSION['alert'] = "Déconnecté !";
	header('Location: index.php?action=none');

}


function profil()
{
	if(isset($_SESSION['connected'])){

		if(isset($_SESSION['alert_ok'])){
			$alert_ok = $_SESSION['alert_ok'];
			unset($_SESSION['alert_ok']);
		}
		$pseudo = $_SESSION['login'];
		$memberManager = new MemberManager();
		$loginManager = new LoginManager();
		
		$id = $memberManager->getInfoMembers('id', $pseudo);
		$mail = $memberManager->getInfoMembers('mail', $pseudo);
		$id_group = $memberManager->getInfoMembers('id_group', $pseudo);
		$date_crea = $memberManager->getInfoMembers('date_crea',$pseudo);
		$city = $memberManager->getInfoMembers('city',$pseudo);
		$company = $memberManager->getInfoMembers('company',$pseudo);
		$currentPosition = $memberManager->getInfoMembers('current_position',$pseudo);
		$admin = $loginManager->checkAdmin($id_group);
		if($admin){
			$page_admin = 'index.php?action=admin';
		} else {
			$page_admin = '';
		}

		require('view/frontend/nav/profilView.php');
	    
	} else {
		throw new Exception('Impossible de se connecter');
	}
	
}



