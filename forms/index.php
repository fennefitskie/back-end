<?php
$naam = "";
$email = "";
$naamErr = "";
$emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["naam"])) {
        $naamErr = "Naam is verplicht";
        $isValid = false;
    } else {
        $naam = htmlspecialchars($_POST["naam"], ENT_QUOTES, 'UTF-8');
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is verplicht";
        $isValid = false;
    } else {
        $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');

        // E-mail validatie
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Ongeldig e-mailadres";
            $isValid = false;
        }
    }

    if ($isValid) {
        echo "Je naam is: $naam<br>";
        echo "Je email is: $email";
        exit(); // stopt de pagina na tonen van resultaat
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Formulier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Vul je gegevens in om in te loggen</h1>

    <form action="index.php" method="post">
        <label for="naam">
            Vul hier je naam in:
            <a class="required">* <?= $naamErr ?></a>
        </label>
        <input id="naam" name="naam" type="text" value="<?= htmlspecialchars($naam) ?>">

        <label for="email">
            Vul hier je email in:
            <a class="required">* <?= $emailErr ?></a>
        </label>
        <input id="email" name="email" type="text" value="<?= htmlspecialchars($email) ?>">

        <input type="submit" value="Log In">
    </form>
</body>
</html>