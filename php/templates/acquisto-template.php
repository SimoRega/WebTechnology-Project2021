<div class="container mt-5">
  <div class="bg-light ">
    <p class="ps-3 fs-3">Il mio Ordine</p>
    <form action="ordine.php" method="POST">


      <div class="card m-3 p-2">
        <h5 class="mb-1 ">Indirizzo di Consegna</h5>
          <div class="form-floating m-2">
            <input type="text" class="form-control" id="nome" required  name="nome" placeholder="Mario Rossi"/>
            <label for="nome"> Nome e cognome</label>

          </div>
          <div class="form-floating m-2">
            <input type="text" class="form-control" id="city" required name="citta" placeholder="Cesena">
            <label for="city">Città</label>
          </div>
          <div class="row">
            <div class="col-8">

              <div class="form-floating m-2">
                <input type="text" class="form-control" id="via" required name="via" placeholder="Via vulcano 10">
                <label for="via">Via</label>
              </div>
            </div>
            <div class="col-4">

              <div class="form-floating m-2">
                <input type="text" class="form-control" id="cap" required name="cap" placeholder="Via vulcano 10">
                <label for="cap">Cap</label>
              </div>
            </div>
          </div>
      </div>


      <div class="card m-3 p-2">
        <h5 class="mb-1">Modalità di pagamento</h5>

          <div class="form-floating m-2">
            <input type="text" class="form-control" id="floatingInput" placeholder="carta" required name="carta" >
            <label for="floatingInput">Inserire la carta</label>
          </div>

          <div class="row">
            <div class="col">

              <div class="form-floating m-2">
                <input type="text" class="form-control" id="scadenza" required name="scadenza" placeholder="02/22">
                <label for="scadenza">Scadenza</label>
              </div>
            </div>
            <div class="col">

              <div class="form-floating m-2">
                <input type="text" class="form-control" id="pin" required name="pin" placeholder="555">
                <label for="pin">Pin</label>
              </div>
            </div>
          </div>

      </div>

      <div class="card m-3 p-2">
        <input type="submit" class="btn btn-primary"  value="Acquista ora">
      </div>

    </form>


  </div>
</div>


