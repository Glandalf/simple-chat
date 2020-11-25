<?php
header('Access-Control-Allow-Origin:*');
include("db.php");
$conversation = $_GET['conversation'];
$message = $_GET['message'];

$connexion = new PDO($url,$user, $pass);
echo json_encode('{
    "statue');

$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$req = "INSERT INTO messages (message, conversation, date_message, user_id) VALUES 
(:message, :conversation,NOW(),(select id from utilisateurs where email = :conversation))";

try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':conversation',$conversation);
    $statement->bindParam(':message',$message);
    $statement->execute();
    }catch(Exception $exception){
       echo $exception->getMessage(); 
    }

    echo json_encode($results);