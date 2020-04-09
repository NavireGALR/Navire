<?php

header ("Content-type: image/jpeg"); // L'image que l'on va créer est un jpeg

$source = imagecreatefromjpeg("coucher_soleil.jpg"); // La photo est la source
$destination = imagecreatetruecolor(200, 150); // On crée la miniature vide

// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

// On crée la miniature
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);


if(is_file("mini_couchersoleil.jpg")){
	// On affiche l'image
	imagejpeg($destination);

}else{
	// On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
	imagejpeg($destination, "mini_couchersoleil.jpg");
}

?>