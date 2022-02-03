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

        public function getAccessoriWithParam($onlyDisp,$min,$max){
            if($onlyDisp){
                $stmt = $this->db->prepare("SELECT * FROM accessori WHERE prezzo > ? AND prezzo < ? AND qnt > 0" );
            }else {
                $stmt = $this->db->prepare("SELECT * FROM accessori WHERE prezzo > ? AND prezzo < ?");

            }
            $stmt->bind_param('ii',$min,$max);

            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }



        public function getItem($id){
            $stmt = $this->db->prepare("SELECT idAccessorio, nome, prezzo, descrizione, img FROM accessori WHERE idAccessorio=? ");
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
        

        	
	public function checkLogin($email, $password){
        $query = "SELECT * FROM UTENTE WHERE  email = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updatePass($email,$pass){
        $query = "UPDATE UTENTE SET password = ? WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$pass, $email);
        $stmt->execute();
    }
        
}