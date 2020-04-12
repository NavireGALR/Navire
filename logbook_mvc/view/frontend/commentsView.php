<?php $title = 'Commentaires Article' ?>

<?php ob_start(); ?>
    <h1>Article de <?= $post['author'] ?> </h1>
     <a href="index.php?action=profil"> MON PROFIL</a>


    <div class="post">
        <h2><?= $post['title'];?>  le <?= $post['date_post_fr'];?> </h2>
        <p> 
            <?= $post['content'];?>
        </p>
        <a href="index.php?action=listpost"> Retour aux articles </a>
    </div>



        <?php
    while($comment = $comments->fetch())
    {   ?>

        <div class="comment">
            <p>
                <strong><?= $comment['pseudo']; ?></strong> 
                <em>le <?= $comment['date_comment_fr']; ?></em> : 
                <br/><?= $comment['comments']; ?>
            </p>
        </div>
    
        <?php
    }

    $comments->closeCursor();
        ?>

    <form action="index.php?idcomment=<?= $post['id']; ?>" method="post">
        <p>
            
            <label for="comment"> Votre commentaire : </label><br/>
            <textarea name="comment" id="comment"></textarea>
            <br/>

            <input type="submit" name="send" id="send" value="Envoyer">
            <br/>
        </p>
    </form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>