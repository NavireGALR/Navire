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
require_once('controller/frontend/loginController.php');
require_once('controller/backend/adminController.php');


/* FUNCTION */

function avatar()
{
	$fileManager = new FileManager();
	$fileManager->avatarUpload();
	$_SESSION['alert_ok'] = 'Avatar uploadé !';
	header('Location: index.php?action=profil');
}

function updateInfo()
{
	$old_pseudo = $_SESSION['login'];
	$memberManager = new MemberManager();

	$id_member = $memberManager->getInfoMembers('id', $old_pseudo);
	$update_ok = $memberManager->updateMember($id_member);
	if($update_ok){
		$_SESSION['alert_ok'] = 'Changement effectué !';
		header('Location: index.php?action=profil');
	} else {
		throw new Exception('Impossible de modifier les informations');
	}
}
