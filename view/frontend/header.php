<?php        
try
      {
          $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
      }
      catch(Exception $e)
      {
            die('Erreur : '.$e->getMessage());
      }
$req_billet_titre = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY creation_date DESC LIMIT 0, 5');
?>
<header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-around align-items-center margin-header">
          <div class="col-4 pt-1">
            <a class="btn btn-sm btn-outline-secondary" <?php if($_COOKIE) {?> href="index.php?action=addpost" <?php } else {?> href="index.php?action=connect" <?php } ?> >Ecrire</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="index.php">Jean Forteroche</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="btn btn-sm btn-outline-secondary" href="index.php?action=moderation"><?php if($_COOKIE) { echo $_COOKIE['connexion']; } else { ?> Connexion <?php } ?></a>
            <?php if($_COOKIE) {?> <a class="btn btn-sm btn-outline-secondary" href="index.php?action=disconnect">Deconnexion</a><?php } ?>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-around">
          <a class="p-2 text-muted" href="index.php">Accueil</a>
          <?php
        while ($donnees_titre = $req_billet_titre->fetch())
      {
      ?>
      <a class="p-2 text-muted" href="index.php?action=post&id=<?php echo $donnees_titre['id'];  ?>"><?php echo $donnees_titre["title"]?></a>
      <?php
      } // Fin de la boucle des titre billets
      $req_billet_titre->closeCursor();
      ?>
        </nav>
      </div>