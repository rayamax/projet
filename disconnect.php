<?php
// Connexion à la base de données
setcookie("connexion","admin",1);
// Redirection du visiteur vers la page du minichat
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
?>