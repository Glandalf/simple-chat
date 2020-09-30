<?php
// Faire comprendre au navigateur ce qu'on lui répond :
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


// Lorsque l'on veut accéder à une conversation (récupérer le contenu)
if (file_exists("./sample-messages-" . $_GET['conversation'] . ".json")) {
    echo file_get_contents("./sample-messages-" . $_GET['conversation'] . ".json");
}
else {
    echo "[]";
}


// Lorsque l'on veut ajouter un message à une conversation (créer/modifier le contenu)
// TODO