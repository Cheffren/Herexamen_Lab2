<?php


class Comment {


    private $username;     //Er moet een username uit de database gehaald worden die hetzelfde is als de usernae van de sessie user
    private $comment; //De tekst die wordt ingevoerd in het invoerveld
    private $postId; //Het Id van de post dat gelijk staat aan id uit tabel post
    private $commentId;

    public function getUserName() {
        return $this->username;


    }
    public function setUserName($valueUser) {
        
        $this->username = $valueUser;
        return $this;
    }
    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {

        $this->comment = $comment;
        
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
  
    public function saveComment() {

        $username = $this->getUserName();
        $comment = $this->getComment();
        $postId = $this->getPostId();

        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $statement = $conn->prepare("INSERT INTO `comments` (`commentId`, `commentText`, `username`, `postId`) VALUES (NULL, :commentText, :username, :postId);");
        $statement->bindValue(":commentText",$comment);
        $statement->bindValue(":username", $username);
        $statement->bindValue(":postId", $postId);

        $result = $statement->execute();

        return $result;







        
    }
    public static function getTheComment($postId) {


        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");

        $statement = $conn->prepare("select * from comments where postId = :postId;");

        $statement->bindValue(":postId", $postId);
        $statement->execute();

        $result = $statement->fetchAll();
        return $result;


    }

    /**
     * Get the value of commentId
     */ 
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set the value of commentId
     *
     * @return  self
     */ 
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;

        return $this;
    }

    public function deleteComment() {

        $username = $this->getUserName();
        $commentId = $this->getCommentId();


        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");

        $statement = $conn->prepare("delete from comments where commentId = :commentId and username = :username");
        $statement->bindValue(":commentId", $commentId);
        $statement->bindValue(":username", $username);

        $result = $statement->execute();


        return $result;





    }
    public static function getCommentsCount($postId) {


        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $statement = $conn->prepare("select * from comments where postId = :postId");
        $statement->bindValue(":postId", $postId);
    
        $statement->execute();
    
        $result = $statement->rowCount();
    
        return $result;


    }
   

    
}
























