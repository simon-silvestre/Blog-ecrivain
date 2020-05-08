<?php
require('controller/FrontEnd.php');

$ControllerFrontEnd = new ControllerFrontEnd();


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        $ControllerFrontEnd->listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $ControllerFrontEnd->post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $ControllerFrontEnd->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Aucun identifiant de billet envoyé';
        }
    }
     elseif ($_GET['action'] == 'Home') {
        $ControllerFrontEnd->Show_HomePage();
    }
}
    
else {
    $ControllerFrontEnd->Show_HomePage();
}