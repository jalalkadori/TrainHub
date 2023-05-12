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
      <div class="row">
        <div class="col">
          <h2 class="">Vous trouverez vos sessions attribuées avec la liste de tous les étudiants inscrits.</h2>
        </div>
      </div>
      <hr class="border border-danger border-2 opacity-50">
    </section>
    <?php
        // session asigned list 
        $formateurSessionsListQuery = "SELECT F.NOM_FORMATEUR, S.*, FO.SUJET_FORMATION FROM `formateur` F
        JOIN session S on F.ID_FORMATEUR = S.ID_FORMATEUR
        JOIN formation FO ON FO.ID_FORMATION = S.ID_FORMATION
        WHERE F.ID_FORMATEUR = '$idFormateur'";
        $formateurSessionsList = $db_connection->prepare($formateurSessionsListQuery);
        $formateurSessionsList->execute();


        // $formateurSessionsList->closeCursor();
     
        
    ?>

    <section class="container my-5">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Formation content</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $counter = 0;
                while($row = $formateurSessionsList->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['ID_SESSION'];
                    $counter++;
                echo '
                    <tr>
                        <th scope="row" class="col-1 text-center">'.$row['ID_SESSION'].'</th>
                        <td class="col-11">
                            <div class="accordion accordion-flush" id="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header fw-bold">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$counter.'" aria-expanded="false" aria-controls="flush-collapse'.$counter.'">
                                            <div class="row d-flex justify-centent-between w-100">
                                                <div class="col">Sujet : '.$row['SUJET_FORMATION'].'</div>
                                                <div class="col">Date de Debut : '.$row['DATE_DEBUT_SESSION'].'</div>
                                                <div class="col">Date de Fin : '.$row['DATE_FIN_SESSION'].'</div>
                                            </div>
                                        </button>
                                    </h2>
                                <div id="flush-collapse'.$counter.'" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <h4>List des Apprenant inscrits :</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID Inscription</th>
                                                    <th scope="col">ID Apprenant</th>
                                                    <th scope="col">Nom et Prénom</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Validation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>Oui</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                ';}

                   // student list for every session
                $studentListQuery = "SELECT F.NOM_FORMATEUR, S.*, I.*, A.NOM_APPRENANT FROM `formateur` F
                JOIN session S on F.ID_FORMATEUR = S.ID_FORMATEUR
                JOIN inscription I ON I.ID_SESSION = S.ID_FORMATION
                JOIN apprenant A ON A.ID_APPRENANT = I.ID_APPRENANT
                WHERE F.ID_FORMATEUR = '$idFormateur' AND S.ID_SESSION = 1";
                $studentList = $db_connection->prepare($studentListQuery);
                $studentList->execute();

                    
                function generateHTMLFromArray($array) {
                    $html = '';
                    
                        while ($row = $array->fetch(PDO::FETCH_ASSOC)) {
                            $html .= '<tr>';
                            $html .= '<th scope="row">' . $row['id'] . '</th>';
                            $html .= '<td>' . $row['name'] . '</td>';
                            $html .= '<td>' . $row['surname'] . '</td>';
                            $html .= '<td>' . $row['email'] . '</td>';
                            $html .= '<td>' . $row['status'] . '</td>';
                            $html .= '</tr>';
                        }
                    
                    return $html;
                }
                
                
            ?>
            </tbody>
        </table>
    </section>
    
    


    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html> 