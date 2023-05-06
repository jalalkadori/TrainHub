<?php 
include("./db_connection.php");
include("./session_config.php");
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
      <?php 
        $formation_categorie_query = "SELECT ID_FORMATION, CATEGORIE_FORMATION FROM `formation` GROUP BY CATEGORIE_FORMATION";
        $formation_categorie = $db_connection->prepare($formation_categorie_query);
        $formation_categorie->execute();
      ?>            


    <section class="container my-5" id="filter">
      <h2 class="section-title">Trouvé une formation</h2>
      <form class="row my-5" method="post">
        <div class="col-sm-4">
          <label for="title" class="form-label">Sujet de Formations :</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="col-sm-4">
          <label for="categorie" class="form-label">Categorie de Formation :</label>
          <select class="form-select" name="categorie">
            <option></option>
            <?php     
              while($row = $formation_categorie->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="'.$row['CATEGORIE_FORMATION'].'">'.$row['CATEGORIE_FORMATION'].'</option>';
              }
            ?> 
          </select>
        </div>
        <div class="col-sm-4 d-flex align-items-end">
          <button type="submit" class="btn btn-primary w-100" name="chercher">Chercher</button>
        </div>
      </form>
    </section>
      <?php 
        $formation_list_request = "SELECT * FROM `formation` WHERE formation.ID_FORMATION > 0 ";

        if(isset($_POST['chercher'])) {
          $title = $_POST["title"];
          $categorie_formation = $_POST["categorie"];

          if(!empty($title)) {
              $formation_list_request.=" AND formation.SUJET_FORMATION LIKE '%$title%'";
          } 
          if(!empty($categorie_formation)) {
              $formation_list_request.=" AND formation.CATEGORIE_FORMATION LIKE '$categorie_formation'";
          }
       
        } 


      ?>               
    <section class="container my-5" id="formation-list">
      <div class="row">
        <?php 
          $formation_list = $db_connection->prepare($formation_list_request);
          $formation_list->execute();       
          while($row = $formation_list->fetch(PDO::FETCH_ASSOC)) {
            echo'
            <div class="col-sm-6 col-md-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">'.$row['SUJET_FORMATION'].'</h5>
                  <p class="card-text text-botd">'.$row['HORRAIRE_FORMATION'].' H</p>
                  <p class="card-text">'.$row['CATEGORIE_FORMATION'].'</p>
                  <a href="details.php?id='.$row['ID_FORMATION'].'" class="btn btn-danger">Plus de détailes</a>
                </div>
              </div>
            </div>';
          }

        ?>    
      </div>
    </section>
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html>