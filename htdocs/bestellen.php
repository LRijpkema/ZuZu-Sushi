<?php
session_start();
error_reporting(0);

$melding = "";
$rating = "";


try {
  $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
} catch (PDOException $e) {
  die("Error: " . $e->getMessage());
}

$query = $db->prepare("SELECT * FROM sushi");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as &$data) {
  $data["id"] . " ";
  $data["category"] . " ";
  $data["name"] . " ";
  $data["quantity"] . " ";
  $data["price"] . " ";
  $data["order"] . " ";
  $data["stars"] . " ";
}


if (isset($_POST['bestellen'])) {
  $order = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

  $melding = 'bestelling is geplaatst!';

  foreach ($result as &$data) {
    $_SESSION[$data["order"]] = $_POST[$data["id"]];
  }
} else {
  $melding = '';
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
  <title>Bestellen</title>
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
              <a class="nav-link active" href="bestellen.php">Bestellen</a>
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
  <div class="container cards d-flex justify-content-center">
    <div class="bestellen w-100 m-3">
      <h2>Sushi Bestellen</h2>
      <form method="POST">
        <?php
        foreach ($result as &$data) {
          if ($data["stars"] < 2) {
            $rating = "&starf;";
          } elseif ($data["stars"] < 3) {
            $rating = "&starf; &starf;";
          } elseif ($data["stars"] < 4) {
            $rating = "&starf; &starf; &starf; ";
          } elseif ($data["stars"] < 5) {
            $rating = "&starf; &starf; &starf; &starf; ";
          } else {
            $rating = "&starf; &starf; &starf; &starf; &starf;";
          };


          echo "<div class='form-group'>
                  <label for='exampleInputPassword1'>" . $data["category"] . " " . $data["name"] . " " . $rating . "</label>" .
            "<input type='number' class='form-control'name= '" . $data["id"] . "'" .  "min='0' max= '" .  $data["quantity"] . "'" . "placeholder='Max = " . $data["quantity"] . "'"  .  "> </div>";
        }
        ?>
        <input type="submit" name="bestellen" value="Bestellen">
      </form>
      <?php echo "$melding"; ?>
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