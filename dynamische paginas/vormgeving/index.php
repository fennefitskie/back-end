<?php
$host = 'localhost';
$dbname = 'characters';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die();
}

// Karakters ophalen
$characters = [];
$tables = $conn->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $table) {
    $rows = $conn->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $characters[] = $row;
    }
}

$aantalCharacters = count($characters);

// Sorteer op naam (alfabetisch)
usort($characters, function ($a, $b) {
    return strcmp($a['name'], $b['name']);
});

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header><h1>Alle <?php echo($aantalCharacters) ?> characters uit de database</h1></header>
<div id="container">
    <?php foreach ($characters as $char): ?>
        <a class="item" href="character.php?id=<?= $char['id'] ?? '' ?>">
            <div class="left">
                <img class="avatar" src="resources/images/<?= $char['avatar'] ?? 'default.jpg' ?>">
            </div>
            <div class="right">
                <h2><?= $char['name'] ?? 'Onbekend' ?></h2>
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
<footer>&copy; Fenne <?= date("Y") ?></footer>
</body>
</html>