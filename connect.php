<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="blog.css" rel="stylesheet" /> 
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
        
    <body>
        <div class="container">
<?php
      require ("model.php");
      include("header.php");
// Récupération du billet
      if (!$_COOKIE) { ?>
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
          <?php moderation() ?>
        </p>
      </div>
      <div id="column billets">
        <h3>
          Billets
        </h3>
        <p>
          <?php getTitles() ?>
        </p>
      </div>
      <?php
      }
?>

    <?php
      include("footer.php");
      ?>
      </div>
</body>
</html>