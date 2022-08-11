<?php

include_once(__DIR__ . "/../bootstrap.php");
if (!empty($_POST)) {

$comment = new Comment();
$comment->setComment($_POST['text']);
$comment->setUserName($_POST['username']);
$comment->setPostId($_POST['postId']);
$comment->saveComment();

//var_dump($_POST['postid']);


$response = [
    
    'status' => 'success',
    'body' => htmlspecialchars($comment->getComment(), $comment->getPostId()),
    'user'=>htmlspecialchars($comment->getUserName()),
    'message' => 'Comment message saved'
];

header('Content-type: application/json');

echo json_encode($response);











}
