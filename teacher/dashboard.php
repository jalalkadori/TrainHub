<?php 
include("./db_connection.php");
include("./session_config.php");

$idFormateur = $_SESSION['id_formateur'];
?>
<style>
/* adding an animation to the cards on dashboard page */
.card {
    transition: transform 0.1s;
    }
  .card:hover {
    transform: scale(1.05);
    transition-delay: 0.1s; /* Adjust the delay value as needed */
  }
  .text-shadow {
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    .card-link {
  text-decoration: none;
        }

</style>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trainhub | Formateur Dashboard</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/75c6b1327b.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <header class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="./dashboard.php">
            <img src="icons/logo.png" alt="Logo" width="200">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.php"></a>
              </li>
             
            </ul>
            <div class="d-flex">
            <?php
                  // Vérifier si l'utilisateur est connecté
                  // Afficher les éléments du menu appropriés en fonction de la variable $connected
                  if (isset($_SESSION['emailFormateur'])) {
                      echo '
                      <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle text-uppercase" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </button>   
                        <ul class="dropdown-menu">
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

    <section class="container my-5">
      <div class="row">
        <div class="col d-flex flex-column justify-content-center align-items-start">
          <h1 class="slide-title">Bienvenue MR. <?php echo $_SESSION['formateurFullName'] ?> <br> sur votre compte</h1>
        </div>
      </div>
      <hr class="border border-danger border-2 opacity-50">
    </section>
    
    <section class="container my-5">
        <div class="row text-center row-cols-1 row-cols-sm-2 row-cols-lg-4">
            <?php
                // Array of card data
                $cards = [
                    [
                        'title' => 'Mes Sessions',
                        'image' => './images/vectors/sessions.jpg',
                        'link' => './sessions.php'
                    ],
                    [
                        'title' => 'Formations',
                        'image' => './images/vectors/formation.jpg',
                        'link' => './formations.php'
                    ],
                    [
                        'title' => 'Apprenants',
                        'image' => './images/vectors/students-list.jpg',
                        'link' => './sessions.php'
                    ],
                    [
                        'title' => 'Validation',
                        'image' => './images/vectors/validation.jpg',
                        'link' => './sessions.php'
                    ]
                ];

                // Loop through the card data and generate the HTML dynamically
                foreach ($cards as $card) {
                    echo '<div class="col my-3 d-flex justify-content-center">';
                    echo '<a href="' . $card['link'] . '" class="card-link">';
                    echo '<div class="card text-dark animate__animated animate__fadeIn" style="width: 18rem;">';
                    echo '<h2 class="card-title text-uppercase fw-bold">' . $card['title'] . '</h2>';
                    echo '<img src="' . $card['image'] . '" class="card-img" alt="Background Image">';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            ?>
        </div>
    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html> 