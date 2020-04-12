<?php $title = 'Listes des articles'; ?>

<?php ob_start(); ?>
    <h1>Listes des nouveaux articles</h1>
     <a href="index.php?action=profil"> MON PROFIL</a>

<?php
    while($post = $posts->fetch()){
?>
        <div class="post">
            <h2><?= $post['title'] ;?>  créé par <?= $post['author'] ;?>  le <?= $post['date_post_fr'] ;?> </h2>
            <p> 
                <?= $post['content'] ;?>
            </p>
            <a href="index.php?post=<?= $post['id'] ;?>"> Voir les commentaires </a>
        </div>
    
<?php
    }
    $posts->closeCursor();
?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>