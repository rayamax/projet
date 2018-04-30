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
            <label for="title">Titre</label> : <input type="text" name="title" id="title" value="<?= $post['title'] ?>" >
          </p>
          <p>
            <textarea rows="4" cols="100" id="text" name="text" >
              <?= nl2br(htmlspecialchars($post['content'])) ?>
            </textarea>
          </p>  
        <input type="submit" value="Envoyer" />
          
    </form>
    <?php
      include("footer.php");
      ?>
      </div>
</body>
</html>