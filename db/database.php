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

        public function getProdotti($tipo){
            $stmt=null;
            switch($tipo){
                case "camper":
                    $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE tipo='furgonato' OR tipo='profilato' OR tipo='mansardato' OR tipo='motorhome';");
                    break;
                case "accessori":
                    $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE tipo='tavolo' OR tipo='sedia' OR tipo='frigorifero';");
                    break;
                default:
                    $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE tipo= ?;");
                    $stmt->bind_param('s',$tipo);
            }
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getProdottoSingolo($id){
            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE idProdotto= ?;");
            $stmt->bind_param('i',$id);
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
        $stmt->bind_param('ss',$email, md5($password));
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updatePass($email,$pass){
        $query = "UPDATE UTENTE SET password = ? WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',md5($pass), $email);
        $stmt->execute();
    }

    public function checkIsAdmin($email){
        $query = "SELECT * FROM UTENTE WHERE  email = ? AND isAdmin=1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return count($result->fetch_all(MYSQLI_ASSOC)) > 0;
    }

    public function addProduct($nome,$marca,$prezzo,$descr,$img,$qnt,$tipo){
        $query = "INSERT INTO PRODOTTO (idProdotto,nome,marca,prezzo,descrizione,img,qnt,tipo) VALUES (idProdotto,?,?,?,?,?,?,?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssissis',$nome,$marca,$prezzo,$descr,$img,$qnt,$tipo);
        $stmt->execute();
    }

    public function registerUser($email,$nome,$cognome,$password){
        $query = "INSERT INTO UTENTE (email,nome,cognome,password,isAdmin) VALUES (?,?,?,?,false);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss',$email,$nome,$cognome,md5($password));
        $stmt->execute();
    }
    
        
}