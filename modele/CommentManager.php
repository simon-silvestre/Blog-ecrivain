<?php
class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, signaler, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(post_id, signaler, author, comment, comment_date) VALUES(?, 0, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function listAdminComments()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, signaler, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comment ORDER BY signaler DESC, comment_date DESC');
        $comments->execute(array());

        return $comments;
    }

    public function suppAdminComment($post_id)
    {
        $db = $this->dbConnect();
        $delCommentaire = $db->prepare("DELETE FROM comment WHERE id= ? ");
        $delCommentaire->execute(array($post_id));

        return $delCommentaire;
    }

    public function sigAdminComment($id)
    { 
        $db = $this->dbConnect();
        $sigCommentaire = $db->prepare("UPDATE comment SET signaler = 1  WHERE id = ?");
        $sigCommentaire->execute(array($id));

        return $sigCommentaire;
    }

    public function appAdminComment($id)
    { 
        $db = $this->dbConnect();
        $sigCommentaire = $db->prepare("UPDATE comment SET signaler = 0  WHERE id = ?");
        $sigCommentaire->execute(array($id));

        return $sigCommentaire;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=P4_ecrivain;charset=utf8', 'root', 'root');
        return $db;
    }
}