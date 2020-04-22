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
require_once('controller/frontend/membersController.php');


function adminView()
{
	$loginManager = new LoginManager();
	$memberManager = new MemberManager();
	$manager = new Manager();
	

	if(isset($_SESSION['connected']))
	{
		$pseudo = $_SESSION['login'];
		$id_group = $memberManager->getInfoMembers("id_group", $pseudo);
		$admin = $loginManager->checkAdmin($id_group);
		$nb_view = $manager->countVisit();

		if($admin){
			require('view/backend/adminView.php');
		}else {
			throw new Exception("Vous ne pouvez pas accéder à cette page !");
		}

	} else {
		throw new Exception(" Vous n'etes pas connecté !");	
	}
	
	
}

function mailToAdmin()
{
	
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
	        $alert_ok = "Votre message a bien été envoyé !";
	    }
	}
	
 
	require('view/frontend/nav/contactView.php');
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
		$alert_ok = 'Changement de groupe effectué!';
		require('view/backend/adminView.php');
	} else {
		throw new Exception("Impossible de changer l'utilisateur de groupe");
	}
	
}