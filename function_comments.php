<h2>Commentaires</h2>

<?php
function getComments(){
	// Récupération des commentaires
	try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
	$req = $bdd->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM comment WHERE post_id = ? ORDER BY comment_date');
	$req->execute(array($_GET['billet']));

	while ($donnees = $req->fetch())
	{
		?>
		<p><strong><?php echo htmlspecialchars($donnees['author']); ?></strong> le <?php echo $donnees['date_commentaire']; ?></p>
		<p><?php echo nl2br(htmlspecialchars($donnees['comment'])); ?></p>
		<?php
	} // Fin de la boucle des commentaires
	$req->closeCursor();
}
?>