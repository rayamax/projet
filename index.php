<?php
require('controller/frontend.php');
require('controller/backend.php');
try {
  if (isset($_GET['action'])) {
      if ($_GET['action'] == 'listPosts') {
          listPosts();
      }
      elseif ($_GET['action'] == 'post') {
          if (isset($_GET['id']) && $_GET['id'] > 0) {
              post();
          }
          else {
              throw new Exception('Erreur : aucun identifiant de billet envoyé');
          }
      }
      elseif ($_GET['action'] == 'addComment') {
          if (isset($_GET['id']) && $_GET['id'] > 0) {
              if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                  addComment($_GET['id'], $_POST['author'], $_POST['comment']);
              }
              else {
                  throw new Exception('Erreur : tous les champs ne sont pas remplis !');
              }
          }
          else {
              throw new Exception('Erreur : aucun identifiant de billet envoyé');   
          }
      }
      elseif ($_GET['action'] == 'addPost') {
          if (!empty($_POST['title']) && !empty($_POST['text'])) {
              addComment($_GET['id'], $_POST['author'], $_POST['comment']);
          }
          else {
              throw new Exception('Erreur : tous les champs ne sont pas remplis !');
          }
      }
      elseif ($_GET['action'] == 'editPost') {
          if (!empty($_POST['title']) && !empty($_POST['text'])) {
              addComment($_GET['id'], $_POST['author'], $_POST['comment']);
          }
          else {
              throw new Exception('Erreur : tous les champs ne sont pas remplis !');
          }
      }
      elseif ($_GET['action'] == 'connect'){
        if ($_COOKIE) { 
            moderation();
        }
        else {
          connect();
        }
      }
      elseif ($_GET['action'] == 'moderation') {
          moderation();
      }
      elseif ($_GET['action'] == 'report') {
          report($_GET['comment']);
      }
      elseif ($_GET['action'] == 'approved') {
          approved();
      }
      elseif ($_GET['action'] == 'delete') {
        delete_comment();
      }
  }
  else {
      listPosts();
  }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}