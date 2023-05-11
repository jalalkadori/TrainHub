<?php 
include("./db_connection.php");
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
                <a href="./login.php" class="btn btn-danger" type="button">Connectez-vous</a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <?php
      if (isset($_POST['creer'])) {
        // remove any unnecessary whitespace characters from the user input using trim() function. 
        $fullName = trim($_POST['fullName']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $password = trim($_POST['password']);
    
        // Validate full name
        if (empty($fullName)) {
            $errors[] = "Le nom complet est obligatoire.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
            $errors[] = "Le nom complet ne doit contenir que des lettres et des espaces.";
        }
    
        // Validate email
        if (empty($email)) {
            $errors[] = "L'adresse email est obligatoire.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email n'est pas valide.";
        } else {
          // Check if email already exists in database
          $stmt = $db_connection->prepare("SELECT COUNT(*) FROM `apprenant` WHERE EMAIL_APPRENANT = :email");
          //'stmt' is an abbreviation of "statement" !
          $stmt->bindParam(':email', $email);
          // bindParam() is a method of the PDO statement object that binds a variable to a parameter in the SQL statement. It is used to avoid SQL injection attacks and to improve performance by allowing the database to prepare the statement once and reuse it multiple times.
          $stmt->execute();
          $count = $stmt->fetchColumn();  // fetchColumn() is a method available in PHP's PDO database abstraction layer, used to retrieve a single column of a result set from a SQL query. It fetches the value of the next row from the result set, and returns the value of the specified column number (0-indexed) or column name as a scalar value.
          if ($count > 0) {
              $errors[] = 'L\'adresse email est déjà utilisée';
          }
        }
    
        // Validate phone number
        if (empty($phone)) {
            $errors[] = "Le numéro de téléphone est obligatoire.";
        } else if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $errors[] = "Le numéro de téléphone doit contenir 10 chiffres.";
        } else {
          // Check if phone number already exists in database
          $stmt = $db_connection->prepare("SELECT COUNT(*) FROM `apprenant` WHERE TELE_APPRENANT = :phone");
          $stmt->bindParam(':phone', $phone);
          $stmt->execute();
          $count = $stmt->fetchColumn();
          if ($count > 0) {
              $errors[] = 'Le numéro de téléphone est déjà utilisé';
          }
        }
    
        // Validate password
        if (empty($password)) {
            $errors[] = "Le mot de passe est obligatoire.";
        } else if (strlen($password) < 8) {
            $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
        }
    
        // If there are no errors, insert the data into the database
        if (empty($errors)) {
          $sql = "INSERT INTO `apprenant` VALUES (null, :fullName, :email, :password, :phone)";
          $stmt = $db_connection->prepare($sql);

          $stmt->bindParam(':fullName', $fullName);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':phone', $phone);
          $stmt->bindParam(':password', $password);
          $stmt->execute();
  
          header('Location: login.php');
          exit();

        } else { // Display an alert on the top of the page with a list of all the errors 
          echo "<div class='alert alert-danger'>";
          echo "<ul>";
          foreach($errors as $error) {
              echo "<li>$error</li>";
          }
          echo "</ul>";
          echo "</div>";
        }
      }
    

    ?>

    <section class="container my-5" id="slide">
      <div class="row">
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-start gap-5">
          <h1 class="slide-title">Créer vote compte</h1>
            <form method="post">
                <div class="row row-cols-2">
                    <div class="col mb-3">
                        <label for="email" class="form-label">Nom Complet</label>
                        <input type="text" class="form-control" name="fullName">
                    </div>
                    <div class="col mb-3">
                        <label for="password" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control w-100" name="email">
                    </div>
                    <div class="col mb-3">
                        <label for="phone" class="form-label">Numéro de Téléphone</label>
                        <input type="phone" class="form-control w-100" name="phone" max="10">
                    </div>
                    <div class="col mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de pass</label>
                        <input type="password" class="form-control w-100" name="password">
                    </div>
                </div>
                    
                <button class="btn-action" style="--c: #373B44;--b: 5px;--s:12px" type="submit" name="creer">Créer</button>
            </form>           
        </div>

        <div class="col-md-6 py-5">
          <img src="./images/vectors/signup.png" alt="Image" class="img-fluid">  
        </div>
      </div>
    </section>



      
    
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>