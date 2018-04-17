<?php
// Connexion à la base de données
if ($_POST['pseudo']!='' AND $_POST['message']!='')
{	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	// Insertion du message à l'aide d'une requête préparée
	$req = $bdd->query('SELECT pseudo, password FROM member ORDER BY pseudo');
	while ($donnees = $req->fetch())
      {
      	 if($donnees['pseudo'] == $_POST['pseudo']) {
      	 	echo "Bonjour" . $donnees['pseudo'];
      	 	if($donnees['password']==$_POST['message']){
      	 		echo "Comment allez vous ?";
      	 		setcookie('connexion', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
      	 	} else {
      	 		echo "Mauvais mot de passe";
      	 	}

      	 } else {
      	 	echo "Pseudo Inconnu";
      	 }
      
      } // Fin de la boucle des titre billets
      $req->closeCursor();

}
// Redirection du visiteur vers la page du minichat
 $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
?>