<?php
require_once ('model/Moderation.php');
require_once('model/PostManager.php');

function moderation()
{
  $moderation = new Moderation();
  $header = $moderation->getTitles();
  if($_SESSION)
  {
    $pseudo = $_SESSION['pseudo'];
    if($pseudo == 'admin')
    {
	    $view = $moderation->view();
      $titles = $moderation->getTitles();
	    require("view/backend/moderationView.php");
    }
  }
}

function approved()
{
	$moderation = new Moderation();
	$approved = $moderation->approved();
  $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
  header('Location: ' . $referer);
}

function report($comment)
{
	$moderation = new Moderation();
	$report = $moderation->report($comment);
	if ($report === false) 
  {
        throw new Exception('Impossible d\'effacer le commentaire !');
    }
    else 
    {
      header("Location: index.php");
    }
    header("Location: index.php");
}

function delete_comment()
{
  if($_SESSION)
  {
    $pseudo = $_SESSION['pseudo'];
    if ($pseudo == 'admin') 
    {
      $moderation = new Moderation();
      $delete = $moderation->delete_comment();
      header('Location: index.php?action=moderation');
    }
  }
}

function menu()
{
  $moderation = new Moderation();
  $header = $moderation->getTitles();
}

function connect()
{
  $moderation = new Moderation();
  $header = $moderation->getTitles();
  if ($_POST) 
  {
    $connect = $moderation->connect();
    require("view/backend/connectView.php");
    header('Location: index.php?action=moderation');
  } 
  else 
  {
    require("view/backend/connectView.php");
  }
	
}

function disconnect()
{
  session_destroy();
	header('Location: index.php');
}

function addPost()
{
  $moderation = new Moderation();
  $header = $moderation->getTitles();
  if($_SESSION)
  {
    $pseudo = $_SESSION['pseudo'];
    if ($pseudo == 'admin') 
    {
      require("view/backend/addPostView.php");
    }
  }
}

function addPostSubmit($title,$paragraphe,$text) 
{
  if($_SESSION)
  {
    $pseudo = $_SESSION['pseudo'];
    if ($pseudo == 'admin') 
    {
      $moderation = new Moderation();
      $req = $moderation->addPostSubmit($title,$paragraphe,$text);
      header('Location: index.php');
      if ($req === false) 
      {
        throw new Exception('Impossible d\'ajouter le commentaire !');
      }
      else 
      {
        header('Location: index.php');
      }
      header('Location: index.php');
    }
    header('Location: index.php');
  }
}

function editPost()
{
  $moderation = new Moderation();
  $header = $moderation->getTitles();
  if($_SESSION)
  {
    $pseudo = $_SESSION['pseudo'];
    if ($pseudo == 'admin') 
    {
      $postManager = new PostManager();
      $post = $postManager->getPost($_GET['id']);
      require('view/backend/editPostView.php');
    }
  }
}

function editPostSubmit($title,$paragraphe,$text,$id)
{
  if($_SESSION)
  {
    $pseudo = $_SESSION['pseudo'];
    if ($pseudo == 'admin') 
    {
      $moderation = new Moderation();
      $req = $moderation->editPostSubmit($title,$paragraphe,$text,$id);
      header('Location: index.php');
    }
  }  
}

function deletePost()
{
  if($_SESSION)
  {
    $pseudo = $_SESSION['pseudo'];
    if ($pseudo == 'admin') 
    {
      $moderation = new Moderation();
      $req = $moderation->deletePost();
      header('Location: index.php');
    }
  }
}