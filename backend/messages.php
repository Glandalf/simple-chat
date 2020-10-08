<?php
// Faire comprendre au navigateur ce qu'on lui répond :
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');


    include("db.php");
    $connexion = new PDO($url, $user, $pass); 
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = "SELECT 0 as PostId, message_id as id, pseudo as name, email, message as body 
            FROM messages m JOIN utilisateurs u ON u.id = m.utilisateur_id
            WHERE conversation = :conv
            "; 

    try {
        $statment = $connexion->prepare($req);
        $param = $_GET["conversation"];
        $statment->execute(["conv" => $param]);
        $resultats = $statment->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $exception) {
        echo $exception->getMessage(); 
    }
    echo json_encode($resultats);
