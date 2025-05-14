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

    if ($isValid) {
        $toonVerhaal = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>onkunde</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (!$toonVerhaal): ?>
    <form action="index.php" method="post">
        <ul>
            <li><a href="http://localhost/madlibs/paniek/">paniek</a></li>
            <li><a href="index.php">onkunde</a></li>
        </ul>

        <h1>Onkunde</h1>
        
        <label for="vraag1">Wat zou je graag willen kunnen?: <a class="required">* <?= $vraag1Err ?></a></label>
        <input name="vraag1" type="text" value="<?= htmlspecialchars($vraag1) ?>">

        <label for="vraag2">Met welk persoon kun je goed opschieten: <a class="required">* <?= $vraag2Err ?></a></label>
        <input name="vraag2" type="text" value="<?= htmlspecialchars($vraag2) ?>">

        <label for="vraag3">Wat is je favoriet getal: <a class="required">* <?= $vraag3Err ?></a></label>
        <input name="vraag3" type="text" value="<?= htmlspecialchars($vraag3) ?>">
        
        
        <label for="vraag4">Wat heb je altijd bij je als je op vakantie gaat?: <a class="required">* <?= $vraag4Err ?></a></label>
        <input name="vraag4" type="text" value="<?= htmlspecialchars($vraag4) ?>">

        <label for="vraag5">Wat is je beste persoonlijk eigenschap?: <a class="required">* <?= $vraag5Err ?></a></label>
        <input name="vraag5" type="text" value="<?= htmlspecialchars($vraag5) ?>">

        <label for="vraag6">Wat is je slechtste persoonlijke eigenschap?: <a class="required">* <?= $vraag6Err ?></a></label>
        <input name="vraag6" type="text" value="<?= htmlspecialchars($vraag6) ?>">

        <label for="vraag7">Wat is het ergste dat je kan overkomen?: <a class="required">* <?= $vraag7Err ?></a></label>
        <input name="vraag7" type="text" value="<?= htmlspecialchars($vraag7) ?>">


        <input type="submit" value="Submit">
    </form>
    
    <?php else: ?>
    <div class="story">
        <h1>Onkunde.</h1>
        <p>
            Er zijn veel mensen die niet kunnen <strong><?= htmlspecialchars($vraag1) ?></strong>.<br>
            Neem nou <strong><?= htmlspecialchars($vraag2) ?></strong>.<br>
            Zelfs met de hulp van een <strong><?= htmlspecialchars($vraag4) ?></strong> of zelfs <strong><?= htmlspecialchars($vraag3) ?></strong> kan <strong><?= htmlspecialchars($vraag2) ?></strong> niet <strong><?= htmlspecialchars($vraag1) ?></strong>.<br>
            Dat heeft niet te maken met een gebrek aan <strong><?= htmlspecialchars($vraag5) ?></strong> maar met een te veel aan <strong><?= htmlspecialchars($vraag6) ?></strong>.<br>
            Te veel aan <strong><?= htmlspecialchars($vraag6) ?></strong> leidt tot <strong><?= htmlspecialchars($vraag7) ?></strong> en dat is niet goed als je wilt <strong><?= htmlspecialchars($vraag1) ?></strong>.<br>
            Helaas voor <strong><?= htmlspecialchars($vraag2) ?></strong>.
        </p>
    </div>
<?php endif; ?>

    <div class="copyright">Gemaakt door Fenne - © <?= date("Y") ?></div>
</body>
</html>