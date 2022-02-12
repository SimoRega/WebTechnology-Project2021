<div class="container col-xxl-12 px-4 py-5">
      <div class="row card flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="../res/2.jpg" class="d-block mx-lg-auto img-fluid"  width="700" height="500"
            loading="lazy" alt="il nostro primo camper">
        </div>
        <div class=" col-lg-6 ">
          <p class="display-5 fw-bold lh-1 mb-3 fs-1">Chi siamo</p>
          <p class="lead">Romagna camper nasce dalla volontà di portare un centro di vendita per camper capillare in tutta la romagna. La nostra passione per il viaggio e il nostro amore per la romagna ci porta a scegliere solo prodotti di ottima qualità e posizionarli sul mercato ad un prezzo super favorevole </p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          </div>
        </div>
      </div>
    </div>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="w-100  justify-content-center d-flex">
      <h3 class="white">Il nostro team</h3>
    </div>

    
    <div class="container">
      <div class="row">
        <?php foreach ($templateParams["staff"] as $person): ?>
          
          <div class="col-lg-4 col-md-6 text-dark">
              <div class="card">
                <img class="img-fluid  mx-auto d-block" style="max-height:250px"  src="<?php echo UPLOAD_DIR.$person["img"]; ?>" alt="propic <?php echo $person["nome"]; ?>">
                <div class="product-details">
                  <p class="fw-bold"><?php echo $person["nome"]; ?> </p>
                  <p ><?php echo $person["ruolo"]; ?></p>
                  <p ><?php echo $person["descrizione"]; ?></p>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>

    <div class=" my-5 w-100  justify-content-center d-flex flex-column ">
      <h3 class="m-auto white pb-2"> Dove trovarci</h3>

      <div class="m-12">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1WRPurxOlrnI2ivMcUdXIvrWtLsKLkkHD" class="w-100" style="height:600px;" ></iframe>
      </div>

    </div>
</div>
