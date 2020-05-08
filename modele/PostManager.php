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

    public function listChapitre()
    {
        $db = $this->dbConnect();
        $rep = $db->query('SELECT id, title, intro, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM chapter_list ORDER BY creation_date');

        return $rep;
    }

    public function suppChapitre($Id)
    {
        $db = $this->dbConnect();
        $delChapitre = $db->prepare("DELETE FROM chapter_list WHERE id= ? ");
        $delChapitre->execute(array($Id));

        return $delChapitre;
    }

    public function postChapitre($title, $intro, $content)
    {
        $db = $this->dbConnect();
        $chapitre = $db->prepare("INSERT INTO chapter_list(id, title, intro, content, creation_date) VALUES(NULL, ?, ?, ?, NOW())");
        $listChapitre = $chapitre->execute(array($title, $intro, $content));

        return $listChapitre;
    }

    public function editChapitre($Id)
    {
        $db = $this->dbConnect();
        $req1 = $db->prepare("SELECT * FROM chapter_list WHERE id = ?");
        $req1->execute(array($Id));
        $edit = $req1->fetch();
        
        return $edit;
    }

    public function upChapitre($id, $titre, $intro, $content)
    {
        $db = $this->dbConnect();
        $up = $db->prepare("UPDATE chapter_list SET title= ?, intro = ?, content = ?  WHERE id = ?");
        $update = $up->execute(array($titre, $intro, $content, $id));

        return $update;
    }

    public function getLogin($nom)
    {
        $db = $this->dbConnect();
        $login = $db->prepare("SELECT * FROM user WHERE name = ?");
        $login->execute(array($nom));
        $resultLogin = $login->fetch();

        return $resultLogin;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=P4_ecrivain;charset=utf8', 'root', 'root');
        return $db;
    }
    
}
