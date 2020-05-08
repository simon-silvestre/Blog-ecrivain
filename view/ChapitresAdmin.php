<?php $title = 'Chapitres manager'; ?>


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
    <h2 class=" com_title mt-5 mb-5 text-center">Gestionnaire d'articles</h2>

    <table class="table mt-5">
    <thead id="adminTab">
        <tr class="center_form">
        <th scope="col">Titre</th>
        <th class="text-center" scope="col">Date</th>
        <th class="text-center" scope="col">Actions</th>
        </tr>
    </thead>

    <tbody id="adminTabRow">
        <?php
        while ($tab = $rep->fetch())
        {
        ?>
         <tr class="center_form">
            <td><?= $tab['title']?></td>
            <td class="text-sm-center"><?= $tab['creation_date_fr']?></td>
            <td class="text-center icon_container">
                <a class="btn btn-warning icon_btn" href="index.php?action=post&id=<?= $tab['id'] ?>"><i class="far fa-eye"></i></a>
                <a class="btn btn-info icon_btn" href="index.php?action=edit&amp;id=<?= $tab['id'] ?>"><i class="far fa-edit"></i></a>
                <a class="btn btn-danger" href="index.php?action=deleteChapter&amp;id=<?= $tab['id'] ?>"><i class="far fa-trash-alt"></i></a>
                
            </td>
        </tr>
        <?php 
        }
        $rep->closeCursor();
        ?>
    </tbody>
    </table>

    <a class="btn btn-success mb-5" href="index.php?action=addChapter">Ajouter un article</i></a>
</div>


<?php $content = ob_get_clean() ?>

<?php require('NavBarTemplate.php'); ?>
    