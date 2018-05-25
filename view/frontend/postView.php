<?php $title = htmlspecialchars($post['title']); ?>
<?php ob_start(); ?>
        <div class="container">
            <div class="billet">
                <p><a href="index.php">Retour à la liste des billets</a></p>
                <div class="news">
                    <h3>
                        <?= $post['title'] ?>
                        <em class="date">le <?= $post['creation_date_fr'] ?></em>
                    </h3>
                    
                    <p>
                        <?= nl2br($post['content']) ?>
                    </p>
                </div>
            </div>
            <div class="container_commentaires">
                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">

                    <p>
                        <label for="author">Pseudo</label> :<br/> <input type="text" name="author" id="author" /><br/>
                        <label for="comment">Commentaire :</label><br/><input id="comment" name="comment" >
                        <br/><br/>
                        <input type="submit" value="Envoyer" />
                    </p>
                </form>
                <div class="container_comments">
                    <?php
                        while ($data = $comments->fetch()) {
                    ?>
                    <div class="comment">
                        <div class="head_comment">
                            <div>
                                <strong>
                                    <?php echo nl2br(htmlspecialchars($data['author'])); ?>
                                </strong>
                                <div class="date">
                                     le <?php echo $data['comment_date_fr']; ?>
                                </div>
                            </div>
                            <a href="index.php?action=report&comment=<?php echo $data['id']; ?>"> Signaler
                            </a>
                        </div>
                        <p>
                            <?php echo nl2br(htmlspecialchars($data['comment'])); ?>
                        </p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div> 
          <?php $content = ob_get_clean(); ?>
  <?php require('template.php'); ?>
