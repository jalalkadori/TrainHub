<?php 
include("./db_connection.php");
include("./session_config.php");

if (isset($_GET['id'])) {
  $id_formation = $_GET['id'];
  echo "$id_formation";
}
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
    <header class="sticky-top>
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
                  if (isset($_SESSION['email'])) {
                    // Afficher les éléments du menu appropriés
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

    <section class="container my-5">
      <h2>Sessions Programmées :</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date de debut</th>
            <th scope="col">Formateur affecté</th>
            <th scope="col">Nombre d'inscrits</th>
            <th scope="col">Places disponibles</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // recuperation des session de formation programmées avec les nom de formateur asigné
              $session_list_request = "SELECT *, NOM_FORMATEUR, (SELECT COUNT(ID_INSCRIPTION) FROM `INSCRIPTION` where session.ID_SESSION = inscription.ID_SESSION) AS nombre_inscrits FROM `session` 
              JOIN formateur ON session.ID_FORMATEUR = formateur.ID_FORMATEUR
              WHERE session.ID_FORMATION = '$id_formation' AND session.DATE_DEBUT_SESSION > NOW() GROUP BY session.ID_SESSION";
              
              $session_list = $db_connection->prepare($session_list_request);
              $session_list->execute();

              // affichage des session programmées avec tt les information sur un table HTML
              $number = 0;    
              while($row = $session_list->fetch(PDO::FETCH_ASSOC)) {
                $number++;
                echo'
                  <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$row['DATE_DEBUT_SESSION'].'</td>
                      <td>'.$row['NOM_FORMATEUR'].'</td>
                      <td>'.$row['nombre_inscrits'].'</td>
                      <td>'.($row['NOMBRE_PLACES_SESSION'] - $row['nombre_inscrits']).'</td>
                      <td><button type="button" class="btn btn-danger">Rejoindre</button></td>
                  </tr>
                ';  
              }

          ?>    
               
        </tbody>
      </table>
    </section>



    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html>