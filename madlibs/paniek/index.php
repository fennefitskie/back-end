<?php  
$vraag1 = $vraag2 = $vraag3 = $vraag4 = $vraag5 = $vraag6 = $vraag7 = $vraag8 = "";
$vraag1Err = $vraag2Err = $vraag3Err = $vraag4Err = $vraag5Err = $vraag6Err = $vraag7Err = $vraag8Err = "";
$isValid = true;
$toonVerhaal = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["vraag1"])) {
        $vraag1Err = "Verplicht veld";
        $isValid = false;
    } else {
        $vraag1 = htmlspecialchars($_POST["vraag1"], ENT_QUOTES, 'UTF-8');
    }

    if (empty($_POST["vraag2"])) {
        $vraag2Err = "Verplicht veld";
        $isValid = false;
    } else {
        $vraag2 = htmlspecialchars($_POST["vraag2"], ENT_QUOTES, 'UTF-8');
    }

    if (empty($_POST["vraag3"])) {
        $vraag3Err = "Verplicht veld";
        $isValid = false;
    } else {
        $vraag3 = htmlspecialchars($_POST["vraag3"], ENT_QUOTES, 'UTF-8');
    }

    if (empty($_POST["vraag4"])) {
        $vraag4Err = "Verplicht veld";
        $isValid = false;
    } else {
        $vraag4 = htmlspecialchars($_POST["vraag4"], ENT_QUOTES, 'UTF-8');
    }

    if (empty($_POST["vraag5"])) {
        $vraag5Err = "Verplicht veld";
        $isValid = false;
    } else {
        $vraag5 = htmlspecialchars($_POST["vraag5"], ENT_QUOTES, 'UTF-8');
    }

    if (empty($_POST["vraag6"])) {
        $vraag6Err = "Verplicht veld";
        $isValid = false;
    } else {
        $vraag6 = htmlspecialchars($_POST["vraag6"], ENT_QUOTES, 'UTF-8');
    }

    if (empty($_POST["vraag7"])) {
        $vraag7Err = "Verplicht veld";
        $isValid = false;
    } else {
        $vraag7 = htmlspecialchars($_POST["vraag7"], ENT_QUOTES, 'UTF-8');
    }

    if (empty($_POST["vraag8"])) {
        $vraag8Err = "Verplicht veld";
        $isValid = false;
    } else {
        $vraag8 = htmlspecialchars($_POST["vraag8"], ENT_QUOTES, 'UTF-8');
    }

    if ($isValid) {
        $toonVerhaal = true;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Er heerst paniek</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php if (!$toonVerhaal): ?>
        <form action="index.php" method="post">
            <ul>
                <li><a href="index.php">paniek</a></li>
                <li><a href="http://localhost/madlibs/onkunde/">onkunde</a></li>
            </ul>

            <h1>Er heerst paniek...</h1>

            <label for="vraag1">
                Welk dier zou je nooit als huisdier willen hebben:
                <a class="required">* <?= $vraag1Err ?></a>
            </label>
            <input id="vraag1" name="vraag1" type="text" value="<?= $vraag1 ?>">

            <label for="vraag2">
                Wie is de belangrijkste persoon in je leven:
                <a class="required">* <?= $vraag2Err ?></a>
            </label>
            <input id="vraag2" name="vraag2" type="text" value="<?= $vraag2 ?>">

            <label for="vraag3">
                In welk land zou je graag willen wonen:
                <a class="required">* <?= $vraag3Err ?></a>
            </label>
            <input id="vraag3" name="vraag3" type="text" value="<?= $vraag3 ?>">

            <label for="vraag4">
                Wat doe je als je je verveelt:
                <a class="required">* <?= $vraag4Err ?></a>
            </label>
            <input id="vraag4" name="vraag4" type="text" value="<?= $vraag4 ?>">

            <label for="vraag5">
                Met welk speelgoed speelde je als kind het meest:
                <a class="required">* <?= $vraag5Err ?></a>
            </label>
            <input id="vraag5" name="vraag5" type="text" value="<?= $vraag5 ?>">

            <label for="vraag6">
                Bij welke docent spijbel je het liefst:
                <a class="required">* <?= $vraag6Err ?></a>
            </label>
            <input id="vraag6" name="vraag6" type="text" value="<?= $vraag6 ?>">

            <label for="vraag7">
                Als je €100.000,- had, wat zou je dan kopen:
                <a class="required">* <?= $vraag7Err ?></a>
            </label>
            <input id="vraag7" name="vraag7" type="text" value="<?= $vraag7 ?>">

            <label for="vraag8">
                Wat is je favoriete bezigheid:
                <a class="required">* <?= $vraag8Err ?></a>
            </label>
            <input id="vraag8" name="vraag8" type="text" value="<?= $vraag8 ?>">

            <input type="submit" value="Maak verhaal">
        </form>
    <?php else: ?>
        <div class="story">
            <h1>Er heerst paniek...</h1>
            <p>
                Er heerst paniek in het koninkrijk <strong><?= $vraag3 ?></strong>, Koning <strong><?= $vraag6 ?></strong> is ten einde raad.<br>
                Als koning <strong><?= $vraag6 ?></strong> ten einde raad is, dan roept hij zijn ten-einde-raadsheer <strong><?= $vraag2 ?></strong>.<br><br>

                "<strong><?= $vraag2 ?></strong>! Het is een ramp! Het is een schande!"<br><br>

                "Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?"<br><br>

                "Mijn <strong><?= $vraag1 ?></strong> is verdwenen! Zo maar, zonder waarschuwing. En ik had net een <strong><?= $vraag5 ?></strong> voor hem gekocht!"<br><br>

                "Majesteit, uw <strong><?= $vraag1 ?></strong> komt vast vanzelf weer terug?"<br><br>

                "Ja, da's leuk en aardig, maar hoe moet ik in de tussentijd <strong><?= $vraag8 ?></strong> leren?"<br><br>

                "Maar Sire, daar kunt u toch uw <strong><?= $vraag7 ?></strong> voor gebruiken."<br><br>

                "<strong><?= $vraag2 ?></strong>, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had."<br><br>

                "<strong><?= $vraag4 ?></strong>, Sire."
            </p>
        </div>
    <?php endif; ?>

    <div class="copyright">Gemaakt door Fenne - © <?= date("Y") ?></div>
</body>
</html>