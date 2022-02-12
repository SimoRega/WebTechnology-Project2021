<div id="homePage">
  <!-- PRESENTAZIONE HOME -->
  <section class="bg-top-center bg-repeat-0">
    <div class="container-fluid">
        <div class="row " style="margin: 0% 10%;">
            <div class="col-lg-5 col-md-5 pt-3 pt-md-4 pt-lg-5 d-flex flex-column align-self-center ">
                <p class="fs-1 display-4 text-light ">TROVA IL CAMPER PERFETTO PER TE</p>
                <p class="fs-lg text-light opacity-70">Noi di Romagna Camper riusciamo sempre a trovare il camper perfetto per voi!</p>
            </div>
            <div class="col-lg-7 col-md-7 pt-3 pt-md-5 " >
                <img class="d-block mt-4 ms-auto" src="../res/camper_png.png" alt="" style="max-width: 100%;
                height: auto;
                vertical-align: middle;">
            </div>
        </div>
    </div>
  </section>


  <!-- TIPOLOGIE CAMPER -->
  <section class="container pb-5 mb-md-4 tipologie">
    <div class="d-sm-flex align-items-center justify-content-between mb-3 mb-sm-4 pb-sm-2 ">
      <p class="fs-2 h3 text-light mb-2 mb-sm-0">Tipologie Camper</p><a class="btn btn-link  fw-normal px-0" href="./shop.php?tipo=camper">Guarda tutti →</a>
    </div>
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 g-2 g-md-4">
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center"><img class="d-block mx-auto mb-3" src="../res/Laika_Campervan_Side_white.png" width="180" alt="Furgonato"><a class="nav-link-light stretched-link fw-bold" title="Furgonato" href="./shop.php?tipo=furgonato">Furgonato</a></div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center"><img class="d-block mx-auto mb-3" src="../res/Laika_Over-Cab_Side_white.png" width="180" alt="Mansardato"><a class="nav-link-light stretched-link fw-bold" title="Mansardato" href="./shop.php?tipo=mansardato">Mansardato</a></div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center"><img class="d-block mx-auto mb-3" src="../res/Laika_Low-Profile_Side_white.png" width="180" alt="Profilato"><a class="nav-link-light stretched-link fw-bold" title="Profilato" href="./shop.php?tipo=profilato">Profilato</a></div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center"><img class="d-block mx-auto mb-3" src="../res/Laika_Motorhome_Side_white.png" width="180" alt="Motorhome"><a class="nav-link-light stretched-link fw-bold" title="Motorhome" href="./shop.php?tipo=motorhome">Motorhome</a></div>
      </div>
    </div>
  </section>
  
  <!-- PREVIEW ULTIMI CAMPER AGGIUNTI -->
  <section class="container mb-md-4 ultimi_arrivi">
    <div class="d-sm-flex align-items-center justify-content-between mb-3 mb-sm-4 pb-sm-2 ">
      <p class=" fs-2 h3 text-light mb-2 mb-sm-0">Ultimi Arrivi</p><a class="btn btn-link  fw-normal px-0" href="shop.php?tipo=camper">Guarda tutti →</a>
    </div>
    <div class="album py-5 preview_modelli">
      <div class="container">
      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3">
      <?php foreach($templateParams["randomCamper"] as $rndCamper): ?>
        <div class="col">
          <div class="card">
            <a href="camper.php?id=<?php echo $rndCamper["idProdotto"] ?>">
              <div class="container-fluid">
                <img class="img-fluid" src="<?php echo UPLOAD_DIR.$rndCamper["img"]; ?>" alt="<?php echo $rndCamper["nome"]; ?>">
              </div>
              <div class="card-body">
                <p class="card-text"><?php echo $rndCamper["marca"]; ?></p>
                <h5 class="card-title"><?php echo $rndCamper["nome"]; ?></h5>
                <p class="card-text">€ <?php echo $rndCamper["prezzo"]; ?></p>
              </div>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
    </div>
  </section>

  <!-- MARCHE CAMPER -->
  <section class="container pb-5 mb-md-4 marche">
    <div class="d-sm-flex align-items-center justify-content-between mb-3 mb-sm-4 pb-sm-2 ">
      <h2 class="h3 text-light mb-2 mb-sm-0">Marche Camper</h2><a class="btn btn-link  fw-normal px-0" href="shop.php?tipo=camper">Guarda tutti →</a>
    </div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-lg-3 align-items-center" >
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center">
          <a class="nav-link-light stretched-link fw-bold" href="shop.php?tipo=camper&marca=laika">
          <img class="d-block mx-auto mb-3" src="../res/laika_logo.png" width="180" alt="Laika ">
          </a>
        </div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center">
          <a class="nav-link-light stretched-link fw-bold" href="shop.php?tipo=camper&marca=adria">
          <img class="d-block mx-auto mb-3" src="../res/adria_logo.png" width="180"  alt="Arca">

          </a></div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center">
          <a class="nav-link-light stretched-link fw-bold" href="shop.php?tipo=camper&marca=knaus">
          <img class="d-block mx-auto mb-3" src="../res/knaus_logo.png" width="180"  alt="Knaus">

          </a></div>
      </div>
    </div>
  </section>
  
  <!-- PREVIEW NEGOZIO -->
  <div class="tns-item tns-slide-active preview_negozio mb-md-4" id="tns5-item0">
    <div class="card card-body p-sm-5  h-100">
      <div class="row align-items-center py-3 py-sm-0">
        <div class="col-md-4 col-xl-3 mb-4 pb-3 mb-md-0 pb-md-0 text-center text-md-start">
          <h2 class="text-light">Negozio Accessori</h2>
          <p class="fs-lg text-light opacity-70 pb-md-4">Dai un occhiata ai nostri accessori per camper!</p>
          <a class="btn btn-primary" href="shop.php?tipo=accessori">Vai allo Shop</a>
        </div>
        <div class="col-md-8 col-xl-9">
          <div class="row row-cols-1 row-cols-lg-3 gy-4 gx-3 gx-sm-4">
            <a class="col text-light text-decoration-none" href="shop.php?tipo=sedia">
              <img class="d-block mb-2 mx-auto tns-complete" src="./upload/dometic_chair180.png" width="168" alt="Seat Covers">
              <div class="fw-bold text-center pt-1">Sedie Pieghevoli</div>
            </a>
            <a class="col text-light text-decoration-none" href="shop.php?tipo=frigorifero">
              <img class="d-block mb-2 mx-auto tns-complete" src="./upload/dometic_cff35.png" width="168" alt="Tires">
              <div class="fw-bold text-center pt-1">Frigoriferi</div>
            </a>
            <a class="col text-light text-decoration-none" href="shop.php?tipo=tavolo">
              <img class="d-block mb-2 mx-auto loaded tns-complete" src="./upload/dometic_zero.png" width="168" alt="Disks">
              <div class="fw-bold text-center pt-1">Tavoli da Campeggio</div>
            </a>
        </div>
      </div>
    </div>
  </div>

      </div>
</div>