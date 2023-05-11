<?php 
include("./db_connection.php");
include("./session_config.php");

$id_apprenant = $_SESSION['id_apprenant'];
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
    <header class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
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

    <section class="container my-5">
      <div class="row">
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-start gap-5">
          <h1 class="slide-title">Bienvenue sur votre compte</h1>
        </div>
      </div>
    </section>


    <section class="container my-5">
      <h2>Mes informations personnelles :</h2>
      <hr class="border border-danger border-2 opacity-50">

      <table class="table table-success table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Nom Complet</th>
            <th scope="col">Adresse Email</th>
            <th scope="col">Numero de téléphone</th>
            <th scope="col">Mot de pass</th>
            <th scope="col">Mettre à jour Mes infos</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <?php
                $sql = "SELECT * FROM `apprenant` WHERE ID_APPRENANT = '$id_apprenant'";
                $stms = $db_connection->prepare($sql);
                $stms->execute();
                $row = $stms->fetch(PDO::FETCH_ASSOC);
              ?>
            <td><?php echo $row['NOM_APPRENANT']?></td>
            <td><?php echo $row['EMAIL_APPRENANT']?></td>
            <td>0<?php echo $row['TELE_APPRENANT']?></td>
            <td><?php echo $row['MDP_APPRENANT']?></td>
            <td><button class="btn btn-danger">Modifier</button></td>
          </tr>
        </tbody>
      </table>

    </section>

    <section class="container my-5">
      <h2>Mes Inscriptions : </h2>
      <hr class="border border-danger border-2 opacity-50">

      <h4 class="text-center my-3">Formations à venir</h4>
      <table class="table table-success table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Sujet de Formation</th>
            <th scope="col">Formateur</th>
            <th scope="col">Date de debut</th>
            <th scope="col">Date de Fin</th>
          </tr>
        </thead>
        <tbody>
          
              <?php
                $sql = "SELECT *, f.SUJET_FORMATION, fo.NOM_FORMATEUR FROM inscription i
                JOIN session s on s.ID_SESSION = i.ID_SESSION
                JOIN formation f on f.ID_FORMATION = S.ID_FORMATION
                JOIN formateur fo on fo.ID_FORMATEUR = S.ID_FORMATEUR
                WHERE ID_APPRENANT = '$id_apprenant' AND s.DATE_DEBUT_SESSION > NOW()";
                $stms = $db_connection->prepare($sql);
                $stms->execute();

                while($row = $stms->fetch(PDO::FETCH_ASSOC)) {
                  echo "
                    <tr>
                      <td>".$row['SUJET_FORMATION']."</td>
                      <td>".$row['NOM_FORMATEUR']."</td>
                      <td>".$row['DATE_DEBUT_SESSION']."</td>
                      <td>".$row['DATE_FIN_SESSION']."</td>
                    </tr>
                  ";
                }
              ?>
          
        </tbody>
      </table>

      <h4 class="text-center my-3">Formations en cours</h4>
      <table class="table table-success table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Sujet de Formation</th>
            <th scope="col">Formateur</th>
            <th scope="col">Date de debut</th>
            <th scope="col">Date de Fin</th>
          </tr>
        </thead>
        <tbody>
          
              <?php
                $sql = "SELECT *, f.SUJET_FORMATION, fo.NOM_FORMATEUR FROM inscription i JOIN session s on s.ID_SESSION = i.ID_SESSION JOIN formation f on f.ID_FORMATION = S.ID_FORMATION JOIN formateur fo on fo.ID_FORMATEUR = S.ID_FORMATEUR WHERE ID_APPRENANT = '$id_apprenant' AND s.DATE_FIN_SESSION > NOW() AND s.DATE_DEBUT_SESSION < NOW()";
                $stms = $db_connection->prepare($sql);
                $stms->execute();

                while($row = $stms->fetch(PDO::FETCH_ASSOC)) {
                  echo "
                    <tr>
                      <td>".$row['SUJET_FORMATION']."</td>
                      <td>".$row['NOM_FORMATEUR']."</td>
                      <td>".$row['DATE_DEBUT_SESSION']."</td>
                      <td>".$row['DATE_FIN_SESSION']."</td>
                    </tr>
                  ";
                }
              ?>
          
        </tbody>
      </table>


      <h4 class="text-center my-3">Historique des formations passées</h4>
      <table class="table table-success table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Sujet de Formation</th>
            <th scope="col">Formateur</th>
            <th scope="col">Date de debut</th>
            <th scope="col">Date de Fin</th>
            <th scope="col">Validation</th>
          </tr>
        </thead>
        <tbody>
          
              <?php
                $sql = "SELECT *, f.SUJET_FORMATION, fo.NOM_FORMATEUR FROM inscription i JOIN session s on s.ID_SESSION = i.ID_SESSION JOIN formation f on f.ID_FORMATION = S.ID_FORMATION JOIN formateur fo on fo.ID_FORMATEUR = S.ID_FORMATEUR WHERE ID_APPRENANT = '$id_apprenant' AND s.DATE_FIN_SESSION < NOW()";
                $stms = $db_connection->prepare($sql);
                $stms->execute();

                while($row = $stms->fetch(PDO::FETCH_ASSOC)) {
                  echo "
                    <tr>
                      <td>".$row['SUJET_FORMATION']."</td>
                      <td>".$row['NOM_FORMATEUR']."</td>
                      <td>".$row['DATE_DEBUT_SESSION']."</td>
                      <td>".$row['DATE_FIN_SESSION']."</td>
                      <td>".$row['VALIDATION']."</td>
                    </tr>
                  ";
                }
              ?>
          
        </tbody>
      </table>

                
    </section>

  
     
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html> 