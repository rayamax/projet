<?php
require_once("model/Manager.php"); 

class Moderation extends Manager {

	public function view(){

		$db = $this->dbConnect();
		$comments = $db->query('SELECT id, author, comment, approved, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM comment WHERE ISNULL(approved) ORDER BY comment_date');
		return $comments ;
	}
	public function approved(){
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comment SET approved = 1 WHERE id = ? ');
		$req->execute(array($_GET['comment']));
	 	$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
		header('Location: ' . $referer);
	}
	public function report($comment){
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comment SET approved = null WHERE id = ? ');
		$req->execute(array($comment));
		return $req;
	}
	public function delete_comment(){
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comment WHERE id = ? ');
		$req->execute(array($_GET['comment']));
	 	$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
		header('Location: ' . $referer);
	}
	public function connect(){
		$db = $this->dbConnect();
		$connect = $db->query('SELECT pseudo, password FROM member ORDER BY pseudo');
		return $connect;
	}
 }