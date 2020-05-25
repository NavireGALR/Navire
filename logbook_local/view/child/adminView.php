<?php $title = 'Page Admin'; ?>

<?php ob_start(); ?>

<article class="offset-lg-1 col-lg-10">

    <?= $alert ?>

    <div class="row justify-content-between">
        <div class="row">
            <img src="zressources/images/ancre.png" alt="ancre" class="icon_title">
            <h1>Page d'administration des utilisateurs</h1>
        </div>

        <div>
            <a href="index.php?action=profil">
                <button id="profil_btn" class="my-lg-2 btn btn-dark">Retour profil</button>
            </a>
        </div>
    </div>

    <div class="my-5">
        <h2>Compteur de visiteurs</h2>
        <span> Au total, Logbook a reçu <?= $nb_view ?> visiteurs !</span>
    </div> 

    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead class="bg-primary">
                <tr>
                  <th scope="col">Avatar</th>
                  <th scope="col">Pseudo</th>
                  <th scope="col">Mail</th>
                  <th scope="col">Groupe</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            while($table = $infos->fetch()){ 
                $groupMember = $memberManager->getMember($table['pseudo']); 
            ?>
                <tr>
                  <td>
                    <img alt="Avatar de <?= $table['pseudo'] ?>" src="zressources/avatars/<?= $table['id'] ?>.jpg?filemtime(<?php echo time(); ?>)"/>
                  </td>
                  <td class="align-middle"><?= $table['pseudo'] ?></td>
                  <td class="align-middle"><?= $table['mail'] ?></td>
                  <td class="align-middle text-capitalize"><?= $groupMember['group'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

     <div class="my-5">
        <h2>Changer l'utilisateur de groupe</h2>
        <form class="p-4 my-5 col-lg-5" id="form_updategroup" action="index.php?action=update_group" method="post">
            <div class="form-group">
                <label for="pseudo "> Pseudo de l'utilisateur :</label>
                <input type="text" name="pseudo" id="pseudo" required>
            </div>
            <div class="form-group">
                <select name="newgroup" id="newgroup">
                    <option value="1">1. Captain</option>
                    <option value="2" selected >2. Sailor</option>
                    <option value="3">3. Recruiter</option>
                    <option value="4">4. Writer </option>
                </select>
                <button type="submit" name="confirm_change_group" id="confirm_change_group" class="my-lg-2 btn btn-primary">Confirmer</button>
            </div>
        </form>
    </div>

</article>
    

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
