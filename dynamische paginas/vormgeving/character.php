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

$id = $_GET['id'] ?? null;
if (!$id) {
    die('Geen character ID opgegeven.');
}

$character = null;

foreach ($conn->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN) as $table) {
    $statement = $conn->prepare("SELECT * FROM `$table` WHERE id = ?");
    $statement->execute([$id]);
    if ($character = $statement->fetch(PDO::FETCH_ASSOC)) {
        break;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character - <?= $character['name'] ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header><h1><?= $character['name'] ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>

<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?= $character['avatar'] ?? 'default.jpg' ?>">
            <div class="stats" style="background-color: yellowgreen">
                <ul class="fa-ul">
                    <?php if (!empty($character['health'])): ?>
                        <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?= $character['health'] ?></li>
                    <?php endif; ?>
                    <?php if (!empty($character['attack'])): ?>
                        <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?= $character['attack'] ?></li>
                    <?php endif; ?>
                    <?php if (!empty($character['defense'])): ?>
                        <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?= $character['defense'] ?></li>
                    <?php endif; ?>
                </ul>
                <ul class="gear">
                    <?php if (!empty($character['weapon'])): ?>
                        <li><b>Weapon</b>: <?= $character['weapon'] ?></li>
                    <?php endif; ?>
                    <?php if (!empty($character['armor'])): ?>
                        <li><b>Armor</b>: <?= $character['armor'] ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="right">
            <p><?= !empty($character['bio']) ? nl2br($character['bio']) : 'Geen beschrijving.' ?></p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<footer>&copy; Fenne <?= date("Y"); ?></footer>
</body>
</html>