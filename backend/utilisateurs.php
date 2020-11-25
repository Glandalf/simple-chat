<?php
header('Access-Control-Allow-Origin:*');
include("db.php");

$connexion = new PDO($url,$user, $pass);
echo json_encode('{
    "statue');

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = "INSERT INTO utilisateurs (pseudo, email, date_naissance, user_id) VALUES 
(:pseudo, :email,NOW(),(select id from utilisateurs where email = :))";

try {
    $statement = $connexion->prepare($rqt);
    $statement->execute();
    
}catch(Exception $exception){
    echo $exception->getMessage(); 
 }

    echo json_encode($results);