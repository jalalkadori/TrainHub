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
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
            <div class="d-flex">
                <a href="./login.php" class="btn btn-primary" type="button">Connectez-vous</a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <section class="container my-5" id="slide">
      <div class="row">
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-start gap-5">
          <h1 class="slide-title">Créer vote compte</h1>
            <form>
                <div class="row row-cols-2">
                    <div class="col mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nom Complet</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col mb-3">
                        <label for="exampleInputPassword1" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control w-100" id="exampleInputPassword1">
                    </div>
                    <div class="col mb-3">
                        <label for="exampleInputPassword1" class="form-label">Numéro de Téléphone</label>
                        <input type="phone" class="form-control w-100" id="exampleInputPassword1" max="10">
                    </div>
                    <div class="col mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de pass</label>
                        <input type="password" class="form-control w-100" id="exampleInputPassword1">
                    </div>
                </div>
                    
                <a href="#" class="btn-action" style="--c: #373B44;--b: 5px;--s:12px" type="submit">Créer</a>
            </form>          
        </div>

        <div class="col-md-6 py-5">
          <img src="icons/slide1.png" alt="Image" class="img-fluid">  
        </div>
      </div>
    </section>



      
    
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>