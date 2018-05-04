<?php 		
			
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
	$req = $bdd->prepare('DELETE FROM billet WHERE id = ? ');
	$req->execute(array($_GET['billet']));
	$req->closeCursor();
	$req = $bdd->prepare('DELETE FROM comment WHERE post_id = ? ');
	$req->execute(array($_GET['billet']));
	$req->closeCursor();
	$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
?>