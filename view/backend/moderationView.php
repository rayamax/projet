<?php $title = "Espace Connexion"; ?>
<?php ob_start(); ?>
<div class="container">
<?php if (!$_COOKIE) { ?>
        <form action="session_connect.php" method="post">
          <p>
            <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
            <label for="message">Mot de passe</label> :  <input type="password" name="message" id="message" /><br />
            <input type="submit" value="Envoyer" />
          </p>
        </form>
      <?php
      } else { ?>

      <div id="column comments">
        <h3>
          Commentaires
        </h3>
        <p>
          <?php while ($data = $view->fetch())
		{
			?>
			<div class="comment">
				<p><strong><?php echo htmlspecialchars($data['author']); ?></strong> le <?php echo $data['date_commentaire']; ?></p>
				<p><?php echo nl2br($data['comment']); ?></p>
			</div>
			<div class="buttons">
				<a class="button" href="index.php?action=delete&comment=<?php echo $data['id']; ?>">Effacer</a>
				<a class="button" href="index.php?action=approved&comment=<?php echo $data['id']; ?>">Accepter</a>
			</div>
			<?php
		} // Fin de la boucle des commentaires
		$view->closeCursor();
		?>
        </p>
      </div>
      <div id="column billets">
        <h3>
          Billets
        </h3>
        <p>
          
        </p>
      </div>
      <?php
      }
?>

	</div>
	<?php
		$content = ob_get_clean(); ?>
  		<?php require('view/frontend/template.php'); ?>
