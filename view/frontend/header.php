<header class="blog-header py-3">
  <div class="row flex-nowrap justify-content-around align-items-center margin-header">
    <div class="col-4 pt-1">
      <a class="btn btn-sm btn-outline-secondary" <?php if($_SESSION){if($_SESSION['pseudo']=='admin') {?> href="index.php?action=addPost" <?php }} else {?> href="index.php?action=connect" <?php } ?> >Ecrire</a>
    </div>
    <div class="col-4 text-center">
      <a class="blog-header-logo text-dark" href="index.php">Jean Forteroche</a>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a class="btn btn-sm btn-outline-secondary" href="index.php?action=connect"><?php if($_SESSION) { echo $_SESSION['pseudo']; } else { ?> Connexion <?php } ?></a>
      <?php if($_SESSION) {?> <a class="btn btn-sm btn-outline-secondary" href="index.php?action=disconnect">Deconnexion</a><?php } ?>
    </div>
  </div>
</header>

<div class="nav-scroller py-1 mb-2">
  <nav class="nav d-flex justify-content-around">
    <a class="p-2 text-muted" href="index.php">Accueil</a>
    <?php  while ($data = $titles->fetch()) { ?>
    <a class="p-2 text-muted" href="index.php?action=post&id=<?php echo $data['id'];  ?>"><?php echo $data["title"]?></a>
      <?php } $titles->closeCursor(); ?>
  </nav>
</div>