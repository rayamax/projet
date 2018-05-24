<?php
$pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : NULL;
$title = "Espace Connexion"; ?>
<?php ob_start(); ?>
<div class="container">
        <form action="index.php?action=connect" method="post">
          <p>
            <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
            <label for="message">Mot de passe</label> :  <input type="password" name="password" id="password" /><br />
            <input type="submit" value="Envoyer" />
          </p>
        </form>
	</div>
	<?php
		$content = ob_get_clean(); ?>
  		<?php require('view/frontend/template.php'); ?>
