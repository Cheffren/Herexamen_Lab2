<?php

class Likes {

private $username;
private $postId;


/**
 * Get the value of username
 */ 
public function getUsername()
{
return $this->username;
}

/**
 * Set the value of username
 *
 * @return  self
 */ 
public function setUsername($username)
{
$this->username = $username;

return $this;
}

/**
 * Get the value of postId
 */ 
public function getPostId()
{
return $this->postId;
}

/**
 * Set the value of postId
 *
 * @return  self
 */ 
public function setPostId($postId)
{
$this->postId = $postId;

return $this;
}

public function saveLike() {
$username = $this->getUsername();
$postId = $this->getPostId();

$conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
$statement = $conn->prepare("insert into likes (username, postId) values (:username,:postId)");
$statement->bindValue(":username", $username);
$statement->bindValue(":postId", $postId);

$statement->execute();

}
public static function countLikes($postId) {


    $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
    $statement = $conn->prepare("select * from likes where postId = :postId");
    $statement->bindValue(":postId", $postId);

    $statement->execute();

    $result = $statement->rowCount();

    return $result;




}
public function unlike() {


    $username= $this->getUsername();
    //$text = $this->getText();
    $postId = $this->getPostId();

    $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $statement = $conn->prepare("delete from likes where postId = :postId and username = :username"
    );
        $statement->bindValue(":postId", $postId);
        $statement->bindValue(":username",$username);
        $result = $statement->execute();

         return $result;








}








}