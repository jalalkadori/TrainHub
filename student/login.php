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
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <header class="sticky-top">
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
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
            <div class="d-flex">
                <a href="./signup.php" class="btn btn-danger" type="button">S'inscrire</a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <?php 
        $error_email = '';
        if(isset($_POST['connecter'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $apprenant_connection_request = "SELECT * FROM `apprenant` WHERE EMAIL_APPRENANT = '$email' AND MDP_APPRENANT = '$password'";
            $apprenant_connection = $db_connection->prepare($apprenant_connection_request);
            $apprenant_connection->execute();
            $apprenant_connection_results = $apprenant_connection->fetch( PDO::FETCH_ASSOC );
            $count = $apprenant_connection->rowCount();
            if($count == 0) {
                $error_email = 'Adresse email ou mot de pass incorect !!';
            } else {
                session_start();
                $_SESSION['email'] = $apprenant_connection_results['EMAIL_APPRENANT'];
                $_SESSION['password'] = $apprenant_connection_results['MDP_APPRENANT'];
                $_SESSION['id_apprenant'] = $apprenant_connection_results['ID_APPRENANT'];
                $_SESSION['full_name'] = $apprenant_connection_results['NOM_APPRENANT'];
                $_SESSION['phone_number'] = $apprenant_connection_results['TELE_APPRENANT'];
                header('Location: index.php');
            }
        }

    ?>


    <section class="container my-5" id="slide">
      <div class="row">
        
        <div class="col-md-6 py-5">
          <img src="./images/vectors/login.jpg" alt="Image" class="img-fluid">  
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-start gap-5">
          <h1 class="slide-title">connectez-vous à votre compte</h1>
            <form action="#" method="post">
                <div class="row">
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email">
                        <div class="form-text text-danger"><?= $error_email ?></div>
                    </div>
                    <div class="col mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control w-100" name="password">
                    </div>
                </div>
                    
                <button class="btn-action" style="--c: #373B44;--b: 5px;--s:12px" type="submit" name="connecter">Connexion</button>
            </form>          
        </div>
      </div>
    </section>



    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>