<?php
session_start();
error_reporting(0);

try {
  $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
} catch (PDOException $e) {
  die("Error: " . $e->getMessage());
}

$query = $db->prepare("SELECT * FROM klant");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as &$data) {
  $data["fname"] . " ";
  $data["lname"] . " ";
  $data["email"] . " ";
  $data["adres"] . " ";
  $data["postcode"] . " ";
  $data["woonplaats"] . " ";
}

$melding = "";


$query = $db->prepare("SELECT * FROM sushi");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as &$data) {
  $data["category"] . " ";
  $data["name"] . " ";
  $data["quantity"] . " ";
  $data["price"] . " ";
  $data["order"] = "";
}


if (!empty($_SESSION[$data["order"]]) && !empty($_SESSION['fname']) && !empty($_SESSION['lname']) && !empty($_SESSION['email']) && !empty($_SESSION['adres']) && !empty($_SESSION['postcode']) && !empty($_SESSION['woonplaats'])) {
    $melding = "Uw bestelling komt er aan!!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;500;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Bestel Overzicht</title>
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
            <a class="nav-link" aria-current="page" href="index.php"">Home</a>
              </li>
              <li class=" nav-item">
              <a class="nav-link" href="bestellen.php">Bestellen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="klantgegevens.php">Klantgegevens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="besteloverzicht.php">Bestelling Overzicht</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <img class="mainimage" src="img/sushimain.png" alt="sushimain">
  <div class="container cards d-flex justify-content-center">
    <div class="bestellingoverzicht w-100 m-3">
      <div class="Bestelling">
        <h2>Bestelling</h2>
        <p> <?php



            if (!empty($_SESSION[$data["order"]])) {
              foreach ($result as &$data) {
                echo $data['category'] . " " . $data["name"] . "     " . $_SESSION[$data["order"]] . " <br>";
              }
            } else {
              echo "Uw besteling is nog niet (goed) ingevuld";
            }




            // if (!empty($_SESSION['Nigiri_Zalm'])) {
            //   echo "  "$_SESSION['Nigiri_Zalm'];
            // }
            // 
            ?></p>
      </div>
      <div class="Klantgegevens">
        <h2>Klantgegevens</h2>

        <?php
        if (!empty($_SESSION['fname']) && !empty($_SESSION['lname']) && !empty($_SESSION['email']) && !empty($_SESSION['adres']) && !empty($_SESSION['postcode']) && !empty($_SESSION['woonplaats'])) {
          echo "<p>Naam: <br>" . $_SESSION['fname'] . " " . $_SESSION['lname'] . "</p>
          <p> Email: <br>" . $_SESSION['email'] . "</p>
          <p> Adres: <br> " . $_SESSION['adres'] . "<br> " . $_SESSION['postcode'] . "<br>" .  $_SESSION['woonplaats'] . "</p>";
        } else echo "<p>Uw gegevens zijn nog niet (goed) ingevuld</p>";
        ?>


      </div> 
      <?php echo "$melding"; ?>
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