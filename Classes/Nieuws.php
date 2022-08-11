<?php 





class Nieuws {


//Sla een artikel op

private $filename;
private $title;
private $description;
private $category;


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
 * @return  self
 */ 
public function setFilename($filename)
{
    $this->filename = $filename;

    return $this;
}

/**
 * Get the value of title
 */ 
public function getTitle()
{
    return $this->title;
}

/**
 * Set the value of title
 *
 * @return  self
 */ 
public function setTitle($title)
{
    $this->title = $title;

    return $this;
}

/**
 * Get the value of description
 */ 
public function getDescription()
{
    return $this->description;
}

/**
 * Set the value of description
 *
 * @return  self
 */ 
public function setDescription($description)
{
    $this->description = $description;

    return $this;
}

/**
 * Get the value of tags
 */ 
public function getCategory()
{
    return $this->category;
}

/**
 * Set the value of tags
 *
 * @return  self
 */ 
public function setCategory($category)
{
    $this->category = $category;

    return $this;
}


public function addNieuws() {
    //het pad om de geuploade afbeelding in op te slagen
    // $target = "image/" . basename($_FILES["uploadfile"]["name"]);
    $filename = $_FILES["thumbnail"]["name"];
    $tempname = $_FILES["thumbnail"]["tmp_name"];	
    $folder = "uploads/".date('YmdHis')."_".$filename; //.date('YmdHis')."_"

    

    //het type bestand uitlezen zodat we later non-images kunnen tegenhouden
    $imageFileType = strtolower(pathinfo($folder,PATHINFO_EXTENSION));
 
    //connectie naar db
    $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");


    //alle data ophalen uit het ingestuurde formulier
    $filename = $this->getFilename();
    $title = $this->getTitle();
    $description = $this->getDescription();
    $category = $this->getcategory();
    //$tags = $this->getTags();

        if(!empty($imageFileType)){
            if($imageFileType === "jpg" || $imageFileType === "jpeg" || $imageFileType === "png") {
                $filename = $_FILES["thumbnail"]["name"];
            } else {
                throw new Exception("Please choose a valid png, jpg or jpeg file");
            }
        } else {
            throw new Exception("The image cannot be empty");
        }

    //opgehaalde data opslagen in databank
    $statement = $conn->prepare("INSERT INTO `news` (`id`, `title`, `description`, `thumbnail`, `category`) VALUES (NULL,:title, :description, :thumbnail, :category);)");
    $statement->bindValue(":title",$title);
    $statement->bindValue(":description",$description);
    $statement->bindValue(":thumbnail",$folder);
    $statement->bindValue(":category", $category);
    //$statement->bindValue(":tags",$tags);
 
    //var_dump($_SESSION['name']);
    $statement->execute();

    //geuploade afbeelding in de images folder zetten
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    
            
    if ($imageFileType === "jpg" || $imageFileType === "jpeg") {
        $image = imagecreatefromjpeg($folder);
    } else {
        $image = imagecreatefrompng($folder);
    }
  
            
            
    imagejpeg($image, $folder, 60);


            
    //de gebruiker terug naar de feed sturen
  
    
}

public function showNews($category) {

    $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");

    $statement = $conn->prepare("select * from news where category = :category");
    $statement->bindValue(":category", $category);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;


}



public function showNewsFeed() {

    $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
    $statement = $conn->prepare("select * from news");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);


    return $result;



}
public function deleteNews($id) {

    $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
    $statement = $conn->prepare("delete from news where id= :id");
    $statement->bindValue(":id", $id);
    $statement->execute();
    //$result = $statement->Fetch();

    //return $result;




}
public function showArticle($id) {

    $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
    $statement = $conn->prepare("select * from news where id= :id");
    $statement->bindValue(":id", $id);
    $statement->execute();
    $result = $statement->Fetch();

    return $result;




}



}

























