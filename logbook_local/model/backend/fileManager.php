<?php

require_once("model/manager.php");

class FileManager extends MemberManager
{

	public function imageCreateFromAny($file)
	{
		    $type = exif_imagetype($file);
		    $allowedTypes = array(
		        1,  // [] gif
		        2,  // [] jpg
		        3,  // [] png
		        6   // [] bmp
	    );

	    if (!in_array($type, $allowedTypes)) {
	        return false;
	    }

	    switch ($type) {
	        case 1 :
	            $im = imageCreateFromGif($file);
	        break;
	        case 2 :
	            $im = imageCreateFromJpeg($file);
	        break;
	        case 3 :
	            $im = imageCreateFromPng($file);
	        break;
	        case 6 :
	            $im = imageCreateFromBmp($file);
	        break;
	    }   
	    return $im;

	}


    public function miniaturize($file)
    {   
        $source = $this->imageCreateFromAny($file);
        $miniature = imagecreatetruecolor(69, 69); // On crée la miniature vide

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
		$infosMember = $memberManager->getMember($pseudo); 

	    $infosfichier = pathinfo($_FILES['avatar']['name']);
	    $extension_upload = $infosfichier['extension'];
	    $extensions_ok = array('jpg', 'jpeg', 'gif', 'png');
	    $avatar_id = 'zressources/avatars/'.$infosMember['id'].'.jpg';
	    if (in_array($extension_upload, $extensions_ok))
	    {
	    	move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_id);

	    } else {
	    	throw new Exception('Impossible d\'envoyer ce fichier');
	    }

		$miniature = $this->miniaturize($avatar_id);
		imagejpeg($miniature, $avatar_id);
		
	}


	public function addAvatar()
	{
		$pseudo = $_SESSION['login'];
		$memberManager = new MemberManager();
		$infosMember = $memberManager->getMember($pseudo); 
	    $avatar_id = 'zressources/avatars/'.$infosMember['id'].'.jpg';
	   
		$miniature = $this->miniaturize('zressources/avatars/anonymous.jpg');
		imagejpeg($miniature, $avatar_id);
	}


}
