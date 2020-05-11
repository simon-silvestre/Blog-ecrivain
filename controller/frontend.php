<?php
require_once('modele/PostManager.php');
require_once('modele/CommentManager.php');

class ControllerFrontEnd
{
    function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getposts(); 

        require('view/Chapitres.php');
    }

    function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/chapitre_Post.php');
    }

    function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            $_SESSION['message'] = "Le comentaire a été ajouté avec succès";
            $_SESSION['msg_type'] = "success";
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    function Show_HomePage()
    {
        require('view/HomePage.php');
    }

    function signalerCommentaire($id, $postid)
    {
        $commentManager = new CommentManager();

        $sigCommentaire = $commentManager->sigAdminComment($id);

        $_SESSION['message'] = "Le comentaire a été signaler avec succès";
        $_SESSION['msg_type'] = "danger";

        header('Location: index.php?action=post&id=' . $postid);
    }

    function viewLoginPage()
    {
        require('view/LoginPage.php');
    }
}