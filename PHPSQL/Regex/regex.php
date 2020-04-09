<?php

$regex_mail='#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';
$regex_tel='#^0[1-8]([-. ]?[0-9]{2}){4}$#';

?>

<p>
<?php
if (isset($_POST['mail']) AND strlen($_POST['mail']) >= 1)
{
    $_POST['mail'] = strip_tags($_POST['mail'] );


	    if (preg_match($regex_mail, $_POST['mail'])){
	    	 $_POST['mail'] = preg_replace($regex_mail, '<a href="mailto:$0">$0</a>', $_POST['mail'] );
	        echo 'L\'adresse ' . $_POST['mail'] . ' est <strong>valide</strong> !';
	    } else{
	        echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
	    }

   
}

if (isset($_POST['tel']) AND strlen($_POST['tel']) >= 1)
{

	 $_POST['tel'] = strip_tags($_POST['tel']); 

	    if (preg_match($regex_tel, $_POST['tel'])){
	        echo 'Le numéro' . $_POST['tel'] . ' est <strong>valide</strong> !';
	    } else {
	        echo 'Le numéro ' . $_POST['tel'] . ' n\'est pas valide, recommencez !';
	    }
}

?>
</p>

<form method="post">
<p>
    <label for="mail">Votre mail ?</label> <input id="mail" name="mail" /><br /> 
    <input type="submit" value="Vérifier le mail" /><br /> 
    <label for="tel">Votre téléphone ?</label> <input id="tel" name="tel" /><br /> 
    <input type="submit" value="Vérifier le téléphone" /><br /> 
</p>
</form>