<?php 
include("./db_connection.php");
// Start the session
session_start();


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trainhub | accueil</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="icons/logo.png" alt="Logo" width="200">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./formation.php">Formations</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
            <div class="d-flex">
                <?php
                  // Vérifier si l'utilisateur est connecté
                  // Afficher les éléments du menu appropriés en fonction de la variable $connected
                  if (isset($_SESSION['email'])) {
                      echo '
                      <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle text-uppercase" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          '. $_SESSION['full_name'] .'
                        </button>   
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="./profil.php">Mon Profil</a></li>
                          <li><a class="dropdown-item" href="#">Editer Mes Informations</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="logout.php">Se Deconnecter</a></li>
                        </ul>
                      </div>';
                  } else {
                      echo '<a href="login.php" class="btn btn-outline-danger me-2" type="button">Login</a>
                      <a class="btn btn-danger" type="button">Sign up</a>';
                  }
                ?>
              
            </div>
          </div>
        </div>
      </nav>
    </header>

    <section class="container my-5" id="slide">
      <div class="row">
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-start gap-5">
          <h1 class="slide-title">Apprendre sans <br> limites</h1>
          <p>Des cours interactifs de qualité avec des instructeurs expérimentés. Améliorez vos compétences et obtenez des certifications reconnues par l'industrie pour une carrière réussie.</p>
          <a href="./formation.php" class="btn-action" style="--c: #373B44;--b: 5px;--s:12px">Rejoignez Gratuitement</a>
        </div>
        <div class="col-md-6 py-5">
          <img src="icons/slide1.png" alt="Image" class="img-fluid">  
        </div>
      </div>
    </section>

    <section class="container my-5" id="collabortions">
      <h2 class="section-title text-center">Nos collaboratteurs</h2>
      <div class="row">
        <div class="col text-center">
          <img src="./images/collaborators/google.png" alt="google logo" width="150" srcset="">
        </div>
        <div class="col text-center">
          <img src="./images/collaborators/facebook.png" alt="google logo" width="100" srcset="">
        </div>
        <div class="col text-center">
          <img src="./images/collaborators/intel.png" alt="google logo" width="100" srcset="">
        </div>
        
      </div>
    </section>

    <section class="container my-5">
      <h2 class="section-title text-start">Lancez une nouvelle carrière en aussi peu que 6 mois</h2>
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Développeur web
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="card my-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="./images/jobs/developpeur-web.jpeg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Développeur web</h5>
                      <p class="card-text">Le développeur web crée des applications et des sites web, collabore avec des designers, assure la maintenance et l'amélioration des sites existants. Il/elle doit comprendre les besoins des clients, être créatif, curieux et résoudre des problèmes. Compétences: HTML, CSS, JavaScript, PHP, Python, Ruby.</p>
                      <a href="./formation.php" type="button" class="btn btn-danger">Explorer toutes les formations</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Développeur web
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="card my-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="./images/jobs/developpeur-web.jpeg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Développeur web</h5>
                      <p class="card-text">Le développeur web crée des applications et des sites web, collabore avec des designers, assure la maintenance et l'amélioration des sites existants. Il/elle doit comprendre les besoins des clients, être créatif, curieux et résoudre des problèmes. Compétences: HTML, CSS, JavaScript, PHP, Python, Ruby.</p>
                      <a href="./formation.php" type="button" class="btn btn-danger">Explorer toutes les formations</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              Développeur web
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="card my-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="./images/jobs/developpeur-web.jpeg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Développeur web</h5>
                      <p class="card-text">Le développeur web crée des applications et des sites web, collabore avec des designers, assure la maintenance et l'amélioration des sites existants. Il/elle doit comprendre les besoins des clients, être créatif, curieux et résoudre des problèmes. Compétences: HTML, CSS, JavaScript, PHP, Python, Ruby.</p>
                      <a href="./formation.php" type="button" class="btn btn-danger">Explorer toutes les formations</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>

    <section class="container my-5">
      
    </section>

    <section class="py-4 py-xl-5">
      <div class="container">
          <div class="text-white bg-dark border rounded border-0 border-light d-flex flex-column justify-content-between align-items-center flex-lg-row p-4 p-lg-5">
              <div class="text-center text-lg-start py-3 py-lg-1">
                  <h2 class="fw-bold mb-2"><strong>Subscribe to our newsletter</strong></h2>
                  <p class="mb-0">Imperdiet consectetur dolor.</p>
              </div>
              <form class="d-flex justify-content-center flex-wrap my-2" method="post">
                  <div class="my-2"><input class="form-control" type="email" name="email" placeholder="Your Email" /></div>
                  <div class="my-2"><button class="btn btn-primary ms-sm-2" type="submit">Subscribe</button></div>
              </form>
          </div>
      </div>
    </section>

 



      
    
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
  </body>
</html>