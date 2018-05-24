<?php 
	// Connexion à la base de données

	function getPostOne() {

		$db = dbConnect();

        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY creation_date DESC LIMIT 0, 1');

        return $req;


	}
	function getPosts() {

		$db = dbConnect();

        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY creation_date DESC LIMIT 1, 5');
        return $req;


	}
	function getPost($billet){
		$db = dbConnect();

		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet WHERE id = ?');
		$req->execute(array($billet));
		$post = $req->fetch();
		return $post;
	}

	function getComments($billet){
		// Récupération des commentaires
		$db = dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM comment WHERE post_id = ? AND approved = 1 ORDER BY comment_date');
		$comments->execute(array($billet));
		return $comments;
	}

	function getTitles(){       
		$db = dbConnect();
		$req_titles = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY creation_date DESC LIMIT 0, 5');
		
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
		$db = dbConnect();
		$req = $db->query('SELECT id, author, comment, approved, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM comment WHERE ISNULL(approved) ORDER BY comment_date');

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
	// Nouvelle fonction qui nous permet d'éviter de répéter du code
	function dbConnect()
	{
	    try
	    {
	        $db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root','');
	        return $db;
	    }
	    catch(Exception $e)
	    {
	        die('Erreur : '.$e->getMessage());
	    }
	}

