<?php
$pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : NULL;
$title = "Espace Connexion"; ?>
<?php ob_start(); ?>
<div class="container">
      <div id="column comments">
        <h3>
          Commentaires
        </h3>
        <p>
          <?php while ($data = $view->fetch())
		{
			?>
			<div class="comment">
				<p><strong><?php echo $data['author']; ?></strong> le <?php echo $data['date_commentaire']; ?></p>
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
        <?php while ($data = $titles->fetch())
      {
      ?>
        <p>
          <a href="index.php?action=post&id=<?php echo $data['id'];  ?>"><?php echo $data["title"]?></a>
          <div class="buttons">
            <a class="button" href="index.php?action=deletePost&id=<?php echo $data['id']; ?>">Effacer</a>
            <a class="button" href="index.php?action=editPost&id=<?php echo $data['id']; ?>">Modifier</a>
          </div>
        </p>
      <?php }   $titles->closeCursor(); ?>
      </div>
	</div>
<?php
$content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
