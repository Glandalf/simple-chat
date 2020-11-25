<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    include("db.php");

    // récupération des params get de l'url
    $conversation = $_GET['conversation'];
    $message = $_GET['message'];

    // Connexion à la bdd
    $connexion = new PDO("mysql:host=".$url."; dbname=chat", $user, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     // pour afficher les erreurs dans le catch

    // Création d'une requête SQL (plus exactement, d'un requête paramétrée)
    $rqt = "INSERT INTO messages (message, conversation, date_message, user_id) 
                VALUES (:message, :conversation, NOW(), (select id from utilisateurs where email = :conversation))";
    
    //On prépare notre requête et on l'exécute
    try {
        $statement = $connexion->prepare($rqt);
        $statement->bindParam(':conversation', $conversation);
        $statement->bindParam(':message', $message);
        $statement->execute();

        echo json_encode('{
            "statut": "ok",
            "description": "message bien enregistré dans la conversaion ' . $conversation .
        '}');
    } catch(Exception $exception) {
        // echo $exception->getMessage();
        echo json_encode('{
            "statut": "error",
            "description": "insertion impossible dans la conversaion ' . $conversation .
        '}');
    }
