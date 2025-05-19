<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lab 2 - Includes en require</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- Header -->
  <?php require "includes/header.php"; ?>

  <!-- Dynamische content laden -->
  <main>
    <?php
    $allowed_pages = ['attack_on_titan', 'eren', 'hange', 'armin'];

    // Als 'page' is meegegeven en geldig is, laad die pagina
    if (isset($_GET['page']) && in_array($_GET['page'], $allowed_pages)) {
        $page = $_GET['page'];
    } else {
        // Standaardpagina = attack_on_titan
        $page = 'attack_on_titan';
    }

    include "pages/$page.php";
    ?>
  </main>

  <!-- Footer -->
  <?php require "includes/footer.php"; ?>

</body>
</html>
