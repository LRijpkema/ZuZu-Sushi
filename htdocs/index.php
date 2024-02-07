<?php
session_start();
setlocale(LC_ALL, 'nld_nld');

try {
  $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
} catch (PDOException $e) {
  die("Error: " . $e->getMessage());
}


$time = date(format: "H");

$greeting = match (true) {
  $time <= 6 => 'Goedeavond',
  $time <= 12 => 'Goedemorgen',
  $time <= 18 => 'Goedemiddag',
  $time <= 24 => 'Goedeavond',
};

$deliverytime = date("H:i", time() + 3600);

?>


<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;500;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Homepage</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Zuzu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php"">Home</a>
              </li>
              <li class=" nav-item">
              <a class="nav-link" href="bestellen.php">Bestellen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="klantgegevens.php">Klantgegevens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="besteloverzicht.php">Bestelling Overzicht</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <img class="mainimage" src="img/sushimain.png" alt="sushimain">
  <div class="welcome">
    <h1 class="d-flex justify-content-center"> <?php echo "$greeting" ?>, welkom bij ZuZu</h1>
    <p class="d-flex justify-content-center">wij zijn gespecialiseerd in de Japanse keuken,</p>
    <p class="d-flex justify-content-center">Het woord "Sushi" is afkomsitng van "Su" wat azijn betekent, en "Shi" rijst.</p>
    <p lang="nl" class="d-flex justify-content-center"><b><?php echo strftime(format: "%A %e %B %Y"); ?></b></p>
    <p class="d-flex justify-content-center"><b>Bezorgtijd vanaf nu: <?php echo "$deliverytime" ?></b></p>
  </div>
  <div class="container cards d-flex justify-content-center">
    <div class="row">
      <div class="col-6">
        <div class="card" style="width: 35rem;">
          <img class="card-img-top" src="img/card1.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Bestel bij ons je sushi</p>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card" style="width: 35rem;">
          <img class="card-img-top" src="img/card2.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Kies uit verschillende soorten sushi</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="row row-cols-5 p-5 border-top bg-dark">
    <div class="col">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
      </a>
      <p class="text-muted">ZuZu © 2021</p>
    </div>

    <div class="col">
    </div>
    <div class="col text-light">
      <h5>Contactgegevens</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Restaurant ZuZu</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Appelstraat 1</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">1111 AA Fruit</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">zuzu@gmail.com</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">06-12345678</a></li>
      </ul>
    </div>
    <div class="col text-light">
      <h5>Openingstijden</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Maandag: Gesloten</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Dinsdag: 16:00-22:00</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Woensdag: 16:00-22:00</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Donderdag: 16:00-22:00</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Vrijdag: 15:00-22:00</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Zaterdag: 15:00-22:00</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Zondag: Gesloten</a></li>
      </ul>
    </div>
  </footer>
</body>

</html>