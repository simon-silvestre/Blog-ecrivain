<?php

require_once('modele/PostManager.php');
require_once('modele/CommentManager.php');


class ControllerBackEnd
{

    function List_Chapitres()
    {
        $postManager = new PostManager();
        $rep = $postManager->getPosts(); 

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

        require('view/CommentairesAdmin.php');
    }

    function supprimerCommentaire($post_id)
    {
        $commentManager = new CommentManager();
        
        $delCommentaire = $commentManager->suppAdminComment($post_id);

        $_SESSION['message'] = "Le commentaire a été supprimé avec succès";
        $_SESSION['msg_type'] = "danger";
        
        header('Location: index.php?action=listComment');

    }

    function approuverCommentaire($id)
    {
        $commentManager = new CommentManager();

        $appCommentaire = $commentManager->appAdminComment($id);

        $_SESSION['message'] = "Le commentaire a été approuvé avec succès";
        $_SESSION['msg_type'] = "success";

        header('Location: index.php?action=listComment');
    }

    function LoginSysteme($nom, $mdp)
    {
        $postManager = new PostManager();

        $resultLogin = $postManager->getLogin($nom);

        if($resultLogin == true)
        {
            if(password_verify($mdp, $resultLogin['mdp']))
            {
                $_SESSION['name'] = $resultLogin['name'];
                $_SESSION['mdp'] = $resultLogin['mdp'];
                $_SESSION['id'] = $resultLogin['id'];

                header('Location: index.php?action=ListChapitres');
            } 
            else
            {
                $_SESSION['message'] = "Le mot de passe est faux";
                $_SESSION['msg_type'] = "danger";
            }
        }
        else 
        {
            $_SESSION['message'] = "Cet utilisateur n'existe pas";
            $_SESSION['msg_type'] = "danger";
        }
        require('view/LoginPage.php');
    }

    function LogoutPage()
    {
        session_destroy();
        header('Location: index.php?action=Home');
    }
}
