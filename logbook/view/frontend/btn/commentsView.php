<?php $title = 'Article de '. $post['author']; ?>

<?php ob_start(); ?>

<article class="offset-lg-1 col-lg-10">
    
    <div class="row">
        <img src="zressources/images/ancre.png" alt="ancre" id="logo_h1">
        <h2>Article de <?= $post['author'] ?> </h2>
    </div>

    <div class="new_post">
        <div class="title_post row align-items-center justify-content-between">
          <h3><?= $post['title'] ;?></h3> 
          <small class="text-muted">par <?= $post['author'] ;?>  le <?= $post['date_post_fr'] ;?> </small>
        </div>
        <p> <?= $post['content'];?> </p>
        <a href="index.php?action=none">Retour</a>
    </div>

<h2> Derniers commentaires :</h2><br/>
<div class="row">
    <div class="comment col-lg-8">
            <?php
        while($comment = $comments->fetch())
        {   ?>

                <p>
                    <strong><?= $comment['pseudo']; ?></strong> 
                    <small class="text-muted">le <?= $comment['date_comment_fr']; ?></small> : 
                    <br/><?= $comment['comments']; ?>
                </p>
           
            <?php
        }

        $comments->closeCursor();
            ?>
    </div>

    <?php if (isset ($_SESSION['login'])){ ?>
        <form action="index.php?idcomment=<?= $post['id']; ?>" method="post" class="col-lg-4" id="send_comment">
                <h5> Postez votre commentaire :</h5>
                <small class="text-muted"> Pseudo : <?= $_SESSION['login']; ?></small>
                <textarea name="comment" id="comment"></textarea>
                <br/>
                <input type="submit" name="send" id="send" value="Envoyer">
                <br/>
        </form>
    <?php } ?>
    
</div>

</article>



<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>