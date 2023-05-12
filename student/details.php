<?php 
include("./db_connection.php");
include("./session_config.php");

if (isset($_GET['id'])) {
  $id_formation = $_GET['id'];
}
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

              // Display a disabled button in case of there no more places 
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
                      <td>
                        <form method="post">
                          <input type="hidden" value="'.$row['ID_SESSION'].'" name="idSession">
                          <button class="btn btn-danger '.($row['NOMBRE_PLACES_SESSION'] == $row['nombre_inscrits'] ? 'disabled' : '').'" name="rejoindre">Rejoindre</button>
                        </form>
                      </td>
                  </tr>
                ';  
              }

              if(isset($_POST['rejoindre'])) {
                $id_session = $_POST['idSession']; // selected session
                  // number of actif sessions in the current year
                  $session_number_request = "SELECT COUNT(*) FROM `inscription` I
                  JOIN session S on S.ID_SESSION = I.ID_SESSION
                  WHERE YEAR(S.DATE_FIN_SESSION) = YEAR(CURDATE()) AND I.ID_APPRENANT = $id_apprenant";
                  $session_number = $db_connection->prepare($session_number_request);
                  $session_number->execute();

                  $session_count = $session_number->fetchColumn();

                  // overlaped sessions 
                  $overlaped_session_request = "SELECT * FROM `SESSION` S 
                  JOIN inscription I ON I.ID_SESSION = S.ID_SESSION
                  WHERE I.ID_APPRENANT = '$id_apprenant' AND S.ID_SESSION <> '$id_session'
                  AND (S.DATE_FIN_SESSION < (SELECT DATE_DEBUT_SESSION FROM session WHERE ID_SESSION = '$id_session') OR S.DATE_DEBUT_SESSION > (SELECT DATE_FIN_SESSION FROM session WHERE ID_SESSION = '$id_session'))";
                  $overlaped_session = $db_connection->prepare($overlaped_session_request);
                  $overlaped_session->execute();

                  $overlaped_session_rows = $overlaped_session->fetchAll(PDO::FETCH_ASSOC);
                  $overlaped_session_rows_count = count($overlaped_session_rows);


                  if($session_count >= 2) {
                    echo "<div class='alert alert-danger'>";
                      echo "<ul>";
                        echo "<li>Vous avez atteint 2 sessions de formation cette année</li>";
                      echo "</ul>";
                    echo "</div>";

                  } elseif ($session_count == 1 AND $overlaped_session_rows_count == 0) {
                    echo "<div class='alert alert-danger'>";
                      echo "<ul>";
                        echo "<li>La session sélectionnée chevauche avec votre session actuelle.</li>";
                      echo "</ul>";
                    echo "</div>";
                  } else {
                    // insert and display a success message 
                    $inscription_insert_request = "INSERT INTO `inscription` VALUES (NULL, '$id_apprenant', '$id_session', NULL)";
                    $inscription_insert = $db_connection->prepare($inscription_insert_request);
                    $inscription_insert->execute();
                    
                    echo "<div class='alert alert-success'>";
                      echo "<ul>";
                        echo "<li>Félicitations! Votre inscription à la session en ligne a été un succès. Pour accéder à votre profil, veuillez cliquer sur le lien suivant : <a href='./profil.php' class='link-underline-warning'>Page profil</a></li>";
                      echo "</ul>";
                    echo "</div>";
                    

                  }



                
              }

          ?>    
               
        </tbody>
      </table>
    </section>



    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html>