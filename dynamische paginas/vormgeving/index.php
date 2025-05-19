<?php
require_once 'database.php';

// Karakters ophalen uit juiste tabel en sorteren op naam (A-Z)
$sql = "SELECT * FROM characters ORDER BY name ASC";
$characters = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$aantalCharacters = count($characters);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet">
</head>
<body>
<header><h1>Alle <?= $aantalCharacters ?> characters uit de database</h1></header>
<div id="container">
    <?php foreach ($characters as $char): ?>
        <a class="item" href="character.php?id=<?= htmlspecialchars($char['id']) ?>">
            <div class="left">
                <img class="avatar" src="resources/images/<?= htmlspecialchars($char['avatar'] ?? 'default.jpg') ?>" alt="Character image">
            </div>
            <div class="right">
                <h2><?= htmlspecialchars($char['name']) ?></h2>
                <div class="stats">
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?= $char['health'] ?? '?' ?></li>
                        <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?= $char['attack'] ?? '?' ?></li>
                        <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?= $char['defense'] ?? '?' ?></li>
                    </ul>
                </div>
            </div>
            <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
        </a>
    <?php endforeach; ?>
</div>
<?php include('footer.php'); ?>
</body>
</html>
