<?php

include_once(__DIR__ . "/../bootstrap.php");
if (!empty($_POST)) {
$likes = new Likes();
$likes->setUsername($_POST['username']);
//$comment->setUserName($_POST['username']);
$likes->setPostId($_POST['postId']);
$likes->saveLike();

//var_dump($likes);
//var_dump($_POST['postid']);


$response = [
    
    'status' => 'success',
    'body' => htmlspecialchars($likes->getUsername()),
    'body' => $likes->getPostId(),
    'message' => 'Like is correct'
];




    $response = [ 

        "status" => "error",
        'body' => htmlspecialchars($likes->getPostId()),
        'user' => htmlspecialchars($likes->getUserName()),
        "message" => "Like was not successful"
    ];
}

header('Content-type: application/json');

echo json_encode($response);












