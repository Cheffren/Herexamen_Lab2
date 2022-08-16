<?php

class stream {

    //Wanneer een titel wordt ingesteld, dan wordt die ook weergegeven

    private $title;
    private $date;
    
    






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
     * Get the value of date
     */ 
    

    public function saveTitle() {

        $title = $this->getTitle();

        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        //query
        $statement = $conn->prepare("insert into stream (title, date) values (:title, NOW())");
    
        $statement->bindValue(":title", $title);
       $result =  $statement->execute();

        return $result;






    }

    public static function showTitle() {

        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");

        $statement = $conn->prepare("select * from stream where id = 1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;


    }

    
}