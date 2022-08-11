<?php

class Post
{
    private $filename;
    private $filename2;
    private $filename3;
    private $text;
    private $id;
    private $username;



    /**
     * Get the value of filename
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
  
    
     * Set the value of filename
     *
     * @return  self
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }
    public function getFilename2()
    {
        return $this->filename2;
    }

    /**
     * Set the value of filename
     *
  
    
     * Set the value of filename
     *
     * @return  self
     */
    public function setFilename2($filename2)
    {
        $this->filename2 = $filename2;

        return $this;
    }

    public function getFilename3()
    {
        return $this->filename3;
    }

    /**
     * Set the value of filename
     *
  
    
     * Set the value of filename
     *
     * @return  self
     */
    public function setFilename3($filename3)
    {
        $this->filename3 = $filename3;

        return $this;
    }



    /**
     * Get the value of title
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }




    //uploaden van post
    public function addPost($username)
    {
        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $text = $this->getText();


        $statement = $conn->prepare("insert into post (text, date, username) VALUES (:text, NOW(), :username)");
        $statement->bindValue(":text", $text);
        $statement->bindValue(":username", $username);

        $statement->execute();

        $postId= $conn->lastInsertId();

        //het pad om de geuploade afbeelding in op te slagen
        // $target = "image/" . basename($_FILES["uploadfile"]["name"]);
        
        $filename = $_FILES["uploadfile"]["name"];

        $totalCount = count($_FILES['uploadfile']['name']);

        

        for ($i = 0; $i < $totalCount; $i++) {

            $tempname = $_FILES["uploadfile"]["tmp_name"][$i];


            $folder = "uploads/" . date('YmdHis') . "_" . $filename[$i]; //.date('YmdHis')."_"

            $imageFileType = strtolower(pathinfo($folder, PATHINFO_EXTENSION));

            if (move_uploaded_file($tempname, $folder)) {

                //connectie naar db
                $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");

                //alle data ophalen uit het ingestuurde formulier
                $filename = $this->getFilename();


                if (!empty($imageFileType)) {
                    if ($imageFileType === "jpg" || $imageFileType === "jpeg" || $imageFileType === "png") {
                        $filename = $_FILES["uploadfile"]["name"];
                    } else {
                        throw new Exception("Please choose a valid png, jpg or jpeg file");
                    }
                } else {
                    throw new Exception("The image cannot be empty");
                }

                //opgehaalde data opslagen in databank
               

                $stmt = $conn->prepare("insert into images (pictures, postId) values (:pictures, :postId)");
                $stmt->bindValue(":pictures", $folder);
                $stmt->bindValue(":postId", $postId);


                $stmt->execute();

                




                if ($imageFileType === "jpg" || $imageFileType === "jpeg") {
                    $image = imagecreatefromjpeg($folder);
                } else {
                    $image = imagecreatefrompng($folder);
                }
                


                imagejpeg($image, $folder, 60);
                




            }
        }
        
    }

    public function feed()
    {

        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $statement =  $conn->prepare("select * from post order by id");
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



    public static function  getPictursByPostId($postId)
    {


        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $statement =  $conn->prepare("select * from images where postId = :postId");
        $statement->bindValue(":postId", $postId);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
        /**
     * Get the value of id
     */ 
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
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

    
    public function deletePost() {

        $id = $this->getId();
        $username = $this->getUsername();
        

        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $statement = $conn->prepare("delete from post where id = :id and username = :username");
        $statement->bindValue(":id", $id);
        $statement->bindValue(":username", $username);

    
    
    $statement->execute();


        $stmt = $conn->prepare("delete from comments where postId = :postId");
        $stmt->bindValue(":postId", $id);
        $stmt->execute();








    }

    

    
}
