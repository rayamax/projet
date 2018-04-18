<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Jean Forteroche</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <?php
      include("header.php");
      while ($data = $post->fetch())
      {
        ?>
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
          <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic"><?= htmlspecialchars($data['title']); ?></h1>
            <p class="lead my-3"><?php
      // On affiche le contenu du billet
            echo nl2br($data['content']);
            ?></p>
            <p class="lead mb-0"><a href="commentaires.php?billet=<?php echo $data['id']; ?>" class="text-white font-weight-bold continued">Continuer à lire ...</a></p>
          </div>
        </div>
      <?php
      } // Fin de la boucle des billets
      $post->closeCursor();
      ?>

      <?php
        while ($data = $posts->fetch())
      {
      ?>
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <strong class="d-inline-block mb-2 text-primary"><?php echo htmlspecialchars($data['title']); ?>
                </strong>
              </h3>
              <p class="card-text mb-auto"><?php
        // On affiche le contenu du billet
                  echo nl2br(htmlspecialchars($data['content']));
                  ?>                    
              </p>
              <p class="lead mb-0"><a href="commentaires.php?billet=<?php echo $data['id']; ?>" class="text-white font-weight-bold continued">Continuer à lire ...</a></p>
            </div>
          </div>
        </div>
      </div>
      <?php
      } // Fin de la boucle des billets
      $posts->closeCursor();
      ?>
      
    </div>
    <?php include("footer.php"); ?>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
