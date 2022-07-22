<?php


class Chat {

    private $tekst;
    private $username;

    









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
     * Get the value of tekst
     */ 
    public function getTekst()
    {
        return $this->tekst;
    }

    /**
     * Set the value of tekst
     *
     * @return  self
     */ 
    public function setTekst($tekst)
    {
        $this->tekst = $tekst;

        return $this;
    }




    public function saveMessage() {

        $tekst = $this->getTekst();
        $username = $this->getUsername();
        //Value wat je ingeeft in tekst moet in de databank komen

        $conn = new PDO("mysql:host=localhost;dbname=lightpath;","root","root");
        $statement = $conn->prepare("insert into chat (username,tekst) values (:username,:tekst)");
        $statement->bindValue(":tekst", $tekst);
        $statement->bindValue(":username", $username);
        $result = $statement->execute();

        return $result;


    }

public static function selectMessages() {
    $conn = new PDO("mysql:host=localhost;dbname=lightpath;","root","root");
    $statement = $conn->prepare("select * from chat");
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;





}


}