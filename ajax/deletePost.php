<?php 


include_once(__DIR__ . "/../bootstrap.php");
if (!empty($_POST)) {

$post = new Post();
$post->setUsername($_POST['username']);
$post->setId($_POST['id']);
$post->deletePost();


//var_dump($_POST['postid']);


$response = [
    
    'status' => 'success',
    'body' => htmlspecialchars($post->getUserName()), $post->getId(),
    'message' => 'Post message deleted'
];

header('Content-type: application/json');

echo json_encode($response);











}

