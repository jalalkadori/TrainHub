<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trainhub | accueil</title>
    <link rel="stylesheet" href="styles.css">
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
                <a class="nav-link" href="./formation.php">Formations</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
            <div class="d-flex">
              <button class="btn btn-outline-primary me-2" type="button">Login</button>
              <button class="btn btn-primary" type="button">Sign up</button>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <section class="container my-5" id="filter">
      <h2 class="section-title">Trouvé une formation</h2>
      <div class="row my-5">
        <div class="col-sm-4">
          <label for="input1" class="form-label">Input 1:</label>
          <input type="text" class="form-control" id="input1" name="input1">
        </div>
        <div class="col-sm-4">
          <label for="input1" class="form-label">Input 1:</label>
          <select class="form-select" id="select1" name="select1">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
            <option value="option4">Option 4</option>
          </select>
        </div>
        <div class="col-sm-4 d-flex align-items-end">
          <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
      </div>
    </section>

    <section class="container my-5" id="formation-list">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">This is the content for Card 1.</p>
              <button class="btn btn-danger">Rjoindre</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card 2</h5>
              <p class="card-text">This is the content for Card 2.</p>
              <button class="btn btn-danger">Rjoindre</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card 3</h5>
              <p class="card-text">This is the content for Card 3.</p>
              <button class="btn btn-danger">Rjoindre</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card 4</h5>
              <p class="card-text">This is the content for Card 4.</p>
              <button class="btn btn-danger">Rjoindre</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>