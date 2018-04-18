<?php
require('model.php');

if (isset($_GET['billet']) && $_GET['billet'] > 0) {
    $post = getPost($_GET['billet']);
    $comments = getComments($_GET['billet']);
    require('postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

