<?php
$time = date("H");

if ($time >= 6 && $time < 12) {
    $greeting = "Goede morgen";
    $image = "morning.png";
} elseif ($time >= 12 && $time < 18) {
    $greeting = "Goede middag";
    $image = "afternoon.png";
} elseif ($time >= 18 && $time < 24) {
    $greeting = "Goede avond";
    $image = "evening.png";
} else {
    $greeting = "Goede nacht";
    $image = "night.png";
}

$currentTime = date("H:i");
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $greeting ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body style="background: url('images/<?= $image ?>') no-repeat center center fixed; background-size: cover;">
    <div class="content">
        <h1><?= $greeting ?>!</h1>
        <p>Het is nu <?= $currentTime ?> uur</p>
    </div>
</body>
</html>
