<?php
class PostManager
{

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, intro, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM chapter_list ORDER BY creation_date');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, intro, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM chapter_list WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=P4_ecrivain;charset=utf8', 'root', 'root');
        return $db;
    }
    
}
