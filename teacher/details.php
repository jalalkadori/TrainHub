<?php 
include("./db_connection.php");
include("./session_config.php");

$idFormateur = $_SESSION['id_formateur'];
if (isset($_GET['id'])) {
    $id_formation = $_GET['id'];
}
?>
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

    <?php
      $formation_list_request = "SELECT * FROM `formation` WHERE formation.ID_FORMATION = '$id_formation'";
      $formation_list = $db_connection->prepare($formation_list_request);
      $formation_list->execute();
      
      $row = $formation_list->fetch(PDO::FETCH_ASSOC);

      
    ?>

    <section class="container my-5" >
      <h1><?php echo "$row[SUJET_FORMATION]" ?></h1>
      <p> Categorie de formation : <?php echo "$row[CATEGORIE_FORMATION]" ?>.</p>
      <p> Horraire de formation : <?php echo "$row[HORRAIRE_FORMATION]" ?> H.</p>
      <p> Description de formation : <?php echo "$row[DESCRIPTIVE_FORMATION]" ?></p>
    </section>  

    
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html> 