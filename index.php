<?php
session_start();
require('controller/BackEnd.php');
require('controller/FrontEnd.php');

$ControllerBackEnd = new ControllerBackEnd();
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
    elseif ($_GET['action'] == 'ListChapitres') {
        $ControllerBackEnd->List_Chapitres();
    }
    elseif ($_GET['action'] == 'deleteChapter') {
        $ControllerBackEnd->supprimerChapitre($_GET['id']);
    }
    elseif ($_GET['action'] == 'addChapter') {
        $ControllerBackEnd->viewAddForm();
    }
    elseif (isset($_POST['save'])){
        if (!empty($_POST['title']) && !empty($_POST['intro']) && !empty($_POST['content'])) {
            $ControllerBackEnd->addChapitre($_POST['title'], $_POST['intro'], $_POST['content']);
        }
        else {
            echo 'Tous les champs ne sont pas remplis !';
        }
    }
    elseif ($_GET['action'] == 'edit') {
        $ControllerBackEnd->viewEditForm($_GET['id']);
    }
    elseif (isset($_POST['update'])){
        if (isset($_POST['id']) && $_POST['id'] > 0) {
            if (!empty($_POST['title']) && !empty($_POST['intro']) && !empty($_POST['content'])) {
                $ControllerBackEnd->updateChapitre($_POST['id'], $_POST['title'], $_POST['intro'], $_POST['content']);
            }
            else {
                echo 'Tous les champs ne sont pas remplis !';
            } 
        }
        else {
        echo 'Aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'listComment') {
        $ControllerBackEnd->listCommentaires();
    }
    elseif ($_GET['action'] == 'deleteComment') {
        $ControllerBackEnd->supprimerCommentaire($_GET['id']);
    }
    elseif ($_GET['action'] == 'signalerComment') {
        $ControllerFrontEnd->signalerCommentaire($_GET['id'], $_GET['postid']);
    }
    elseif ($_GET['action'] == 'approuverComment') {
        $ControllerBackEnd->approuverCommentaire($_GET['id'], $_GET['postid']);
    }
    elseif ($_GET['action'] == 'login') {
        $ControllerFrontEnd->viewLoginPage();
    }
    elseif ($_GET['action'] == 'logout') {
        $ControllerBackEnd->LogoutPage();
    }
    elseif (isset($_POST['connexion'])){
        if (!empty($_POST['name']) && !empty($_POST['mdp'])) {
            $ControllerBackEnd->LoginSysteme($_POST['name'], $_POST['mdp']);
        }
        else {
            echo 'Tous les champs ne sont pas remplis !';
        } 
    }
}
    
else {
    $ControllerFrontEnd->Show_HomePage();
}