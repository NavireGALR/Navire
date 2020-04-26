<?php

require_once('model/manager.php');
require_once('controller/controller.php');

function avatar()
{
	$fileManager = new FileManager();
	$viewManager = new ViewManager();

	$fileManager->avatarUpload();
	$_SESSION['alert'] = $viewManager->alert('Avatar uploadé !', 'success');
	
	header('Location: index.php?action=profil');
}

function updateInfo()
{
	$old_pseudo = $_SESSION['login'];
	$memberManager = new MemberManager();
	$viewManager = new ViewManager();

	$infosMember = $memberManager->getMember($old_pseudo);
	$update_ok = $memberManager->updateMember($infosMember['id']);
	if($update_ok){
		$_SESSION['alert'] = $viewManager->alert('Changement effectué !', 'success');
		header('Location: index.php?action=profil');
	} else {
		throw new Exception('Impossible de modifier les informations');
	}
}

function updateGroupMember()
{
	$memberManager = new MemberManager();
	$viewManager = new ViewManager();

	$pseudo = strip_tags($_POST['pseudo']);
	$new_id_group = $_POST['newgroup'];
	
	$infosMember = $memberManager->getMember($pseudo);
	$memberManager->updateIdGroupMember($infosMember['group'], $new_id_group);

	$alert = $viewManager->alert('Changement de groupe effectué !', 'success');
	require('view/child/adminView.php');
	
}


