<?php $title = 'Chapitres manager'; ?>



<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col card-body mb-5">
            <form action="index.php?action=update" method="post"> 
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <div class="form-group" style="color: #222;">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control comment_input" id="InputTitle" name="title" value="<?= $titre; ?>">
                </div>

                <div class="form-group" style="color: #222;">
                    <label for="content">Introduction</label>
                    <textarea class="form-control comment_input" id="intro" name="intro" rows="3"><?= $intro; ?></textarea>
                </div>
                
                <div class="form-group" style="color: #222;">
                    <label for="content">Contenu</label>
                    <textarea class="form-control" id="mytextarea" name="content" rows="3"><?= $content; ?></textarea>
                </div>
                <?php if ($update == true){?>
                    <button type="submit" class="btn btn-info" name="update">Modifier</button>
                <?php }else{?>
                    <button type="submit" class="btn btn-success" name="save">Ajouter l'article</button>
                <?php }?>
            </form>
        </div>
    </div>
</div>


<script>
    tinymce.init({
      selector: '#mytextarea',
      height: "350"
    });
</script>
    
<?php $content = ob_get_clean() ?>

<?php require('NavBarTemplate.php'); ?>
    