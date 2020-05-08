<?php

require_once('modele/PostManager.php');
require_once('modele/CommentManager.php');


class ControllerBackEnd
{

    function List_Chapitres()
    {
        $postManager = new PostManager();
        $rep = $postManager->listChapitre(); 

        $titre = '';
        $content = '';


        $update = false;

        require('view/ChapitresAdmin.php');
    }


    function supprimerChapitre($Id)
    {
        $postManager = new PostManager();

        $delChapitre = $postManager->suppChapitre($Id);

        $_SESSION['message'] = "Le chapitre a été supprimé avec succès";
        $_SESSION['msg_type'] = "danger";
        
        header('Location: index.php?action=ListChapitres');

    }

    function viewAddForm()
    {
        $postManager = new PostManager();
        $rep = $postManager->listChapitre(); 

        $titre = '';
        $intro = '';
        $content = '';

        $update = false;
        

        require('view/FormulaireAdmin.php');
    }

    function addChapitre($title, $intro, $content)
    {

        $postManager = new PostManager();

        $listChapitre = $postManager->postChapitre($title, $intro, $content);
        
        if ($listChapitre === false) {
            throw new Exception('Impossible d\'ajouter le chapitre !');
        }
        else {
            $_SESSION['message'] = "Le chapitre a été enregistré avec succès";
            $_SESSION['msg_type'] = "success";
            
            header('Location: index.php?action=ListChapitres');
        }
    }

}
