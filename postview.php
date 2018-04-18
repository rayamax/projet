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
            <?php include("header.php"); ?>
            <div class="billet">
                <p><a href="index.php">Retour à la liste des billets</a></p>
                <div class="news">
                    <h3>
                        <?= htmlspecialchars($post['title']) ?>
                        <em class="date">le <?= $post['date_creation_fr'] ?></em>
                    </h3>
                    
                    <p>
                        <?= nl2br(htmlspecialchars($post['content'])) ?>
                    </p>
                </div>
            </div>
            <div class="container_commentaires">
                <form class="form_comment" action="post.php?billet=<?php echo $_GET["billet"]; ?>"" method="post">
                    <p>
                        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
                        <label for="message">Commentaire</label> :  <textarea rows="4" cols="100" id="text" name="text" >
                            Laissez place à votre imagination ...
                        </textarea>
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
                                    <?php echo htmlspecialchars($data['author']); ?>
                                </strong>
                                <div class="date">
                                     le <?php echo $data['date_commentaire']; ?>
                                </div>
                            </div>
                            <a href="report_comment.php?comment=<?php echo $data['id']; ?>"> Signaler
                            </a>
                        </div>
                        <p>
                            <?php echo nl2br($data['comment']); ?>
                        </p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div> 
    </body>
</html>