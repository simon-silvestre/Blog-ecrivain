
<?php $title = htmlspecialchars($post['title']); ?>

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
    <div class="row">
        <div class="col">
            <h1 class="display-4 biographie_title mt-5"><?= $post['title'] ?></h1>
            <p class="card-text mb-5 Page_chapitre"><?= $post['content'] ?></p>
        </div>
    </div>
   
    <h2 class=" com_title mt-5 mb-5 text-center">Commentaires</h2>

    <div class="row ">
        <div class="col card-body card mb-5" style="border: 1px solid #222;">
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div class="form-group" style="color: #222;">
                    <label for="author">Nom</label>
                    <input type="text" class="form-control comment_input" id="exampleInputEmail1" name=author aria-describedby="emailHelp">
                </div>
                <div class="form-group" style="color: #222;">
                    <label for="comment">Commentaire</label>
                    <input type="comment" class="form-control comment_input" id="exampleInputPassword1" name="comment">
                </div>
                <button type="submit" class="btn btn-primary" id="btnBlack">Envoyer</button>
            </form>
        </div>
    </div>

    <?php
    while ($comment = $comments->fetch())
    {
    ?>
    <?php if($comment['signaler'] == 0){?>
    <div class="row card_com">
        <div class="col card-body card text-white bg-secondary mb-3">
            <p style="color: #222;"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p style="color: #222;"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <form class="form-inline mt-md-0">
                <a class="btn btn-danger col-5 col-md-2 mr-4 mr-md-0 ml-auto" href="index.php?action=signalerComment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>">Signaler</a>
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