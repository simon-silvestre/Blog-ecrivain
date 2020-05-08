<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>

<div id="HomePage">
	<div class="section_banner">
		<img src="assets/fond.jpg" class="img-banner" alt="Responsive image">
		<div class="col-auto">
			<h1 class=" text_banner">Billet simple pour l'Alaska</h1>
		</div>
		</div>
	<div class="jumbotron">
		<h1 class="display-4 biographie_title">Jean Forteroche</h1>
		<div class="row justify-content-center">
				<div class="col-4 mb-5 mb-md-0 col-md-3 ID">
					<img src="assets/jean_ID.jpg" class="card-img" alt="">
				</div>
				<p class="lead col-12 col-sm-9 ">Né en 1974 à Antibes, il se prend de passion pour la littérature très jeune, consacrant tout son temps libre à dévorer des livres dans la bibliothèque 
					municipale où travaille sa mère. C’est grâce à un concours de nouvelles proposé par son professeur de 
					français qu’il découvre le bonheur de l’écriture. À compter de ce jour, et jusqu’à aujourd’hui, il ne cessera plus de noircir des carnets.
				</p>
		</div>
		<hr class="my-4 col-11 mx-auto">
		<p class="col-12 col-sm-11 mx-auto text_intro_jumbotron">C'est une première pour Jean Forteroche de vous dévoiler en exclusivité son nouveau livre sur son site web.</p>
		<form class="form-inline col-12 col-sm-11 mx-auto">
			<a class="btn btn-primary btn-lg chapitre_button" id="btnBlack" href="index.php?action=listPosts" role="button">Voir les chapitres</a>
		</form>
	</div>
	<h2 class=" com_title mt-5 mb-5 text-center">Ses ouvrages</h2>
	<div class="row col-12 justify-content-around flex-wrap">
		<div class="col-md-3 col-lg-2 col-4 mb-4 mt-4">
			<img src="assets/livre1.png" class="card-img book_img" alt="">
		</div>
		<div class="col-md-3 col-lg-2 col-4 mb-4 mt-4">
			<img src="assets/livre2.png" class="card-img book_img" alt="">
		</div>
		<div class="col-md-3 col-lg-2 col-4 mb-4 mt-4">
			<img src="assets/livre3.png" class="card-img book_img" alt="">
		</div>
	</div>
</div>

<?php $content = ob_get_clean() ?>
<?php require('NavBarTemplate.php'); ?>