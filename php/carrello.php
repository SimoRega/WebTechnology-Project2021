<?php
require_once("bootstrap.php");
require_once("utils/functions.php");
$templateParams["title"] = "CamperRomagna - Carrello";


if(isset($_POST["id"]) && isset($_POST["qnt"])){
    $id=$_POST["id"];
    $qnt=$_POST["qnt"];
    if(isUserLoggedIn()){
        $checkItem=$dbh->checkItemInCart($_SESSION["email"],$id);


        if(empty($checkItem[0]["idProdotto"])){
            if($dbh->getTipologia($id)=="camper"){
                $dbh->salvaConfigurazione($_POST["color"],$_POST["motor"],$_POST["optional"], $_POST["prezzo"]);
                $lastID=$dbh->getLastConfId()[0]["idConfigurazione"];
                $dbh->addToCart($_SESSION["email"],$id,$qnt,$lastID);    
            }else{
                $dbh->addToCart($_SESSION["email"],$id,$qnt,NULL);
            }
        }else if($qnt==0){
            
            if(isset($_POST["idConfigurazione"])){
                $dbh->removeItemCart($_SESSION["email"],$id,$_POST["idConfigurazione"]);
                header('Location: carrello.php');
            }else{
                $dbh->removeItemCart($_SESSION["email"],$id,NULL);
                header('Location: carrello.php');
            }
            $item= $dbh->getCartItems($_SESSION["email"]);
            if(empty($item[0]["idProdotto"])){
                $templateParams["template"] = "carrello-vuoto-template.php";
                require("./templates/base.php");
                exit;
            }
        }else if($checkItem[0]["qnt"]!=0){
            #update, aggiungere quantità
            if($dbh->getTipologia($id)=="camper"){
                $dbh->salvaConfigurazione($_POST["color"],$_POST["motor"],$_POST["optional"], $_POST["prezzo"]);
                $lastID=$dbh->getLastConfId()[0]["idConfigurazione"];
                $dbh->addToCart($_SESSION["email"],$id,$qnt,$lastID);
            }else{
                $q=$qnt+$checkItem[0]["qnt"];
                $dbh->updateCart($_SESSION["email"],$id,$q);
            }
        } 
        header('Location: carrello.php');
    }else{
        header('Location: login.php');
        exit;
    }
}else {
    if(!isUserLoggedIn()){
        header('Location: login.php');
    }else{
        $item= $dbh->getCartItems($_SESSION["email"]);
        if(empty($item[0]["idProdotto"])){
            $templateParams["template"] = "carrello-vuoto-template.php";
            require("./templates/base.php");
            exit;
        }
    }
}

$templateParams["template"] = "carrello-template.php";
require("./templates/base.php");
?>