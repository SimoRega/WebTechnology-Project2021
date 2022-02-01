<div class="container">
    <div class="row">
        <div class="col-lg-2">


            <div class="row">
                <div class="col-lg-12 col-md-6  filter " >
                    <form action="shop.php" style="color:white" method="POST">
                        <input type="checkbox" id="disponibile" name="disponibile" value="IsDisponibile">
                        <label for="disponibile"> Solo disponibili</label><br><br>

                        <label for="minPrice">Prezzo minimo</label>
                        <input type="range" name="min" id="rangeMin" value="0" min="0" max="1000" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>

                        <label for="minPrice">Prezzo massimo</label>
                        <input type="range" name="max" id="rangeMax" value="1000" min="0" max="1000" oninput="this.nextElementSibling.value = this.value">
                        <output>1000</output>

                        <input type="submit"  value="Applica filtri">


                    </form>
                </div>
            </div>



        </div>
        <div class="col-lg-10">
            <div class="row">
                <?php 
                    if(isset($_POST["min"]) && isset($_POST["max"])){
                        $templateParams["accessori"] = $dbh->getAccessoriWithParam(true,$_POST["min"],$_POST["max"]);
                    }
                
                ?>
                <?php foreach($templateParams["accessori"] as $accessorio): ?>


                    <div class="col-lg-4 col-md-6 ">
                        <div class="single-product prod">
                        <a href="item.php?id=<?php echo $accessorio["idAccessorio"]; ?>">
                            <img class="img-fluid " src="<?php echo UPLOAD_DIR.$accessorio["img"]; ?>" alt="">
                        </a>
                            <div class="product-details">
                                <h5 class="fw-bold"><?php echo $accessorio["nome"]; ?></h5>

                                <div class="price">
                                    <h5 class="fw-bold"><?php echo $accessorio["prezzo"]; ?>€</h5>
                                </div>

                                <a href="#" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                                    aria-disabled="true">Compra</a>


                            </div>
                        </div>
                    </div>

                <?php endforeach; ?> 

            </div>
        </div>
    </div>
</div>  

<script>
    $(document).ready(function(){ 
        $('#range').val(0); 

        /** mousemove */ 
        $('#range').mousemove(function(){ 
            $('#valBox').html($(this).val()); 
    }); 
    /** mousemove */ });


</script>
