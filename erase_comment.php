<?php 		
			
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
	$req = $bdd->prepare('DELETE FROM comment WHERE id = ? ');
	$req->execute(array($_GET['comment']));
	$req->closeCursor();
	$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
?>