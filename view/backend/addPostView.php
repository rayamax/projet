<?php $title = 'Ajouter un billet'; ?>
<?php ob_start(); ?>
<div class="container">
  <form action="index.php?action=addPostSubmit" method="post">
    <p>
      <label for="title">Titre</label> : <br/> <input type="text" name="title" id="title" /><br />
    </p>
    <p>
      <label for="paragraphe">Premier paragraphe</label> :<br/>
      <textarea rows="4" cols="100" id="paragraphe" name="paragraphe" >
        Copier ici le premier paragraphe ou un résumé de cette histoire
      </textarea>
    </p>
    <p>
      <label for="texte">Texte</label> :<br/>
      <textarea rows="9" cols="100" id="text" name="text" >
        Laissez place à votre imagination ...
      </textarea>
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>