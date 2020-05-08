<?php

require_once('modele/PostManager.php');
require_once('modele/CommentManager.php');

class ControllerFrontEnd
{

    function listPosts()
    {
        $postManager = new PostManager(); //creation d'un objet
        $posts = $postManager->getposts(); //appel d'une fonction de cet objet

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
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    function Show_HomePage()
    {
        require('view/HomePage.php');
    }
}