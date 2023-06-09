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
                          '. $_SESSION['formateurFullName'] .'
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
      <div class="row ">
        <div class="col text-center">
          <img src="./images/vectors/session.jpg" alt="" srcset="" class="img-fluid w-50">
          <h2 class="my-3">Vous trouverez vos sessions attribuées avec la liste de tous les étudiants inscrits.</h2>
        </div>
      </div>
      <hr class="border border-danger border-2 opacity-50">
    </section>
    <?php
      // Session assigned list
      $formateurSessionsListQuery = "SELECT F.NOM_FORMATEUR, S.*, FO.SUJET_FORMATION FROM `formateur` F
      JOIN session S on F.ID_FORMATEUR = S.ID_FORMATEUR
      JOIN formation FO ON FO.ID_FORMATION = S.ID_FORMATION
      WHERE F.ID_FORMATEUR = '$idFormateur' ORDER BY S.DATE_FIN_SESSION DESC";
      $formateurSessionsList = $db_connection->prepare($formateurSessionsListQuery);
      $formateurSessionsList->execute();
        

        // Check if a success message and inscription ID exist in the query parameters
        if (isset($_GET['message']) && isset($_GET['inscriptionId'])) {
          $id_inscription = $_GET['inscriptionId'];
          $message = $_GET['message'];

          $ApprenantSessionValidationQuery = "SELECT * FROM `inscription` I
          JOIN apprenant A ON A.ID_APPRENANT = I.ID_APPRENANT
          JOIN Session S ON S.ID_SESSION = I.ID_SESSION
          JOIN formation F ON F.ID_FORMATION = S.ID_FORMATION
          WHERE I.ID_INSCRIPTION = '$id_inscription'";
          $ApprenantSessionValidation = $db_connection->prepare($ApprenantSessionValidationQuery);
          $ApprenantSessionValidation->execute();
          $validatedSession = $ApprenantSessionValidation->fetch(PDO::FETCH_ASSOC);
            if($message === "oui") {
              echo "<div class='alert alert-success'>";
              echo "<ul>";
              echo "<li>Parfait !</li>";
              echo "<li>L'apprenant " . $validatedSession['NOM_APPRENANT'] . " a bien validé la session " . $validatedSession['SUJET_FORMATION'] . "</li>";
              echo "</ul>";
              echo "</div>";
            } else {
              echo "<div class='alert alert-danger'>";
              echo "<ul>";
              echo "<li>Malheureusement !</li>";
              echo "<li>L'apprenant : " . $validatedSession['NOM_APPRENANT'] . " n'a pas validé la session : 
              " . $validatedSession['SUJET_FORMATION'] . " terminée le " . $validatedSession['DATE_FIN_SESSION'] . "</li>";
              echo "</ul>";
              echo "</div>";
            }

          
        }
    ?>

    <section class="container my-5">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Détailles de Session</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $counter = 0;
                $idSessions = array(); // Store session IDs in an array
                
                
                while ($row = $formateurSessionsList->fetch(PDO::FETCH_ASSOC)) {
                    $idSession = $row['ID_SESSION'];
                    array_push($idSessions, $idSession); // Add the session ID to the array
                    $counter++;
                ?>
                    <tr>
                        <th scope="row" class="col-1 text-center"><?= $row['ID_SESSION'] ?></th>
                        <td class="col-11">
                            <div class="accordion accordion-flush" id="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header fw-bold">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse<?= $counter ?>" aria-expanded="false"
                                            aria-controls="flush-collapse<?= $counter ?>">
                                            <div class="row d-flex justify-centent-between w-100">
                                                <div class="col">Sujet : <?= $row['SUJET_FORMATION'] ?></div>
                                                <div class="col">Date de Debut : <?= $row['DATE_DEBUT_SESSION'] ?></div>
                                                <div class="col">Date de Fin : <?= $row['DATE_FIN_SESSION'] ?></div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse<?= $counter ?>" class="accordion-collapse collapse"
                                        data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            <h4>List des Apprenant inscrits :</h4>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID Inscription</th>
                                                        <th scope="col">ID Apprenant</th>
                                                        <th scope="col">Nom et Prénom</th>
                                                        <th scope="col">Validation</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                          date_default_timezone_set('GMT');
                                                          $today = date('Y-m-d'); 
                                                          echo $today;                                              
                                                          // Student list for the current session
                                                          $idSessionsString = implode(",", $idSessions); // convert the array to a string to use it inside the query 
                                                          $studentListQuery = "SELECT * FROM inscription
                                                          JOIN session ON session.ID_SESSION = inscription.ID_SESSION
                                                          JOIN apprenant ON apprenant.ID_APPRENANT = inscription.ID_APPRENANT
                                                          WHERE session.ID_SESSION = $idSessionsString";
                                                          $studentList = $db_connection->prepare($studentListQuery);
                                                          $studentList->execute();
                              
                                                        while ($studentRow = $studentList->fetch(PDO::FETCH_ASSOC)) {
                                                          $idInscription = $studentRow['ID_INSCRIPTION'];
                
                                                    ?>
                                                            <tr>
                                                                <td><?= $studentRow['ID_INSCRIPTION'] ?></td>
                                                                <td><?= $studentRow['ID_APPRENANT'] ?></td>
                                                                <td><?= $studentRow['NOM_APPRENANT'] ?></td>
                                                                <?php 

                                                                      if(($studentRow['DATE_FIN_SESSION'] < $today) && $studentRow['VALIDATION'] === null) {
                                                                          echo 
                                                                          '<td>
                                                                           <form action="session-validation.php" method="POST">
                                                                            <div class="d-flex justify-content-end gap-3">
                                                                              <input type="hidden" value=" ' . $idInscription .' " name="idInscription">
                                                                              <input type="text" class="form-control" placeholder="Oui / Non" name="validation" required>
                                                                              <button type="submit" class="btn btn-danger" name="valider">Confirmer</button>
                                                                            </div>
                                                                              
                                                                           </form>
                                                                          </td>';
                                                                          
                                                                          
                                                                      }
                                                                      elseif($studentRow['VALIDATION'] === null){
                                                                        echo '<td>Bientot en fin de la formation</td>';
                                                                      } else {
                                                                        echo '<td> '.$studentRow['VALIDATION'].'</td>';
                                                                      }
                                                                ?>
                                                              
                                                            </tr>
                                                    <?php
                                                        
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                  $removedElement = array_shift($idSessions); // Remove the first element of the array
                }
                ?>
            </tbody>
        </table>
    </section>
    
    


    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html> 