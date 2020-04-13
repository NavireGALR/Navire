<?php

require_once("model/manager.php");
require_once("model/frontend/membersManager.php");

class FileManager extends MemberManager
{


    public function miniaturize($file)
    {

        $source = imagecreatefromjpeg($file); // La photo est la source
        $miniature = imagecreatetruecolor(100, 100); // On crée la miniature vide

        // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
        $largeur_source = imagesx($source);
        $hauteur_source = imagesy($source);
        $largeur_destination = imagesx($miniature);
        $hauteur_destination = imagesy($miniature);

        // On crée la miniature
		imagecopyresampled($miniature, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

        return $miniature;

    //END MINIATURIZE 
    }


	public function avatarUpload()
	{
		$pseudo = $_SESSION['login'];
		$memberManager = new MemberManager();
		$id_member = $memberManager->getInfoMembers('id', $pseudo); 

	    $infosfichier = pathinfo($_FILES['avatar']['name']);
	    $extension_upload = $infosfichier['extension'];
	    $extensions_ok = array('jpg', 'jpeg', 'gif', 'png');
	    $avatar_id = 'zressources/avatars/'.$id_member.'.'.$extension_upload;
	    if (in_array($extension_upload, $extensions_ok))
	    {
	    	move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_id);

	    } else {
	    	throw new Exception('Impossible d\'envoyer ce fichier');
	    }

		$miniature = $this->miniaturize($avatar_id);
		imagejpeg($miniature, $avatar_id);
	}


}
