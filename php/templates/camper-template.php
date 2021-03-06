<?php

    if(!isset($_GET["id"])){
        echo "missing arguments";
        return;
    }

    $idProdotto = $_GET['id'];
    $item = $dbh->getProdottoSingolo($idProdotto)[0];
    $specifiche = $dbh->getSpecifiche($idProdotto)[0];
?>

<div class="d-flex justify-content-around flex-wrap ">

        
<section id="infogeneralicamper" class='rounded-3 bg-light p-2 mt-5 text-dark'>
    <div class="d-flex flex-column align-items-center
    pt-5">
    <p class="px-5 fs-2"><?php echo $item["nome"]; ?></p>
    <small class="px-5 pb-3" ><?php echo $item["marca"]; ?></small>
    <p class="px-5"><?php echo $item["descrizione"]; ?></p>
    <p class="px-5"><?php echo $specifiche['postiViaggio']?> Posti, <?php echo $specifiche['postiLetto']?> Letti</p>
    <p class="px-5">Prezzo a partire da : <span class="fw-bold fs-3"><?php echo $item["prezzo"]; ?></span></p>
    
    <?php if($item["qnt"]>0):?>
        <a role="button" class="btn btn-dark" href="./configuratore.php?id=<?php echo $idProdotto ?>">Configura</a>
    <?php else:?>
        <button type="button" disabled class="btn btn-dark" href="./configuratore.php?id=<?php echo $idProdotto ?>">Non disponibile</a>
    <?php endif;?>

    </div>
</section>
<section id="galleriacampersingolo" class='rounded-3 bg-light p-2 mt-5 text-dark'>
    <div class="container-fluid ">

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo UPLOAD_DIR.$item["img"]; ?>" class="d-block w-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?php echo UPLOAD_DIR.$item["img"]; ?>" class="d-block w-100 img-fluid" alt="...">  
        </div>
        <div class="carousel-item">
            <img src="<?php echo UPLOAD_DIR.$item["img"]; ?>" class="d-block w-100 img-fluid" alt="...">  
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
</section>
</div>
<section id="infospecifichecamper" class="rounded-3 bg-light p-2 mt-5 text-dark mx-auto d-block">
    <div class="d-flex flex-column align-items-center">
    <h4 class="py-3">Specifiche del Camper</h4>
    
    <div class="accordion accordion-flush w-100" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            Info generali
            </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
            <ul>
                <li >
                Telaio: <?php echo $specifiche['telaio']?>
                </li>
                <li>
                Posti viaggio: <?php echo $specifiche['postiViaggio']?>
                </li>
                <li>
                Posti letto: <?php echo $specifiche['postiLetto']?>
                </li>
                <li>
                Massa a vuoto: <?php echo $specifiche['massaVuoto']?>
                </li>
                <li>
                Massa a pieno carico: <?php echo $specifiche['massaPieno']?>
                </li>
            </ul>
            </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Motore
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
            <ul>
                <li >
                Motore 120HP <span class="text-success">- di serie</span> 
                </li>
                <li>
                Motore 140HP
                </li>
                <li>
                Motore 180HP
                </li>
            </ul>
            </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Dimensioni
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"><ul>
            <li >
                Lunghezza: <?php echo $specifiche['lunghezza']?>cm
            </li>
            <li>
                Larghezza: <?php echo $specifiche['larghezza']?>cm
            </li>
            <li>
                ALtezza: <?php echo $specifiche['altezza']?>cm
            </li>
            </ul></div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Optional
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"><ul>
            <li >
                Cerchi in lega <?php if($specifiche['cerchiLega']){ 
                    echo '<span class="text-success">- di serie</span>';
                } ?>
            </li>
            <li>
                Luci a led <?php if($specifiche['luciLed']){ 
                    echo '<span class="text-success">- di serie</span>';
                } ?>
            </li>
            <li>
                Assistenza alla guida <?php if($specifiche['adas']){ 
                    echo '<span class="text-success">- di serie</span>';
                } ?>
            </li>
            </ul></div>
        </div>
        </div>
    </div>
    </div>
</section>