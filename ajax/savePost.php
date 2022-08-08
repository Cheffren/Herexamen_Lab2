<?php 
    include_once(__DIR__ . "/../Classes/Post.php");
if (!empty($_POST)) {
//nEW COMMENT MAKEN
    //$_SESSION['username'] = $c->getUserName();
    $post = new Post();
    $post -> setText($_POST['text']);
    
    $post->addPost($_POST['username']);
    //Best vanuit session
    //var_dump($_SESSION['username']);

    
//save
//response?
$response = [
    'status' => 'success',
    'body' => htmlspecialchars($post->getText()),
    'message' => 'chat message saved'


];
header('Content-type: application/json');
echo json_encode($response);
//Hier wordt je message encode naar json

//Stel juiste headers in, zeg dat je json terug geeft, javascript kan geen php runnen, enkel json

}


