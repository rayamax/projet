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

// Récupération du billet
?>
<form action="add_post_submit.php" method="post">
        <p>
        <label for="title">Titre</label> : <input type="text" name="title" id="title" /><br />
        <textarea rows="4" cols="100" id="text" name="text" >
      Laissez place à votre imagination ...
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