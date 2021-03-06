<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/Moderation.php');

function listPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts();
    $moderation = new Moderation();
    $header = $moderation->getTitles();

    require('view/frontend/listPostsView.php');
}

function post()
{   
    $moderation = new Moderation();
    $header = $moderation->getTitles();
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: http://chevauxm.fr/projet4/index.php?action=post&id=' . $postId);
    }
}