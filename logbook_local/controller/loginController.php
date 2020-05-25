<?php

require_once('model/manager.php');
require_once('controller/controller.php');


function toLogIn()
{

	if(isset($_GET['login']) AND $_GET['login']=='ok'){

		$loginManager = new LoginManager();
		$user_check = $loginManager->checkUserOk();
		$memberManager = new MemberManager();

		if($user_check){
			$infosMember = $memberManager->getMember($_SESSION['login']);
			 $_SESSION['id'] = $infosMember['id'];
			header('Location: index.php?action=none');
		} else {
			throw new Exception('Impossible de se connecter');
		}
    
	}else{
		require('view/nav/loginView.php');
	}
	
}



function toSignIn()
{
	$memberManager = new MemberManager();
	$viewManager = new ViewManager();

	if(isset($_GET['signin']) AND $_GET['signin']=='ok'){

		$signin_ok = $memberManager->insertMembersDb();
		if($signin_ok){
			$_SESSION['alert'] = $viewManager->alert('Enregistré! Bienvenue à bord !', 'success');
			header('Location: index.php?action=profil');
		} else {
			$alert = $_SESSION['alert'];
			unset($_SESSION['alert']);
			require('view/child/signInView.php');
		}

	}else {
		require('view/child/signInView.php');
	}
	
}


function signOut()
{
	$loginManager = new LoginManager();
	$viewManager = new ViewManager();

	$loginManager->eraseData();
	session_start();
	$_SESSION['alert'] = $viewManager->alert('Déconnecté !', 'warning');
	header('Location: index.php?action=none');

}





