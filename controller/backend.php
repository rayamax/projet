<?php  
require_once ('model/Moderation.php');

function moderation(){
	$moderation = new Moderation();
	$view = $moderation->view();
	require("view/backend/moderationView.php");
}

function approved(){
	$moderation = new Moderation();
	$approved = $moderation->approved();
}
function report($comment){
	$moderation = new Moderation();
	$report = $moderation->report($comment);
	if ($report === false) {
        throw new Exception('Impossible d\'effacer le commentaire !');
    }
    else {
         $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
    }
}
function delete_comment(){
	$moderation = new Moderation();
	$delete = $moderation->delete_comment();
}

function connect(){
	$moderation = new Moderation();
	$connect = $moderation->connect();
	while ($connect = $connect->fetch())
      {
      	 if($connect['pseudo'] == $_POST['pseudo']) {
      	 	echo "Bonjour" . $connect['pseudo'];
      	 	if($connect['password']==$_POST['message']){
      	 		echo "Comment allez vous ?";
      	 		setcookie('connexion', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
      	 	} else {
      	 		echo "Mauvais mot de passe";
      	 	}
      	 } else {
      	 	echo "Pseudo Inconnu";
      	 }
    }
   function disconnect(){
   		setcookie("connexion","admin",1);
		$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
		header('Location: ' . $referer);
   }
}