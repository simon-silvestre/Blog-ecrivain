<?php $title = 'Commentaires manager'; ?>

<?php ob_start(); ?>

<?php 
if (isset($_SESSION['message'])) { 
?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
}?>
</div>

<div class="container">

    <h2 class=" com_title mt-5 mb-5 text-center">Gestionnaire de commentaires</h2>
    <?php while ($comment = $comments->fetch()){ ?>
    <?php if($comment['signaler'] == 1){?>
    <div class="row mb-2 card_com">
        <div class="col card-body card text-white bg-secondary mb-3">
            <p style="color: #222;"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
             <p style="color: #222;"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
             <form class="form-inline mt-3 mt-md-0">
                <a class="btn btn-primary col-5 col-md-2 ml-md-auto mx-md-0 mx-auto " href="index.php?action=approuverComment&amp;id=<?= $comment['id'] ?>">Approuver</a>
                <a class="btn btn-danger col-5 col-md-2 ml-md-4 mx-md-0 mx-auto" href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>">Supprimer</a>
            </form>
         </div>
    </div>
    <?php } else if ($comment['signaler'] == 0){ ?>
    <div class="row mb-2 card_com">
        <div class="col card-body card text-white bg-secondary mb-3">
            <p style="color: #222;"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
             <p style="color: #222;"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
             <form class="form-inline mt-md-0">
                <a class="btn btn-danger col-5 col-md-2 mr-4 mr-md-0 ml-auto" href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>">Supprimer</a>
            </form>
         </div>
    </div>
    <?php }?>
    <?php 
    }
    $comments->closeCursor();
    ?>

</div>

<?php $content = ob_get_clean() ?>

<?php require('NavBarTemplate.php'); ?>
    