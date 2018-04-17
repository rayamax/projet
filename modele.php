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

		<div class="billet">
		    <h3>
		        <?php echo nl2br($donnees['title']); ?>
		        <em class="date">le <?php echo $donnees['date_creation_fr']; ?></em>
		    </h3>
		    
		    <p>
		    <?php
		    echo nl2br($donnees['content']);
		    ?>
		    </p>
		</div>
	<?php $req->closeCursor(); 
	}

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
		$req = $bdd->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM comment WHERE post_id = ? AND approved = 1 ORDER BY comment_date');
		$req->execute(array($_GET['billet']));

		while ($donnees = $req->fetch())
		{
			?>
			<div class="comment">
				<div class="head_comment">
					<div>
						<strong>
							<?php echo htmlspecialchars($donnees['author']); ?>
						</strong>
						<div class="date">
							 le <?php echo $donnees['date_commentaire']; ?>
						</div>
					</div>
					<a href="report_comment.php?comment=<?php echo $donnees['id']; ?>"> Signaler
					</a>
				</div>
				<p>
					<?php echo nl2br($donnees['comment']); ?>
				</p>
			</div>
			<?php
		} // Fin de la boucle des commentaires
		$req->closeCursor();
	}

	function getTitles(){       
		try
		      {
		          $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
		      }
		      catch(Exception $e)
		      {
		            die('Erreur : '.$e->getMessage());
		      }
		$req_titles = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY creation_date DESC LIMIT 0, 5');
		
        while ($donnees_titles = $req_titles->fetch())
      {
      ?>
      	<p><a href="commentaires.php?billet=<?php echo $donnees_titles['id'];  ?>"><?php echo $donnees_titles["title"]?></a>
      	<div class="buttons">
				<a class="button" href="erase_post.php?billet=<?php echo $donnees_titles['id']; ?>">Effacer</a>
				<a class="button" href="edit_post.php?billet=<?php echo $donnees_titles['id']; ?>">Modifier</a>
		</div>
	</p>
      <?php
      } // Fin de la boucle des titre billets
      $req_titles->closeCursor();
      
	}

	function moderation(){
		// Récupération des commentaires
		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}
		$req = $bdd->query('SELECT id, author, comment, approved, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM comment WHERE ISNULL(approved) ORDER BY comment_date');

		while ($donnees = $req->fetch())
		{
			?>
			<div class="comment">
				<p><strong><?php echo htmlspecialchars($donnees['author']); ?></strong> le <?php echo $donnees['date_commentaire']; ?></p>
				<p><?php echo nl2br($donnees['comment']); ?></p>
			</div>
			<div class="buttons">
				<a class="button" href="erase_comment.php?comment=<?php echo $donnees['id']; ?>">Effacer</a>
				<a class="button" href="approved_comment.php?comment=<?php echo $donnees['id']; ?>">Accepter</a>
			</div>
			<?php
		} // Fin de la boucle des commentaires
		$req->closeCursor();
	}
?>