<?php 
    include_once(__DIR__ . "/../Classes/Chat.php");
if (!empty($_POST)) {
//nEW COMMENT MAKEN
    //$_SESSION['username'] = $c->getUserName();
    $chat = new Chat();
    $chat -> setTekst($_POST['text']);
    $chat->setUsername($_POST['username']);
    
    //Best vanuit session
    //var_dump($_SESSION['username']);

    
//save
$chat->saveMessage();
//response?
$response = [
    'status' => 'success',
    'body' => htmlspecialchars($chat->getTekst()),
    'user'=>htmlspecialchars($chat->getUserName()),
    'message' => 'chat message saved'


];
header('Content-type: application/json');
echo json_encode($response);
//Hier wordt je message encode naar json

//Stel juiste headers in, zeg dat je json terug geeft, javascript kan geen php runnen, enkel json

}


