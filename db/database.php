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

        public function getAllProdotti(){
            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO");
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

        public function findItem($marca,$prod,$tipo){
            switch($prod){
                case "camper":
                    if($tipo!="furgonato" || $tipo!="profilato" || $tipo!="mansardato" || $tipo!="motorhome" ){
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? AND (tipo='furgonato' OR tipo='profilato' OR tipo='mansardato' OR tipo='motorhome');");
                        $stmt->bind_param('s',$marca);
                    }else{
                        if($tipo==NULL){
                            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? ;");
                            $stmt->bind_param('s',$marca);
                        }else{
                            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? OR tipo=?;");
                            $stmt->bind_param('ss',$marca,$tipo);
                        }
                        break;
                    }
                    break;
                case "accessori":
                    if($tipo!="tavolo" || $tipo!="sedia" || $tipo!="frigorifero"){
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? AND (tipo='tavolo' OR tipo='sedia' OR tipo='frigorifero');");
                        $stmt->bind_param('s',$marca);
                    }else{
                        if($tipo==NULL){
                            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? ;");
                            $stmt->bind_param('s',$marca);
                        }else{
                            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? OR tipo=?;");
                            $stmt->bind_param('ss',$marca,$tipo);
                        }
                        break;
                    }
                    break;
                case NULL:
                    if($tipo==NULL){
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? ;");
                        $stmt->bind_param('s',$marca);
                    }else{
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? OR tipo=?;");
                        $stmt->bind_param('ss',$marca,$tipo);
                    }
                    break;
                default:
                if($tipo==NULL){
                    $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? ;");
                    $stmt->bind_param('s',$marca);
                }else{
                    $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE marca= ? OR tipo=?;");
                    $stmt->bind_param('ss',$marca,$tipo);
                }
                break;
            }
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function findByText($t){
            $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE nome= ? OR marca=? OR tipo=?;");
            $stmt->bind_param('sss',$t,$t,$t);
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
                        $stmt->bind_param('ii',$min,$max);

                        break;
                case "accessori":
                    if($onlyDisp){
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE (tipo='tavolo' OR tipo='sedia' OR tipo='frigorifero') AND (prezzo > ? AND prezzo <= ? AND qnt > 0)");
                    }else {
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE (tipo='tavolo' OR tipo='sedia' OR tipo='frigorifero') AND (prezzo > ? AND prezzo <= ?)");
                    }
                        $stmt->bind_param('ii',$min,$max);

                    break;
                default:
                    if($onlyDisp){
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE (tipo=? ) AND (prezzo > ? AND prezzo <= ? AND qnt > 0)");
                    }else {
                        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO WHERE (tipo=? ) AND (prezzo > ? AND prezzo <= ?)");
                    }
                    $stmt->bind_param('sii',$tipo,$min,$max);

                    break;
                    
            }



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
            $tmp=md5($password);
            $stmt->bind_param('ss',$email, $tmp);
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

        public function addToCart($u,$id,$q,$conf){
            $query = "INSERT INTO PRODOTTO_IN_CARRELLO (idProdCarrello,idUtente,idProdotto,qnt,idConfigurazione) VALUES (idProdCarrello,?,?,?,?);";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('siii',$u,$id,$q,$conf);
            $stmt->execute();
        }
        public function getCartItems($u){
            $stmt = $this->db->prepare("SELECT idUtente,PRODOTTO.idProdotto as idProdotto,PRODOTTO_IN_CARRELLO.qnt as qntCart, nome, marca, prezzo,img,PRODOTTO.qnt as qntDisp,tipo, idConfigurazione FROM PRODOTTO_IN_CARRELLO JOIN PRODOTTO ON PRODOTTO_IN_CARRELLO.idProdotto=PRODOTTO.idProdotto WHERE idUtente= ? ;");
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
            $stmt = $this->db->prepare("SELECT * FROM NOTIFICA WHERE email= ? ORDER BY dataNotifica desc;");
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function creaOrdine($email,$citta,$via,$cap){
            $query = "INSERT INTO `ORDINE`(`idOrdine`, `idUtente`, `dataOrdine`, `stato`,citta,via,cap) VALUES (idOrdine,?,now(),'In lavorazione',?,?,?);";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssss',$email,$citta,$via,$cap);
            $stmt->execute();
        }

        public function removeItemCart($u,$id,$idConf){
            if($idConf==NULL){
                $stmt = $this->db->prepare("DELETE FROM PRODOTTO_IN_CARRELLO WHERE idUtente=? AND idProdotto=? ;");
                $stmt->bind_param('si',$u,$id);
            }else{
                $stmt = $this->db->prepare("DELETE FROM PRODOTTO_IN_CARRELLO WHERE idUtente=? AND idProdotto=? AND idConfigurazione=?;");
                $stmt->bind_param('sii',$u,$id,$idConf);
            }
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

        public function getLastConfId(){
            $stmt = $this->db->prepare("SELECT idConfigurazione FROM CONFIGURAZIONE ORDER BY idConfigurazione desc limit 1;");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function aggiungiProdInOrdine($idOrdine,$idProdotto,$qnt,$idConf){
            $query = "INSERT INTO PRODOTTO_IN_ORDINE (idProdInOrdine,idOrdine,idProdotto,qnt,idConfigurazione) VALUES (idProdInOrdine,?,?,?,?);";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iiii',$idOrdine,$idProdotto,$qnt,$idConf);
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


        public function getConfigurazioneCamper($u,$id){
            $query = "SELECT * FROM CONFIGURAZIONE;";
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


        public function salvaConfigurazione($color,$motor,$optional,$costo){
            $query = "INSERT INTO CONFIGURAZIONE(idConfigurazione,idColore,idMotore,idOptional,costoConf) VALUES (idConfigurazione,?,?,?,?);";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iiii',$color,$motor,$optional, $costo);
            $stmt->execute();
        }

        

        public function getDatiConfigurazione($id){
            $query = "SELECT configurazione.idConfigurazione as idConfigurazione, configurazione.costoConf,prodotto_in_carrello.idUtente,prodotto_in_carrello.idProdotto, colore_camper.nome as colore, motore_camper.nome as motore, optional_camper.nome as optional, colore_camper.costo as costoColore, motore_camper.costo as costoMotore, optional_camper.costo as costoOptional FROM (((configurazione JOIN prodotto_in_carrello on configurazione.idConfigurazione=prodotto_in_carrello.idConfigurazione) JOIN colore_camper ON configurazione.idColore=colore_camper.idColore)JOIN motore_camper ON configurazione.idMotore=motore_camper.idMotore)JOIN optional_camper ON configurazione.idOptional=optional_camper.idOptional WHERE configurazione.idConfigurazione=?;";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$id);
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


        public function setStatoOrdine($idOrdine,$stato){
            $stmt = $this->db->prepare("UPDATE  ORDINE SET stato=? WHERE idOrdine= ?  ");
            $stmt->bind_param('si',$stato,$idOrdine);
            $stmt->execute();
        }


        public function getEmailOrder($idOrdine){
            $stmt = $this->db->prepare("SELECT idUtente FROM ORDINE  WHERE idOrdine=?");
            $stmt->bind_param('s',$idOrdine);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }


        public function getStaff(){
            $query = "SELECT * FROM STAFF";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function editProd($idProdotto,$nome,$prezzo,$qnt){
            $stmt = $this->db->prepare("UPDATE  PRODOTTO SET nome=?, prezzo=?,qnt=? WHERE idProdotto= ?");
            $stmt->bind_param('siii',$nome,$prezzo,$qnt,$idProdotto);
            $stmt->execute();

        }
        public function editQntProd($idProdotto,$qnt){
            $stmt = $this->db->prepare("UPDATE  PRODOTTO SET qnt=? WHERE idProdotto= ?;");
            $stmt->bind_param('ii',$qnt,$idProdotto);
            $stmt->execute();

        }

        public function getAllMarche(){
            $stmt = $this->db->prepare("SELECT DISTINCT marca FROM PRODOTTO ");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllTipologie(){
            $stmt = $this->db->prepare("SELECT DISTINCT tipo FROM PRODOTTO ");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function updatePrice($id, $price){
            $stmt = $this->db->prepare("UPDATE  CONFIGURAZIONE SET costoConf=? WHERE idConfigurazione= ?;");
            $stmt->bind_param('si',$price,$id);
            $stmt->execute();
        }
        public function getAllAdmins(){
            $stmt = $this->db->prepare("SELECT *  FROM UTENTE where isAdmin=1");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
?>