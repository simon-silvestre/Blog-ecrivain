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

    
    function viewEditForm($Id)
    {
        $postManager = new PostManager();
        $edit = $postManager->editChapitre($Id);

        $titre = $edit['title'];
        $intro = $edit['intro'];
        $content = $edit['content'];

        $update = true;

        require('view/FormulaireAdmin.php');
    }

    function updateChapitre($id, $titre, $intro, $content)
    {

        $postManager = new PostManager();

        $update = $postManager->upChapitre($id, $titre, $intro, $content);

        
        if ($update === false) {
            throw new Exception('Impossible de modifier le chapitre !');
        }
        else {
            $_SESSION['message'] = "Le chapitre a été modifié avec succès";
            $_SESSION['msg_type'] = "info";

            header('Location: index.php?action=ListChapitres');
        }
    }

    function listCommentaires()
    {
        $commentManager = new CommentManager();
        $comments = $commentManager->listAdminComments();
        $sigcomments = $commentManager->listAdminComments();

        require('view/CommentairesAdmin.php');
    }

    function supprimerCommentaire($post_id)
    {
        $commentManager = new CommentManager();
        
        $delCommentaire = $commentManager->suppAdminComment($post_id);

        $_SESSION['message'] = "Le comentaire a été supprimé avec succès";
        $_SESSION['msg_type'] = "danger";
        
        header('Location: index.php?action=listComment');

    }

    function approuverCommentaire($id, $postid)
    {
        $commentManager = new CommentManager();

        $appCommentaire = $commentManager->appAdminComment($id);

        $_SESSION['message'] = "Le comentaire a été approuvé avec succès";
        $_SESSION['msg_type'] = "success";

        header('Location: index.php?action=listComment');
    }

}
