<?php 
	// Connexion à la base de données
	function getBillet(){
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		$req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet WHERE id = ?');
		$req->execute(array($_GET['billet']));
		$donnees = $req->fetch();
	?>

		<div class="news">
		    <h3>
		        <?php echo htmlspecialchars($donnees['title']); ?>
		        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
		    </h3>
		    
		    <p>
		    <?php
		    echo nl2br(htmlspecialchars($donnees['content']));
		    ?>
		    </p>
		</div>
	<?php $req->closeCursor(); 
	}
?>