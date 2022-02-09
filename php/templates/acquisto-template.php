<div class="container mt-5">
  <div class="bg-light ">
    <h3 class="ps-3">Il mio Ordine</h3>
    <form action="ordine.php" method="POST">


      <div class="card m-3 p-2">
        <h5 class="mb-1 ">Indirizzo di Consegna</h5>
          <div class="form-floating m-2">
            <input type="text" class="form-control" id="floatingInput" required name="nome" placeholder="mariorossi@gmail.com" >
            <label for="floatingInput">Nome e cognome</label>
          </div>
          <div class="form-floating m-2">
            <input type="text" class="form-control" id="floatingInput" required name="citta" placeholder="Cesena">
            <label for="floatingInput">Città</label>
          </div>
          <div class="form-floating m-2">
            <input type="text" class="form-control" id="floatingInput" required name="via" placeholder="Via vulcano 10">
            <label for="floatingInput">Via</label>
          </div>
      </div>


      <div class="card m-3 p-2">
        <h5 class="mb-1">Modalità di pagamento</h5>

          <div class="form-floating m-2">
            <input type="text" class="form-control" id="floatingInput" placeholder="carta" required name="carta" >
            <label for="floatingInput">Inserire la carta</label>
          </div>
      </div>

      <div class="card m-3 p-2">
        <input type="submit" class="btn btn-primary"  required value="Acquista ora">
      </div>

    </form>
  </div>
</div>