<?php $title = nl2br($post['title']); ?>
<?php ob_start(); ?>
    <div class="container">
        <form action="index.php?action=editPostSubmit&id=<?php echo $post['id'];?>" method="post">
            <p>
                <label for="title">Titre</label> : <br/>
                <input type="text" name="title" value="<?= $post['title'] ?>"><br>
                <label for="title">Résumé</label> : <br/>
                <textarea rows="4" cols="100" id="paragraphe" name="paragraphe" >
                    <?= nl2br($post['paragraphe']) ?>
                </textarea><br/>
                <label for="title">Texte</label> : <br/>
                <textarea rows="4" cols="100" id="text" name="text" >
                    <?= nl2br($post['content']) ?>
                </textarea><br/>
                <input type="submit" value="Envoyer" />
            </p>
        </form>
    </div> 
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
