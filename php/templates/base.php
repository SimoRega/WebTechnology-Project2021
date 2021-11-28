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

    <title><?php echo $templateParams["title"]; ?></title>
  </head>
  <body>
    <header>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-transparent">   
        
        <div class="container-fluid">     
          <a class="navbar-brand" href="index.html">
            <img src="../res/logo2.png" alt="romagnacamper logo">
          </a>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="d-flex justify-content-around">

              <div class="dropdown">
                <a class=" navbar-brand nav_link btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  MODELLI
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">VISUALIZZA TIPOLOGIE</a></li>
                  <li><a class="dropdown-item" href="#">VISUALIZZA MARCHE</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">VISUALIZZA TUTTI I CAMPER</a></li>
                </ul>
              </div>
              <div class="dropdown">
                <a class=" navbar-brand nav_link btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  NEGOZIO
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">FRIGO VIAGGIO</a></li>
                  <li><a class="dropdown-item" href="#">TENDE CAMPER</a></li>
                  <li><a class="dropdown-item" href="#">KIT CAMPEGGIO</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">VISUALIZZA TUTTI I PRODOTTI</a></li>
                </ul>
              </div>
              <a class="navbar-brand nav_link" href="../html/chisiamo.html">CHI SIAMO</a>
              <!-- Con il login ma da vedere con PHP
              <div class="dropdown d-flex justify-content-center  ">
                <a href="" class=" navbar-brand nav_login btn">    
                  <span>LOGIN</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-right " viewBox="2 2 20 15">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>
                </a>
                <a class=" navbar-brand nav_login btn dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  PROFILO
                </a>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">I TUOI ORDINI</a></li>
                  <li><a class="dropdown-item" href="#">CARRELLO</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">VISUALIZZA IL TUO PROFILO</a></li>
                </ul>
              </div>
            -->
              <a class=" navbar-brand nav_login btn dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                PROFILO
              </a>
              <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">I TUOI ORDINI</a></li>
                <li><a class="dropdown-item" href="#">CARRELLO</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">VISUALIZZA IL TUO PROFILO</a></li>
              </ul>
            </div>
          </div>   
        </div>  

        <!-- OffCanvas-->
        <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
          <div class="offcanvas-header" style="width: 100%; height: 100%;">
              <div class="accordion accordion-flush d-flex  justify-content-evenly flex-column m-auto" id="accordionFlushExample" style="width: 100%; height: 100%;">

                <a class="navbar-brand nav_link rounded-3 bg-secondary bg-opacity-75 w-100 my-1 btn" href="#">HOME</a>

                <a class="rounded-3  bg-secondary bg-opacity-75 w-100 navbar-brand nav_login dropdown-toggle my-1" href="#" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseModelli" aria-expanded="false" aria-controls="flush-collapseOne">
                  MODELLI
                </a>
                <div id="flush-collapseModelli" class="accordion-collapse collapse my-1 " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <ul class="list-unstyled">
                    <li>
                      <a class="navbar-brand nav_link rounded-3" href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">VISUALIZZA TIPOLOGIE</span>
                      </a>
                    </li>
                    <li>
                      <a class="navbar-brand nav_link rounded-3" href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">VISUALIZZA MARCHE</span>
                      </a>
                    </li>
                    <li>
                      <a class="navbar-brand nav_link rounded-3 " href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">VISUALIZZA TUTTI I CAMPER</span>
                      </a>
                    </li>
                  </ul>             
                </div>

                <a class="rounded-3  bg-secondary bg-opacity-75 w-100 navbar-brand nav_login dropdown-toggle my-1" href="#" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNegozio" aria-expanded="false" aria-controls="flush-collapseNegozio">
                  NEGOZIO
                </a>
                <div id="flush-collapseNegozio" class="accordion-collapse collapse my-1 " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <ul class="list-unstyled">
                    <li>
                      <a class="navbar-brand nav_link rounded-3" href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">OFFERTE</span>
                      </a>
                    </li>
                    <li>
                      <a class="navbar-brand nav_link rounded-3" href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">HOT SALES</span>
                      </a>
                    </li>
                    <li>
                      <a class="navbar-brand nav_link rounded-3" href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">KIT CAMPEGGIO</span>
                      </a>
                    </li>
                    <li>
                      <a class="navbar-brand nav_link rounded-3 " href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">VISUALIZZA TUTTI I PRODOTTI</span>
                      </a>
                    </li>
                  </ul>             
                </div>

                <a class="navbar-brand nav_link rounded-3 bg-secondary bg-opacity-75 w-100 my-1 btn" href="#">CHI SIAMO</a>

                <a class="rounded-3  bg-secondary bg-opacity-75 w-100 navbar-brand nav_login dropdown-toggle my-1" href="#" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseProfilo" aria-expanded="false" aria-controls="flush-collapseProfilo">
                  PROFILO
                </a>
                <div id="flush-collapseProfilo" class="accordion-collapse collapse my-1 " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <ul class="list-unstyled">
                    <li>
                      <a class="navbar-brand nav_link rounded-3" href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">CARRELLO</span>
                      </a>
                    </li>
                    <li>
                      <a class="navbar-brand nav_link rounded-3" href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">VISUALIZZA IL TUO PROFILO</span>
                      </a>
                    </li>
                    <li>
                      <a class="navbar-brand nav_link rounded-3" href="#" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        <span class="text-start badge text-wrap">I TUOI ORDINI</span>
                      </a>
                    </li>                    
                  </ul>             
                </div>

                <a class="navbar-brand nav_link rounded-3 bg-danger bg-opacity-75 w-100 my-1 btn mt-auto" href="#">LOGIN</a>
            </div>
          </div>
      </nav>
    </header>
    <main>
        <?php require($templateParams["template"]); ?>
    </main>
    <footer >
      <div class="container py-4 border-top">
        <div class="row">
          <div class="col-2">
            <h5 class="text-white">Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">About</a></li>
            </ul>
          </div>
    
          <div class="col-2">
            <h5 class="text-white">Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">About</a></li>
            </ul>
          </div>
    
          <div class="col-5 offset-1">
            <form>
              <h5 class="text-white">Subscribe to our newsletter</h5>
              <p class="text-white-50">Monthly digest of whats new and exciting from us.</p>
              <div class="d-flex w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-primary" type="button">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
    
        <div class="d-flex justify-content-between py-4 my-4 border-top">
          <p class="text-white">&copy; 2021 Company, Inc. All rights reserved.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-dark text-white" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="link-dark text-white" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="link-dark text-white" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
          </ul>
        </div>
      </div>
    </footer>

    <!-- SVG -->
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16" id="arrow-return-right">
      <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
    </svg>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
  </body>
</html>