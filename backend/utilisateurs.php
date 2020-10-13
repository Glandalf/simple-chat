<?php
    // Définition des entêtes HTTP de la réponse pour supporter le Cross Origin
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    // Inclusion des dépendances nécessaires
    include("db.php");

    // Construction de notre requête paramétrée 
    $req = "SELECT * FROM UTILISATEURS";

    // Connexion à la BDD et envoi de la requête
    $connexion = new PDO($url, $user, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $statement = $connexion->prepare($req);
        $statement->execute([]);
        $resultats = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $exception) {
        echo $exception->getMessage();
    }

    // Renvoi de la réponse 
    echo json_encode($resultats);