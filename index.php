<?php
      // Connexion à la base de données
      try
      {
          $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
      }
      catch(Exception $e)
      {
            die('Erreur : '.$e->getMessage());
      }

        // On récupère les 5 derniers billets
        $req_billet_une = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY creation_date DESC LIMIT 0, 1');
        $req_billet = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY creation_date DESC LIMIT 1, 5');
        $req_billet_titre = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billet ORDER BY creation_date DESC LIMIT 0, 5');

        require("home.php");
 ?>