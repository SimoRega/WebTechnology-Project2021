<div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="../res/2.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500"
            loading="lazy">
        </div>
        <div class="col-lg-6 bg-light">
          <h1 class="display-5 fw-bold lh-1 mb-3">Chi siamo</h1>
          <p class="lead">Romagna camper nasce dalla volontà di portare Losd ufdw bfisdb isdh isdh hsdiuhsd uifh sdhsd
            ouhsduio hsduihf huiadsbg iudsbgfiu dsafuisd fuisdagf isdfui sdfiubdsf ibsdafhisdbif asdbiufbsdi sdiuf dsibf
            diasbsdibfis uoahfiuehwaiu fhib dfib</p>
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
        <div class="col-lg-4 col-md-6 ">
          <div class="single-product prod">
            <img class="img-fluid rounded mx-auto d-block" style="max-width:250px;" src="<?php echo UPLOAD_DIR.$person["img"]; ?>">
            <div class="product-details">
              <h5 class="fw-bold"><?php echo $person["nome"]; ?> </h5>
              <p class="designation"><?php echo $person["ruolo"]; ?></p>
              <p class="designation"><?php echo $person["descrizione"]; ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class=" my-5 w-100  justify-content-center d-flex flex-column ">
      <h3 class="m-auto white pb-2"> Dove trovarci</h3>

      <div class="m-auto">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1WRPurxOlrnI2ivMcUdXIvrWtLsKLkkHD" width="640"
          height="480"></iframe>
      </div>

    </div>
</div>
