<?php 
class Kalender {

        //Wat moet er in de kalender gebeuren

        //Je moet evenementen kunnen plannen

        private $start;
        private $end;
        private $description;

    

        /**
         * Get the value of start
         */ 
        public function getStart()
        {
                return $this->start;
        }

        /**
         * Set the value of start
         *
         * @return  self
         */ 
        public function setStart($start)
        {
                $this->start = $start;

                return $this;
        }

        /**
         * Get the value of end
         */ 
        public function getEnd()
        {
                return $this->end;
        }

        /**
         * Set the value of end
         *
         * @return  self
         */ 
        public function setEnd($end)
        {
                $this->end = $end;

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


        //maak een evenement

        function createEvent() {

        $start = $this->getStart();
        $end = $this->getEnd();
        $description = $this->getDescription();
        $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");
        //query
        $statement = $conn->prepare("insert into events (start, end, description) values (:start, :end, :description)");
            
        $statement->bindValue(":start", $start);
        $statement->bindValue(":end", $end);
        $statement->bindValue(":description", $description);

       $result =  $statement->execute();

        return $result;

        }

        public function showEvents() {

            $conn = new PDO('mysql:host=localhost;dbname=lightpath', "root", "root");

            $statement = $conn->prepare("select * from events");
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            


        }
















}