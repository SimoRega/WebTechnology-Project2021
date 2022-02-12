<!doctype html>
<html lang="it">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <!-- Custom CSS -->
      <link href="../css/style.css" rel="stylesheet" type="text/css" >
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
      <title><?php echo $templateParams["title"]?></title>
   </head>
   <body>
      <header>
         <nav class="navbar navbar-expand-lg navbar-dark" id="myNav">
            <div class="container-fluid navigation">
               <div class="d-flex flex-wrap align-items-center justify-content-around">
                  <a href="./index.php" class="navbar-brand">
                  <img src="../res/icon.png" alt="logo">
                  </a>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav  d-flex flex-wrap align-items-center justify-content-evenly">
                        <li class="nav-item"><a class="nav-link fw-bold" href="./index.php">HOME</a></li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle fw-bold" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">SHOP</a>
                           <ul class="dropdown-menu mx-0 border-0 shadow" style="width: 220px;" >
                              <li><a class="dropdown-item " href="./shop.php?tipo=accessori">SHOP ACCESSORI</a></li>
                              <li><a class="dropdown-item" href="./shop.php?tipo=camper">SHOP CAMPER</a></li>
                           </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link fw-bold" href="carrello.php">CARRELLO</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold" href="chisiamo.php">CHI SIAMO</a></li>
                     </ul>
                  </div>
                  <div class="text-end row" >
                     <div class="dropdown col">
                        <a class=" btn btn-outline-danger me-2 fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">LOGIN</a>
                        <ul class="dropdown-menu shadow">
                           <li>
                              <a class="dropdown-item d-flex gap-2 align-items-center" href="account.php">
                              PROFILO
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item d-flex gap-2 align-items-center" href="login.php">
                              LOGIN
                              </a>
                           </li>
                        </ul>
                     </div>
                     <button class="navbar-toggler btn btn-outline-light col" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                  </div>
               </div>
            </div>
         </nav>
      </header>
      <main >
         <?php
            require($templateParams["template"]);
            ?>
      </main>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <script src="../js/script.js" ></script>
      <script src="../js/configuratore.js" ></script>
      <script src="../js/carrello.js" ></script>
   <div class="div" style="min-height:30px;">

   </div>
   <footer class="bg-dark fixed-bottom text-center text-lg-start ">
     <div class="text-center p-3" >
        <span>© 2020 Copyright: CamperRomagna</span>
     </div>
   </footer>
   </body>
</html>