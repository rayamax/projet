<?php
// Connexion à la base de données
if ($_POST['title']!='' AND $_POST['text']!='')
{	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	// // Insertion du message à l'aide d'une requête préparée
	$req = $bdd->prepare('INSERT INTO billet (title, content, creation_date) VALUES(?, ?, NOW())');
	
	$req->execute(array($_POST['title'], $_POST['text']));



}
// Redirection du visiteur vers la page du minichat
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
?>