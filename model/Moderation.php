<?php
require_once("model/Manager.php"); 

class Moderation extends Manager {

	public function view()
	{
		$db = $this->dbConnect();
		$comments = $db->query('SELECT id, author, comment, approved, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM comment WHERE approved = 1 ORDER BY comment_date');
		return $comments ;
	}

	public function approved()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comment SET approved = NULL WHERE id = ? ');
		$req->execute(array($_GET['comment']));
	}

	public function report($comment)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comment SET approved = 1 WHERE id = ? ');
		$req->execute(array($comment));
		return $req;
	}

	public function delete_comment()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comment WHERE id = ? ');
		$req->execute(array($_GET['comment']));
	}

	public function connect()
	{
		$db = $this->dbConnect();
		$connect = $db->prepare('SELECT pseudo, password FROM member WHERE pseudo = ?');
		$connect->execute(array($_POST['pseudo']));
		$resultat = $connect->fetch();
		if ($_POST['password'] == $resultat['password']) {
			session_destroy();
			session_start();
			$_SESSION['pseudo'] = $resultat['pseudo'];
		};
	}

	public function addPostSubmit($title,$paragraphe,$text)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO billet (title, paragraphe, content, creation_date) VALUES(?, ?, ?, NOW())');
		$req->execute(array($title,$paragraphe,$text));
	}

	public function getTitles()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billet ORDER BY creation_date');
        return $req;
    }

    public function editPostSubmit($title,$paragraphe,$text,$id)
    {
		$db = $this->dbConnect();
		$req = $db->prepare("UPDATE billet SET title=?, paragraphe=?, content=? WHERE id = ?");
		$req->execute(array($title,$paragraphe,$text,$id));
	}

	public function deletePost()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM billet WHERE id = ? ');
		$req->execute(array($_GET['id']));
		$req->closeCursor();
		$req = $db->prepare('DELETE FROM comment WHERE post_id = ? ');
		$req->execute(array($_GET['id']));
		$req->closeCursor();
	}
}