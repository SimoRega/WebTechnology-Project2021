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

        public function getAllInfoCamper($id){
            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO JOIN SPECIFICHE_CAMPER ON PRODOTTO.idProdotto=SPECIFICHE_CAMPER.idProdotto WHERE SPECIFICHE_CAMPER.idProdotto= ?;");
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }


        public function getAccessoriWithParam($tipo,$onlyDisp,$min,$max){

            switch($tipo){
                case "camper":
                    if($onlyDisp){
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE (tipo='furgonato' OR tipo='profilato' OR tipo='mansardato' OR tipo='motorhome') AND (prezzo > ? AND prezzo <= ? AND qnt > 0)");
                    }else{
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE (tipo='furgonato' OR tipo='profilato' OR tipo='mansardato' OR tipo='motorhome') AND (prezzo > ? AND prezzo <= ?)");
                    }
                        break;
                case "accessori":
                    if($onlyDisp){
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE (tipo='tavolo' OR tipo='sedia' OR tipo='frigorifero') AND (prezzo > ? AND prezzo <= ? AND qnt > 0)");
                    }else {
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE (tipo='tavolo' OR tipo='sedia' OR tipo='frigorifero') AND (prezzo > ? AND prezzo <= ?)");
                    }
                    break;
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

        public function updateCart($email,$id,$q){
            $query = "UPDATE PRODOTTO_IN_CARRELLO SET qnt = ? WHERE idUtente = ? AND idProdotto=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('isi',$q,$email,$id);
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
            $query = "INSERT INTO UTENTE (email,nome,cognome,password,propic,isAdmin) VALUES (?,?,?,?,'a.jpg',false);";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssss',$email,$nome,$cognome,md5($password));
            $stmt->execute();
        }
        

        public function getSpecifiche($idProdotto){
            $stmt=null;
            $stmt = $this->db->prepare("SELECT * FROM SPECIFICHE_CAMPER WHERE idProdotto=?;");
            $stmt->bind_param('i',$idProdotto);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function changePropic($img,$email){
            $query = "UPDATE UTENTE SET propic = ? WHERE email = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$img, $email);
            $stmt->execute();
        }

        public function getPropic($email){
            $stmt=null;
            $stmt = $this->db->prepare("SELECT propic FROM UTENTE WHERE email=?;");
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function getRandomCamper($qnt){
            $res = $this->getProdotti("camper");
            if(count($res)==$qnt){
                return $res;
            }
            return array_slice($res, 0, $qnt);
        }

        public function getProductByBrand($brandName){
            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ?;");
            $stmt->bind_param('s',$brandName);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function addToCart($u,$id,$q){
            $query = "INSERT INTO PRODOTTO_IN_CARRELLO (idUtente,idProdotto,qnt) VALUES (?,?,?);";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sii',$u,$id,$q);
            $stmt->execute();
        }
        public function getCartItems($u){
            $stmt = $this->db->prepare("SELECT idUtente,PRODOTTO.idProdotto as idProdotto,PRODOTTO_IN_CARRELLO.qnt as qntCart, nome, marca, prezzo,img,PRODOTTO.qnt as qntDisp,tipo FROM PRODOTTO_IN_CARRELLO JOIN PRODOTTO ON PRODOTTO_IN_CARRELLO.idProdotto=PRODOTTO.idProdotto WHERE idUtente= ? ;");
            $stmt->bind_param('s',$u);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function checkItemInCart($u,$id){
            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO_IN_CARRELLO WHERE idUtente= ? AND idProdotto=? ;");
            $stmt->bind_param('si',$u,$id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNotification($email){
            $stmt = $this->db->prepare("SELECT * FROM NOTIFICA WHERE email= ? ;");
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function creaOrdine($email){
            $query = "INSERT INTO `ORDINE`(`idOrdine`, `idUtente`, `dataOrdine`, `stato`) VALUES (idOrdine,?,now(),'In lavorazione');";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$email);
            $stmt->execute();
        }

        public function removeItemCart($u,$id){
            $stmt = $this->db->prepare("DELETE FROM PRODOTTO_IN_CARRELLO WHERE idUtente=? AND idProdotto=? ;");
            $stmt->bind_param('si',$u,$id);
            $stmt->execute();
        }
        
        public function removeAllCart($email){
            $stmt = $this->db->prepare("DELETE FROM PRODOTTO_IN_CARRELLO WHERE idUtente=?;");
            $stmt->bind_param('s',$email);
            $stmt->execute();
        }

        public function getLastOrderId($email){
            $stmt = $this->db->prepare("SELECT idOrdine FROM ORDINE WHERE idUtente= ?  ORDER BY dataOrdine desc limit 1");
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function aggiungiProdInOrdine($idOrdine,$idProdotto,$qnt){
            $query = "INSERT INTO PRODOTTO_IN_ORDINE (idOrdine,idProdotto,qnt) VALUES (?,?,?);";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iii',$idOrdine,$idProdotto,$qnt);
            $stmt->execute();
        }

        public function creaNotifica($idOrdine,$email,$descr){
            $query = "INSERT INTO `NOTIFICA`(`idNotifica`,`idOrdine`,  `email`, `descrizione`,dataNotifica) VALUES (idNotifica,?,?,?,now());";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sss',$idOrdine,$email,$descr);
            $stmt->execute();
        }

        public function getAllOrder($email){
            $stmt = $this->db->prepare("SELECT * FROM ORDINE WHERE idUtente= ?  ORDER BY dataOrdine desc; ");
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getTipologia($id){
            $stmt = $this->db->prepare("SELECT tipo FROM PRODOTTO WHERE idProdotto= ?; ");
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $result = $stmt->get_result();
            $res=$result->fetch_all(MYSQLI_ASSOC);

            if($res[0]["tipo"]=="sedia" || $res[0]["tipo"]=="tavolo" || $res[0]["tipo"]=="frigorifero"){
                return "accessorio";
            }

            return "camper";

        }

        public function getColor(){
            $query = "SELECT * FROM COLORE_CAMPER";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getMotore(){
            $query = "SELECT * FROM MOTORE_CAMPER";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getOptional(){
            $query = "SELECT * FROM OPTIONAL_CAMPER";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getProdOnOrder($idOrdine){
            $query = "SELECT PRODOTTO.nome, PRODOTTO.img, PRODOTTO_IN_ORDINE.qnt FROM (PRODOTTO_IN_ORDINE JOIN ORDINE ON PRODOTTO_IN_ORDINE.idOrdine = ORDINE.idOrdine) JOIN PRODOTTO ON PRODOTTO.idProdotto = PRODOTTO_IN_ORDINE.idProdotto WHERE ORDINE.idOrdine = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$idOrdine);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getOrder(){
            $stmt = $this->db->prepare("SELECT * FROM ORDINE  ORDER BY dataOrdine desc; ");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
?>