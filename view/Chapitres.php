<?php $title = 'Chapitres'; ?>


<?php ob_start(); ?>

<div class="container-fluid">
<div class="row mt-5">
    <?php
    while ($data = $posts->fetch())
    {
    ?>
   <div class="col-sm-6 col-md-5 col-lg-4 mb-4 mx-sm-auto mx-lg-0 mt-4">
    <div class="card text-white bg-secondary mb-3" >
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($data['title'])?></h5>
        <p class="card-text"><?= $data['intro']?></p>
        <a href="index.php?action=post&id=<?= $data['id'] ?>" class="btn btn-primary" id="btnBlack">Voir le chapitre</a>
      </div>
    </div>
  </div>
<?php 
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean() ?>

<?php require('NavBarTemplate.php'); ?>
    

