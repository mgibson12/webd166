<?php
session_start();

$validIncome = [
    'Under $20,000',
    '$20,000–$39,999',
    '$40,000–$59,999',
    '$60,000–$79,999',
    '$80,000 or more'
];

if (
    $_SERVER['REQUEST_METHOD'] !== 'POST' ||
    !isset($_SESSION['age'], $_SESSION['education'])
) {
    header('Location: survey.php');
    exit;
}

$income = $_POST['income'] ?? '';

if (!in_array($income, $validIncome, true)) {
    header('Location: survey.php?error=1');
    exit;
}

$_SESSION['income'] = $income;

$age = $_SESSION['age'];
$education = $_SESSION['education'];
$income = $_SESSION['income'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey Results</title>
    <link rel="stylesheet" href="survey.css">
</head>
<body>
    <header>
        <h1>Thank You for Taking Our Anonymous Survey</h1>
    </header>

    <main>
        <h2>Your Responses</h2>

        <ul class="results">
            <li>Age group: <?= htmlspecialchars($age, ENT_QUOTES, 'UTF-8') ?></li>
            <li>Education: <?= htmlspecialchars($education, ENT_QUOTES, 'UTF-8') ?></li>
            <li>Income: <?= htmlspecialchars($income, ENT_QUOTES, 'UTF-8') ?></li>
        </ul>

        <p><a class="button-link" href="survey.php">Start Over</a></p>
    </main>
</body>
</html>
