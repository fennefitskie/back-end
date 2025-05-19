<?php
require_once 'database.php';

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    die('Geen geldig character ID opgegeven.');
}

$stmt = $conn->prepare("SELECT * FROM characters WHERE id = ?");
$stmt->execute([$id]);
$character = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$character) {
    die('Character niet gevonden.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character - <?= htmlspecialchars($character['name']) ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet">
</head>
<body>
<header>
    <h1><?= htmlspecialchars($character['name']) ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
</header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?= htmlspecialchars($character['avatar'] ?? 'default.jpg') ?>" alt="Character image">
            <div class="stats" style="background-color: <?= htmlspecialchars($character['color']) ?>">
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
                        <li><b>Weapon</b>: <?= htmlspecialchars($character['weapon']) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($character['armor'])): ?>
                        <li><b>Armor</b>: <?= htmlspecialchars($character['armor']) ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="right">
            <p><?= !empty($character['bio']) ? nl2br(htmlspecialchars($character['bio'])) : 'Geen beschrijving.' ?></p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>
