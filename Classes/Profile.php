<?php

class Profile
{

    private $password;
    private $filename;
    private $username;
    private $bio;

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {

        $options  = ['cost' => 12,];
        $password = password_hash($password, PASSWORD_DEFAULT, $options);
        $this->password = $password;

        return $this;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setFilename($filename)
    {

        $this->filename = $filename;

        return $this;
    }
    public function setUsername($username) {
        $this->username = $username;
        return $this;


    }
    public function getUsername() {
        return $this->username;

    }
    public function setBio($bio) {
        $this->bio = $bio;
        return $this;

    }
    public function getBio() {
        return $this->bio;

    }

    public static function showInfo($username)
    {

        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $statement = $conn->prepare("select * from gebruiker where email = :email");
        $statement->bindValue(":email", $username);
        $statement->execute();

        $result = $statement->fetch();
        return $result;
    }
 

 
    public function updateProfile($email)
    {

        $password = $this->getPassword();
        $username = $this->getUsername();
        $bio = $this->getBio();


        $filename = $_FILES["profilepic"]["name"];
        $tmpname = $_FILES["profilepic"]["tmp_name"];
        $folder = "profilePictures/" . date("YmdHis") . "_" . $filename;


        $imageFileType = strtolower(pathinfo($folder, PATHINFO_EXTENSION));

        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");

/*

        if (!empty($imageFileType)) {
            if ($imageFileType === "jpg" || $imageFileType === "jpeg" || $imageFileType === "png") {
                $filename = $_FILES["profilepic"]["name"];
            } else {
                throw new Exception("Please choose a valid png, jpg or jpeg file");
            }
        } else {
            throw new Exception("The image cannot be empty");
        }
*/
        if (move_uploaded_file($tmpname, $folder)) {
            try {
       

        $statement = $conn->prepare("UPDATE `gebruiker` SET `username`= :username,`password`=:password,`profielfoto`=:profielfoto,`bio`=:bio WHERE email = :email");
       
        $statement->bindValue(":username", $username);
        $statement->bindValue(":password", $password);
        $statement->bindValue(":profielfoto", $folder);
        $statement->bindValue(":bio", $bio);

        $statement->bindValue(":email", $email);
       

        $statement->execute();
    
            }
            catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                exit;
            }
        }

    }













    public static function myPosts($username)
    {

        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $statement = $conn->prepare("select * from post where username = :username");
        $statement->bindValue(":username", $username);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
