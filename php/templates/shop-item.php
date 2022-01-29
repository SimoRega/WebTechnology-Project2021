<?php $item = $templateParams["articolo"][0] ?>


<div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6">
            <img class="card-img-top mb-5 mb-md-0" src="<?php echo UPLOAD_DIR.$item["img"]; ?>" alt="...">
        </div>
        <div class="col-md-6">

            <h1 class="display-5 fw-bolder"><?php echo $item["nome"]; ?></h1>
            <div class="fs-5 mb-5">
                <span class="text-decoration-line-through">$45.00</span>
                <span><?php echo $item["prezzo"]; ?></span>
            </div>
            <p class="lead"><?php echo $item["descrizione"]; ?></p>
            <div class="d-flex">
                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem">
                <button class="btn " type="button">
                    <i class="bi-cart-fill me-1"></i>
                    Add to cart
                </button>
            </div>
        </div>
    </div>
</div>