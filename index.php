<?php session_start();
require('controller/frontend.php');
require('controller/backend.php');
try {
  menu();
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
          addPost();
      }
      elseif ($_GET['action'] == 'addPostSubmit') {
        if (!empty($_POST['title']) && !empty($_POST['text'])) {
          addPostSubmit($_POST['title'],$_POST['paragraphe'],$_POST['text']);
        }
        else {
          throw new Exception('Erreur : tous les champs ne sont pas remplis !');
        }
      }
      elseif ($_GET['action'] == 'editPost') {
        if(isset($_GET['id']) && $_GET['id'] > 0){
              editPost();
        }
      }
      elseif ($_GET['action'] == 'editPostSubmit') {
        if (!empty($_POST['title']) && !empty($_POST['text'])) {
                  editPostSubmit($_POST['title'],$_POST['paragraphe'],$_POST['text'],$_GET['id']);
              }
              else {
                  throw new Exception('Erreur : tous les champs ne sont pas remplis !');
              }
      }
      elseif ($_GET['action'] == 'connect'){
        if($_SESSION){
          $pseudo = $_SESSION['pseudo'];
          if ($pseudo == 'admin') { 
            moderation();
          }
          else {
            connect();
          }
        }
        else {
          connect();
        }
      }
      elseif ($_GET['action'] == 'moderation') {
        moderation();
      }
      elseif ($_GET['action'] == 'disconnect') {
          disconnect();
          header("Location: index.php");
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
      elseif ($_GET['action'] == 'deletePost') {
        deletePost();
      }
  }
  else {
    listPosts();
  }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}