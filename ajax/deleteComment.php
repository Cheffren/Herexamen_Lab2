<?php


include_once(__DIR__ . "/../bootstrap.php");
if (!empty($_POST)) {

$comment = new Comment();
$comment->setUserName($_POST['username']);
$comment->setCommentId($_POST['id']);
$comment->deleteComment();


//var_dump($_POST['postid']);


$response = [
    
    'status' => 'success',
    'body' => htmlspecialchars($comment->getUserName()), $comment->getCommentId(),

    'message' => 'Comment message deleted'
];

header('Content-type: application/json');

echo json_encode($response);











}
