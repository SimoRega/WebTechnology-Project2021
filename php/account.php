<?php
require_once("bootstrap.php");

$templateParams["title"] = "CamperRomagna - Home";
$templateParams["template"] = "login-home.php";


if(isset($_GET["l"])){
    unset($_SESSION["cognome"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["email"]);

}

if(isset($_POST["oldPass"]) && isset($_POST["newpass1"]) && isset($_POST["newpass2"])){
    if($_POST["newpass1"] ==  $_POST["newpass2"] ){
        if(count($dbh->checkLogin($_SESSION["email"],$_POST["oldPass"]))==0){
            $message = "La password non è corretta";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else{
            $dbh->updatePass($_SESSION["email"],$_POST["newpass1"]);

            $message = "Password cambiata correttamente!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }else {
        $message = "Le password non coincidono";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

if(isset($_FILES["propic"])){
    $uploadImg = uploadImage("./upload/", $_FILES["propic"]);
    if($uploadImg[0]){
        $dbh->changePropic($uploadImg[1], $_SESSION["email"]);
    }
}

if(isset($_POST["marca"])){

    $uploadImg = uploadImage("./upload/", $_FILES["img"]);

    if($uploadImg[0]){
        $dbh->addProduct($_POST["nome"],$_POST["marca"],$_POST["prezzo"],$_POST["descr"],$uploadImg[1],$_POST["qnt"],$_POST["tipo"]);
    }

}

if(isset($_POST["spedisciOrdine"])){
    $dbh->setStatoOrdine($_POST["idOrdine"],"Spedito");
    $email=$dbh->getEmailOrder($_POST["idOrdine"])[0]["idUtente"];
    $dbh->creaNotifica($_POST["idOrdine"],$email,"Il tuo ordine è stato spedito");

}
if(isset($_POST["cancecllaOrdine"])){
    $dbh->setStatoOrdine($_POST["idOrdine"],"Cancellato");
    $email=$dbh->getEmailOrder($_POST["idOrdine"])[0]["idUtente"];
    $dbh->creaNotifica($_POST["idOrdine"],$email,"Il tuo ordine è stato cancellato");
}


if(isset($_POST["delProdButton"])){
    $dbh->editProd($_POST["idProdottoToEdit"],$_POST["newName"],$_POST["newPrice"],0);
}

if(isset($_POST["editProdButton"])){
    $dbh->editProd($_POST["idProdottoToEdit"],$_POST["newName"],$_POST["newPrice"],$_POST["newQnt"]);
}


if(!isUserLoggedIn()){
    header('Location: login.php');
}


require("./templates/base.php");





function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 100000;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 100000
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}
?>