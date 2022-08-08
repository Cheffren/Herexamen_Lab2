<?php

class Post {
    private $filename;
    private $filename2;
    private $filename3;
    private $text;

 

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
    public function addPost($username) {
        //het pad om de geuploade afbeelding in op te slagen
        // $target = "image/" . basename($_FILES["uploadfile"]["name"]);
        $filename = $_FILES["uploadfile"]["name"];

        $totalCount = count($_FILES['uploadfile']['name']);

        for ($i=0; $i < $totalCount; $i++) {

            $tempname = $_FILES["uploadfile"]["tmp_name"][$i];


            $folder = "uploads/".date('YmdHis')."_".$_FILES['uploadfile']['name'][$i]; //.date('YmdHis')."_"

        $imageFileType = strtolower(pathinfo($folder,PATHINFO_EXTENSION));

        if (move_uploaded_file($tempname, $folder)) {

 //connectie naar db
 $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");

 //alle data ophalen uit het ingestuurde formulier
 $filename = $this->getFilename();
 /*$filename2 = $this->getFilename2();
 $filename3 = $this->getFilename3();*/
 $text = $this->getText();

     if(!empty($imageFileType)){
         if($imageFileType === "jpg" || $imageFileType === "jpeg" || $imageFileType === "png") {
             $filename = $_FILES["uploadfile"]["name"];
         } else {
             throw new Exception("Please choose a valid png, jpg or jpeg file");
         }
     } else {
         throw new Exception("The image cannot be empty");
     }
     /*
     if(!empty($imageFileType2)){
         if($imageFileType2 === "jpg" || $imageFileType2 === "jpeg" || $imageFileType2 === "png") {
             $filename2 = $_FILES["uploadfile2"]["name"];
         } else {
             throw new Exception("Please choose a valid png, jpg or jpeg file");
         }
     }
         if(!empty($imageFileType3)){
             if($imageFileType3 === "jpg" || $imageFileType3 === "jpeg" || $imageFileType3 === "png") {
                 $filename3 = $_FILES["uploadfile3"]["name"];
             } else {
                 throw new Exception("Please choose a valid png, jpg or jpeg file");
             }
         }
       */
 //opgehaalde data opslagen in databank
 $statement = $conn->prepare("insert into post (text, date, username, pictures) VALUES (:text, NOW(), :username, :pictures)");
 $statement->bindValue(":text",$text);
 $statement->bindValue(":pictures",$folder);
 /*
 $statement->bindValue(":picture2",$folder2);
 $statement->bindValue(":picture3",$folder3);*/


 $statement->bindValue(":username",$username);
 //$statement->bindValue(":tags",$tags);
 
$result =  $statement->execute();

 var_dump($result);

 //geuploade afbeelding in de images folder zetten
 /*
 if (move_uploaded_file($tempname, $folder)) {
     $msg = "Image uploaded successfully";
 }else{
     $msg = "Failed to upload image";
 }*/
 /*
 if (move_uploaded_file($tempname2, $folder2)) {
     $msg = "Image uploaded successfully";
 }else{
     $msg = "Failed to upload image";
 }
 if (move_uploaded_file($tempname3, $folder3)) {
     $msg = "Image uploaded successfully";
 }else{
     $msg = "Failed to upload image";
 }
*/


         
 if ($imageFileType === "jpg" || $imageFileType === "jpeg") {
     $image = imagecreatefromjpeg($folder);
 } else {
     $image = imagecreatefrompng($folder);
 }
/* if ($imageFileType2 === "jpg" || $imageFileType2 === "jpeg") {
     $image2 = imagecreatefromjpeg($folder2);
 } else {
     $image2 = imagecreatefrompng($folder2);
 }

 if ($imageFileType3 === "jpg" || $imageFileType3 === "jpeg") {
     $image3 = imagecreatefromjpeg($folder3);
 } else {
     $image3 = imagecreatefrompng($folder3);
 }*/


         
 imagejpeg($image, $folder, 60);
 /*
 imagejpeg($image2, $folder2, 60);
 imagejpeg($image3, $folder3, 60);*/




         
 //de gebruiker terug naar de feed sturen
 //header("location: community.php");



        }




        }







     
       
    
    }

    public function feed() {

        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        $statement =  $conn->prepare("select * from post order by id");
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;









    }




   
}
