<?php $title = 'Mon Profil'; ?>

<?php ob_start(); ?>

<article class="offset-lg-1 col-lg-10">

<?php if(isset($alert_ok)){?>
    <div class="alert alert-success my-3" role="alert">
        <?= $alert_ok ?>
    </div>
<?php }?>

    <div class="row justify-content-between">
        <div class="row align-items-center">
            <h2 class="ml-4 mr-2"><?= $pseudo ?></h2><small class="text-muted">Profil </small>
        </div>
        
        <div class="offset-lg-8 col-lg-2">    
            <a href="index.php?action=out">
            <button id="deco" class="btn btn-warning">Déconnexion</button>
            </a>
            <?php if(strlen($page_admin) >= 1){
            ?>
                <a href="<?= $page_admin ?>">
                <button id="admin_btn" class="my-lg-2 btn btn-dark">Page Admin</button>
                </a>
            <?php
            }
            ?>
        </div>
    </div>

        <div class="my-4 mx-4 row align-items-center">
            <img class="rounded" src="zressources/avatars/<?= $id ?>.jpg?filemtime(<?php echo time(); ?>)" alt="avatar"/>
            <form method="post" action="index.php?action=update" enctype="multipart/form-data">  
                <label class="mx-lg-4"> Choisir un nouvel avatar: </label>
                    <div class="custom-file mx-lg-4"> 
                        <input type="file" name="avatar" />
                        <button type="submit" name="add_avatar" class="btn btn-primary"> Envoyer </button>
                    </div> 
            </form>
        </div>

        <div class="card border-primary mx-lg-5 my-5">
            <div class="card-header bg-dark text-white">
                <h3>Mes informations</h3> 
                <a href="index.php?action=contact"><button class="btn btn-outline-primary"> Envoyer une demande pour devenir rédacteur</button></a>
            </div>
            <div class="card-body row">
                <div class="col-lg-4 mt-2">
                    <h5 class="card-title text-primary">Adresse mail</h5>
                    <p class="info_profil card-text"><?= $mail ?></p>
                </div>
                <div class="col-lg-4 mt-2">
                    <h5 class="card-title text-primary">Groupe</h5>
                    <p class="info_profil card-text"><?= $id_group ?></p>
                </div>
                <div class="col-lg-4 mt-2">
                    <h5 class="card-title text-primary">Profil créé le </h5>
                    <p class="info_profil card-text"><?= $date_crea ?></p>
                </div>
                <div class="col-lg-4 mt-2">
                    <h5 class="card-title text-primary">Ville</h5>
                    <p class="info_profil card-text"><?= $city ?></p>
                </div>
                <div class="col-lg-4 mt-2">
                    <h5 class="card-title text-primary">Entreprise</h5>
                    <p class="info_profil card-text"><?= $company ?></p>
                </div>
                <div class="col-lg-4 mt-2">
                    <h5 class="card-title text-primary">Poste actuel</h5>
                    <p class="info_profil card-text"><?= $currentPosition ?></p>
                </div>
            </div>
        </div>

    
    <h2>Modifier mon profil</h2>

    <form method="post" action="index.php?action=update">
        <div class="row justify-content-around">
            <div class="card col-lg-3 p-4 col-12">
                <h3 class="card-title">Pseudo</h3>
                <label for="pseudo"> Choisir un nouveau pseudo :</label>
                <input type="text" name="new_pseudo" id="pseudo_update">
                <button type="submit" id="pseudo_update" name="pseudo_update" class="my-3 btn btn-primary"> Changer Pseudo </button>
            </div>

            <div class="card col-lg-3 p-4">
                <h3>Mot de passe</h3>
                <label for="password"> Mot de passe actuel :</label>
                <input type="password" name="actual_pass" id="actual_pass">
                <label for="password"> Nouveau mot de passe :</label>
                <input type="password" name="new_pass1" id="new_pass1">
                <label for="password"> Confirmer nouveau mot de passe :</label>
                <input type="password" name="new_pass2" id="new_pass2">
                <button type="submit" id="pass_update" name="pass_update" class="my-3 btn btn-primary"> Changer le mot de passe </button>
            </div>

            <div class="card col-lg-3 p-4">
                <h3>Informations</h3>
                <label for="city"> Ville :</label>
                <input type="text" name="city" id="city">

                <label for="company"> Entreprise :</label>
                <input type="text" name="company" id="company">

                <label for="currentPosition"> Poste actuel :</label>
                <input type="text" name="currentPosition" id="currentPosition">
                <button type="submit" id="add_info" name="add_info" class="my-3 btn btn-primary"> Mettre à jour </button>
            </div>
         </div>   
    </form>
</article>

<?php $content = ob_get_clean();
 ?>

<?php require('view/template.php'); ?>
