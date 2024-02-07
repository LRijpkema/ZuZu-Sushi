<?php
session_start();

$melding = "";
$data["order"] = "";

try {
  $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");


  if (isset($_POST['opslaan'])) {
    $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $adres = filter_input(INPUT_POST, "adres", FILTER_SANITIZE_STRING);
    $postcode = filter_input(INPUT_POST, "postcode", FILTER_SANITIZE_STRING);
    $woonplaats = filter_input(INPUT_POST, "woonplaats", FILTER_SANITIZE_STRING);

    $query = $db->prepare("INSERT INTO klant(fname,lname,email,adres,postcode,woonplaats) VALUES(:fname, :lname, :email, :adres, :postcode, :woonplaats)");

    $query->bindParam("fname", $fname);
    $query->bindParam("lname", $lname);
    $query->bindParam("email", $email);
    $query->bindParam("adres", $adres);
    $query->bindParam("postcode", $postcode);
    $query->bindParam("woonplaats", $woonplaats);


    if ($query->execute()) {
      $melding =  "Uw gegevens zijn opgeslagen";
      $_SESSION['fname'] = $_POST['fname'];
      $_SESSION['lname'] = $_POST['lname'];
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['adres'] = $_POST['adres'];
      $_SESSION['postcode'] = $_POST['postcode'];
      $_SESSION['woonplaats'] = $_POST['woonplaats'];
    } else {
      $melding = "Er is een fout opgetreden";
    }
  }
} catch (PDOException $e) {
  die("Error: " . $e->getMessage());
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
  <title>Klantgegevens</title>
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
            <a class="nav-link active" href="klantgegevens.php">Klantgegevens</a>
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
    <div class="klantgegevens w-100 m-3">
      <h2>Klantgegevens</h2>
      <form method="post" action="">
        <div class="form-group">
          <label for="exampleInputPassword1">Voornaam</label>
          <input type="text" class="form-control" name="fname" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Achternaam</label>
          <input type="text" class="form-control" name="lname" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" name="email" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Adres</label>
          <input type="text" class="form-control" name="adres" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Postcode</label>
          <input type="text" class="form-control" name="postcode" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Woonplaats</label>
          <input type="text" class="form-control" name="woonplaats" placeholder="">
        </div>
        <input type="submit" name="opslaan" value="Opslaan">
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