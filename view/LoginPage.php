<?php $title = 'Login page'; ?>

<?php ob_start(); ?>

<div class="form_bg">
    <div class="container"> 
         <div class="row justify-content-center">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                <form class="form_horizontal" action="index.php?action=connexion" method="post">
                    <div class="form_icon"><i class="fa fa-user-circle"></i></div>
                    <h3 class="title">Se connecter</h3>
                    <div class="form_group">
                        <span class="input-icon"><i class="fa fa-user"></i></span>
                        <input class="form-control" type="text" name="name" placeholder="Nom">
                    </div>
                    <div class="form_group">
                        <span class="input-icon"><i class="fa fa-lock"></i></span>
                        <input class="form-control" type="password" name="mdp" placeholder="Mot de passe">
                    </div>
                    <button type="submit" class="btn signin" name="connexion">Connexion</button>
                </form>
             </div>
        </div>
    </div>
</div>
   
<?php $content = ob_get_clean() ?>

<?php require('NavBarTemplate.php'); ?>
    