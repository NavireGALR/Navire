<?php


require_once('model/loginManager.php');
require_once('model/membersManager.php');
require_once('model/manager.php');
require_once('controller/postController.php');

function updateInfo()
{
	$old_pseudo = $_SESSION['login'];
	$memberManager = new MemberManager();

	$id_member = $memberManager->getInfoMembers('id', $old_pseudo);
	$update_ok = $memberManager->updateMember($id_member);
	if($update_ok){
		echo 'Changement effectué !';
		profil();
	} else {
		throw new Exception('Impossible de modifier les informations');
	}
}

function addInfo()
{
	$memberManager = new MemberManager();
	$id_member = $memberManager->getInfoMembers('id', $_SESSION['login']);
	$add_ok = $memberManager->addInfo($id_member);
	if($add_ok){
		echo 'Changement effectué !';
		profil();
	} else {
		throw new Exception('Impossible de modifier les informations');
	}
}

function isKnown()
{
	$loginManager = new LoginManager();
	$known = $loginManager->checkIP();
	if($known){
		listPost();
	} else {
		throw new Exception('Impossible de se connecter');
	}

}


function loginView()
{
	require('view/frontend/loginView.php');
}


function toLogIn()
{
	$loginManager = new LoginManager();
	$user_check = $loginManager->checkUserOk();
	if($user_check){
		listPost();
	} else {
		throw new Exception('Impossible de se connecter');
	}
    
}


function profil()
{
	if(isset($_SESSION['connected'])){

		$pseudo = $_SESSION['login'];
		$memberManager = new MemberManager();
		$mail = $memberManager->getInfoMembers('mail', $pseudo);
		$id_group = $memberManager->getInfoMembers('id_group', $pseudo);
		$date_crea = $memberManager->getInfoMembers('date_crea',$pseudo);
		$city = $memberManager->getInfoMembers('city',$pseudo);
		$entreprise = $memberManager->getInfoMembers('entreprise',$pseudo);
		$actual_function = $memberManager->getInfoMembers('actual_function',$pseudo);

	    require('view/frontend/profilView.php');
	} else {
		throw new Exception('Impossible de se connecter');
	}
	
}


function signInView()
{
	require('view/frontend/signInView.php');
}

function toSignIn()
{
	$memberManager = new MemberManager();

	$signin_ok = $memberManager->insertMembersDb();
	if($signin_ok){
		profil();
	} else {
		signInView();
	}
	
}

function signOut()
{
	$loginManager = new LoginManager();
	$loginManager->eraseData();
	throw new Exception('Déconnecter');

}