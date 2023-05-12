<?php 
include("db_connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <title>Formateur Login</title>
</head>
<body>
    <header class="">
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
                        <h3>
                            <a class="nav-link active" href="index.php">Espace Formateurs</a>
                        </h3>
                    </li>
                    
                    </ul>
                    <div class="d-flex">
                        <a href="./contact.php" class="btn btn-danger" type="button">Contactez-Nous</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <?php
        $errorEmail = '';

        if (isset($_POST['connecter'])) {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // Perform form validation
            if (empty($email) || empty($password)) {
                $errorEmail = 'Veuillez remplir tous les champs.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorEmail = 'Veuillez entrer une adresse email valide.';
            } else {
                // Validations passed, proceed with the database query
                $formateurConnectionRequest = "SELECT * FROM `formateur` WHERE EMAIL_FORMATEUR = ? AND MDP_FORMATEUR = ?";
                $formateurConnection = $db_connection->prepare($formateurConnectionRequest);
                $formateurConnection->execute([$email, $password]);
                $formateurConnectionResults = $formateurConnection->fetch(PDO::FETCH_ASSOC);
                $count = $formateurConnection->rowCount();

                if ($count == 0) {
                    $errorEmail = 'Adresse email ou mot de passe incorrect. Veuillez réessayer.';
                } else {
                    session_start();
                    $_SESSION['emailFormateur'] = $formateurConnectionResults['EMAIL_FORMATEUR'];
                    $_SESSION['password'] = $formateurConnectionResults['MDP_FORMATEUR'];
                    $_SESSION['id_formateur'] = $formateurConnectionResults['ID_FORMATEUR'];
                    $_SESSION['formateurFullName'] = $formateurConnectionResults['NOM_FORMATEUR'];
                    header('Location: dashboard.php');
                    exit();
                }
            }
        }
    ?>



    <section class="container my-5" id="slide">
      <div class="row">
        <div class="col-md-6">
          <img src="./images/vectors/login.jpg" alt="Image" class="img-fluid">  
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-start gap-5">
          <h1 class="slide-title">connectez-vous à votre compte</h1>
            <form action="#" method="post">
                <div class="row">
                    <div class="col">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email">
                        <div class="form-text text-danger"><?= $errorEmail ?></div>
                    </div>
                    <div class="col">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control w-100" name="password">
                    </div>
                </div>
                    
                <button class="btn-action" style="--c: #373B44;--b: 5px;--s:12px" type="submit" name="connecter">Connexion</button>
            </form>          
        </div>
      </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html>