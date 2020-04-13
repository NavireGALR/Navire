<?php

require_once('model/frontend/loginManager.php');
require_once('model/frontend/membersManager.php');
require_once('model/manager.php');
require_once('model/backend/fileManager.php');
require_once('model/backend/adminManager.php');

function adminView()
{
	$loginManager = new LoginManager();
	$memberManager = new MemberManager();
	

	if(isset($_SESSION['connected']))
	{
		$pseudo = $_SESSION['login'];
		$id_group = $memberManager->getInfoMembers("id_group", $pseudo);
		$admin = $loginManager->checkAdmin($id_group);

		if($admin){
			$msg='';
			require('view/backend/adminView.php');
		}else {
			throw new Exception("Vous ne pouvez pas accéder à cette page !");
		}

	} else {
		throw new Exception(" Vous n'etes pas connecté !");	
	}
	
	
}

function updateGroupMember()
{
	$pseudo = strip_tags($_POST['pseudo']);
	$new_id_group = $_POST['newgroup'];
	$memberManager = new MemberManager();
	$adminManager = new AdminManager();
	$id_member = $memberManager->getInfoMembers('id', $pseudo);

	$update_group_ok = $adminManager->updateIdGroupMember($id_member, $new_id_group);
	if($update_group_ok){
		$msg = 'Changement de groupe effectué !';
		require('view/frontend/adminView.php');
	} else {
		throw new Exception("Impossible de changer l'utilisateur de groupe");
	}
	
}