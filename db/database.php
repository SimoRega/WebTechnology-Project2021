<?php
    class DatabaseHelper{
        private $db;

        public function __construct($servername, $username, $pass, $dbname, $port){
            //connessione db
            $this->db = new mysqli($servername, $username, $pass, $dbname, $port);
            if($this->db->connect_error){
                die("connessione al db fallita");
            }
        }



        public function getAccessori(){



            $stmt = $this->db->prepare("SELECT * FROM accessori");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
        

        
    }