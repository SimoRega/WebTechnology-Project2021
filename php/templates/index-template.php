<main id="homePage">
  <!-- PRESENTAZIONE HOME -->
  <section class="bg-top-center bg-repeat-0">
    <div class="container-fluid">
        <div class="row " style="margin: 0% 10%;">
            <div class="col-lg-5 col-md-5 pt-3 pt-md-4 pt-lg-5 d-flex flex-column align-self-center ">
                <h1 class="display-4 text-light ">TROVA IL CAMPER PERFETTO PER TE</h1>
                <p class="fs-lg text-light opacity-70">Finder is a leading digital marketplace for the automotive industry that connects car shoppers with sellers.</p>
            </div>
            <div class="col-lg-7 col-md-7 pt-3 pt-md-5 " >
                <img class="d-block mt-4 ms-auto" src="../res/camper_png.png" alt="" style="max-width: 100%;
                height: auto;
                vertical-align: middle;">
            </div>
        </div>
    </div>
  </section>

  <!-- BARRA RICERCA VELOCE -->
  <div class="container mt-4 mt-sm-3 mt-lg-n3 p-3 mb-md-4 barra_ricerca ">
    <form class="form-group d-block">
      <div class="row g-0 ms-lg-n2 align-items-center">
        <div class="col-lg-3 ">
          <div class="input-group border-end-lg"><span class="input-group-text  ps-2 ps-sm-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
            <input class="form-control" type="text" name="keywords" placeholder="Ricerca Veloce">
          </div>
        </div>
        <hr class="hr-light d-lg-none my-2">
        <div class="col-lg-2 col-md-4 col-sm-6">
          <div class="dropdown border-end-sm border-light" data-bs-toggle="select">
            <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-list me-2"></i><span class="dropdown-toggle-label">MARCA</span></button>
            <input type="hidden" name="make">
            <ul class="dropdown-menu dropdown-menu-dark" style="">
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Acura</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">BMW</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Citroen</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Lexus</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Mercedes-Benz</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Nissan</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Toyota</span></a></li>
            </ul>
          </div>
        </div>
        <hr class="hr-light d-md-none my-2">
        <div class="col-lg-2 col-md-4 col-sm-6">
          <div class="dropdown border-end-sm border-light" data-bs-toggle="select">
            <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-car fs-lg me-2"></i><span class="dropdown-toggle-label">TIPOLOGIA</span></button>
            <input type="hidden" name="type">
            <ul class="dropdown-menu dropdown-menu-dark" style="">
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Compact</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Crossover</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Coupe</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Family MPV</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Pickup</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Sedan</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">SUV</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Wagon</span></a></li>
            </ul>
          </div>
        </div>
        <hr class="hr-light d-sm-none my-2">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="dropdown" data-bs-toggle="select">
            <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-map-pin me-2"></i><span class="dropdown-toggle-label">CITTÀ</span></button>
            <input type="hidden" name="location">
            <ul class="dropdown-menu dropdown-menu-dark" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -44px);" data-popper-placement="top-start">
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Dallas</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Chicago</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Houston</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Las Vegas</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Los Angeles</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">New York</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">San Francisco</span></a></li>
            </ul>
          </div>
        </div>
        <hr class="hr-light d-lg-none my-2">
        <div class="col-lg-2">     
          <button class="btn w-100" type="submit">CERCA</button>
        </div>
      </div>
    </form>
  </div>


  <!-- TIPOLOGIE CAMPER -->
  <section class="container pb-5 mb-md-4 tipologie">
    <div class="d-sm-flex align-items-center justify-content-between mb-3 mb-sm-4 pb-sm-2 ">
      <h2 class="h3 text-light mb-2 mb-sm-0">Tipologie Camper</h2><a class="btn btn-link  fw-normal px-0" href="car-finder-catalog-grid.html">Guarda tutti →</a>
    </div>
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 g-2 g-md-4">
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center"><img class="d-block mx-auto mb-3" src="../res/Laika_Campervan_Side_white.png" width="180" alt="Furgonato"><a class="nav-link-light stretched-link fw-bold" href="./shop.php?tipo=furgonato">Furgonato</a></div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center"><img class="d-block mx-auto mb-3" src="../res/Laika_Over-Cab_Side_white.png" width="180" alt="Mansardato"><a class="nav-link-light stretched-link fw-bold" href="./shop.php?tipo=mansardato">Mansardato</a></div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center"><img class="d-block mx-auto mb-3" src="../res/Laika_Low-Profile_Side_white.png" width="180" alt="Profilato"><a class="nav-link-light stretched-link fw-bold" href="./shop.php?tipo=profilato">Profilato</a></div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center"><img class="d-block mx-auto mb-3" src="../res/Laika_Motorhome_Side_white.png" width="180" alt="Motorhome"><a class="nav-link-light stretched-link fw-bold" href="./shop.php?tipo=motorhome">Motorhome</a></div>
      </div>
    </div>
  </section>
  
  <!-- PREVIEW ULTIMI CAMPER AGGIUNTI -->
  <section class="container mb-md-4 ultimi_arrivi">
    <div class="d-sm-flex align-items-center justify-content-between mb-3 mb-sm-4 pb-sm-2 ">
      <h2 class="h3 text-light mb-2 mb-sm-0">Ultimi Arrivi</h2><a class="btn btn-link  fw-normal px-0" href="car-finder-catalog-grid.html">Guarda tutti →</a>
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
                <p class="card-text">costo</p>
                <div class="d-flex justify-content-between align-items-between">
                  <small class="text-muted">roma</small>
                  <small class="text-muted">9 mins</small>
              </div>
            </a>
            </div>
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
          <img class="d-block mx-auto mb-3" src="../res/laika_logo.png" width="180"  height="auto" alt="Laika ">
          <a class="nav-link-light stretched-link fw-bold" href="shop.php?tipo=camper&marca=laika">
          </a>
        </div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center">
          <img class="d-block mx-auto mb-3" src="../res/adria_logo.png" width="180" height="auto" alt="Arca">
          <a class="nav-link-light stretched-link fw-bold" href="shop.php?tipo=camper&marca=adria"></a></div>
      </div>
      <!-- Item-->
      <div class="col">
        <div class="card card-body card-light card-hover bg-transparent border-0 px-0 pt-0 text-center">
          <img class="d-block mx-auto mb-3" src="../res/knaus_logo.png" width="180" height="auto" alt="Knaus">
          <a class="nav-link-light stretched-link fw-bold" href="shop.php?tipo=camper&marca=knaus"></a></div>
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
            <a class="col text-light text-decoration-none" href="#">
              <img class="d-block mb-2 mx-auto tns-complete" src="./upload/dometic_chair180.png" width="168" alt="Seat Covers">
              <div class="fw-bold text-center pt-1">Tavoli da Campeggio</div>
            </a>
            <a class="col text-light text-decoration-none" href="#">
              <img class="d-block mb-2 mx-auto tns-complete" src="./upload/dometic_cff35.png" width="168" alt="Tires">
              <div class="fw-bold text-center pt-1">Frigoriferi</div>
            </a>
            <a class="col text-light text-decoration-none" href="#">
              <img class="d-block mb-2 mx-auto loaded tns-complete" src="./upload/dometic_zero.png" width="168" alt="Disks">
              <div class="fw-bold text-center pt-1">Sedie Pieghevoli</div>
            </a>
        </div>
      </div>
    </div>
  </div>


</main>