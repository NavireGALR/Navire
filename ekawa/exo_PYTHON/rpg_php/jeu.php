<?php

function getClasses($class){ require $class . '.php';}
spl_autoload_register('getClasses'); 
session_start();

$persoManager = new PersoManager();

$default = [
  'strength' => 10,
  'life' => 100,
  'level' => 1,
  'xp' => 0
];


if(isset($_POST['create']))
{
	$namePerso = strip_tags($_POST['name']);
	$newPerso = new Perso($default);
	$nameOk = $newPerso->setName($namePerso);

	if(!$nameOk){ 
		$msg = "Veuillez entrer un nom valide !";
		unset($newPerso);
	}
	else if($persoManager->exists($namePerso)){ 
		$msg = "Ce personnage existe déjà !";
		unset($newPerso);
	}
	else{ $persoManager->add($newPerso); }
}


if(isset($_POST['hit']) AND isset($_POST['target']))
{
	$nameTarget = strip_tags($_POST['target']);
	$persoExist = $persoManager->exists($nameTarget);
	if($persoExist)
	{
		$idPerso = (int) $_POST['id_perso'];
		$attacker = $persoManager->get($idPerso);
		$target = $persoManager->get($nameTarget);

		$result = $attacker->hit($target);
		switch($result){
			case Perso::SELF_HIT :
				$msg = 'Pourquoi vous frappez-vous ? ';
				break;
			case Perso::PERSO_HIT :
				$msg = 'BIM !';
				$persoManager->update($attacker);
				$persoManager->update($target);
				break;
			case Perso::PERSO_DEADED :
				$msg = 'Votre cible est morte ! Bien ouej !';
				$persoManager->update($attacker);
				$persoManager->delete($target);
				break;
		}

	}else{ $msg='Ce perso n\'existe pas !'; }
}


$persos = $persoManager->getList();

if(empty($persos)){ $msg = 'Pas de personnage créé !'; }
else{

	foreach ($persos as $onePerso)
	{?>
	<form action="" method="post">
		<fieldset>
			<legend>Personnage <?= $onePerso->getId(); ?> </legend>
			 <p>
				Nom : <?= $onePerso->getName(); ?><br />
				Force : <?= $onePerso->getStrength(); ?> <br />
				Vie : <?= $onePerso->getLife(); ?><br />
				Level : <?= $onePerso->getLevel(); ?> <br />
				Xp : <?= $onePerso->getXp(); ?> <br />
			</p>
			<input type="submit" name="use" value="Utiliser ce personnage">
			<input type="hidden" name="id_perso" value="<?= $onePerso->getId(); ?>">
		</fieldset>
	</form>
	<?php
	}
}

if(isset($_POST['use']))
{
?>
	<form action="" method="post">
      <p>
        Quel personnage souhaitez-vous frapper ? : <input type="text" name="target" maxlength="50" required />
        <input type="submit" value="Frapper" name="hit" />
        <input type="hidden" name="id_perso" value="<?= $_POST['id_perso']; ?>" />
      </p>
    </form>
<?php
}

if(isset($msg)){ echo $msg; }

?> 

<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    <meta charset="utf-8" />
  </head>

  <body>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="name" maxlength="50" required />
        <input type="submit" value="Créer ce personnage" name="create" />
      </p>
    </form>
  </body>
</html>
