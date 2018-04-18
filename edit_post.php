<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="blog.css" rel="stylesheet" /> 
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    </head>
        
    <body>
        <div class="container">
        <?php 
      include("header.php");
      require("model.php");
      $post = getPost($_GET['billet']);

// Récupération du billet
?>
<form action="edit_post_submit.php?billet=<?php echo $post['id'];?>" method="post">
        <p>
        <label for="title">Titre</label> : <textarea type="text" name="title" id="title" ><?= htmlspecialchars($post['title']) ?></textarea><br />
        <textarea rows="4" cols="100" id="text" name="text" >
      <?= nl2br(htmlspecialchars($post['content'])) ?>
        </textarea>
        <input type="submit" value="Envoyer" />
    </p>
    </form>
    <?php
      include("footer.php");
      ?>
      </div>
</body>
</html>