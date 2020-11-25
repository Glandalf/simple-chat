<?php
header('Access-Control-Allow-Origin: *');
include("db.php");

$conversation = $_GET['conversation'];
//On va effectuer la connexion à la base de données avec PDO. 

    //Il faut connaitre : l'hôte (localhost pour nous), un utilisateur mysql ayant des droits sur la base et son mot de passe
    // la base avec laquelle on souhaite travailler
    //Les identifiants et mots de passe seront stockés dans un fichier à part qui devra être renseigné dnas le fichier .gitignore pour ne pas apparaître sur git    
    $connexion = new PDO($url, $user, $pass);
    // pour afficher les erreurs dans le catch
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    //On créer une requête sous forme de chaîne de caractère
    
    $rqt = "SELECT email, message as body, date_message from messages inner join utilisateurs on id = user_id where email = :mail";
    //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
    try {
        $statement = $connexion->prepare($rqt);
        $statement->bindParam(':mail', $conversation);
        //On l'execute
        $statement->execute(); 
        // On récupère l'ensemble des résultats dans un tableau
        $results = $statement->fetchAll(PDO::FETCH_ASSOC); 
    } catch(Exception $exception) {
        echo $exception->getMessage(); 
    }
    // print_r sert à afficher un tableau sans trop s'embêter
   // print_r($results);

   //On renvoye ces résultats en JSON : 
   header('Content-Type: application/json');
   echo json_encode($results); 