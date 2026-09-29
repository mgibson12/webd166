<?php
session_start();

$allowedIncome = [
    'under 20,000',
    '20,000 to 39,000',
    '40,000 to 59,000',
    '60,000 to 80,000',
    'over 80,000'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $income = $_POST['income'] ?? '';

    if (!in_array($income, $allowedIncome, true)) {
        exit('There was a problem with your income selection. Please go back and try again.');
    }

    $_SESSION['income'] = $income;

    // Redirect after processing the POST request.
    header('Location: survey_result.php');
    exit;
}

if (
    empty($_SESSION['age']) ||
    empty($_SESSION['education']) ||
    empty($_SESSION['income'])
) {
    header('Location: survey.php');
    exit;
}

$age = $_SESSION['age'];
$education = $_SESSION['education'];
$income = $_SESSION['income'];
?>
<!doctype html>
<!-- Name: Your Name -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey Results</title>
    <link rel="stylesheet" href="survey.css">
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Thank You for Taking Our Anonymous Survey</h1>
        <img class="survey-image" src="images/survey.png"
             alt="Clipboard with survey checkboxes">
    </header>

    <main>
        <h2>Your Responses</h2>

        <ul class="results">
            <li><strong>Age:</strong> <?= htmlspecialchars($age) ?></li>
            <li><strong>Education:</strong> <?= htmlspecialchars($education) ?></li>
            <li><strong>Income:</strong> <?= htmlspecialchars($income) ?></li>
        </ul>

        <p class="actions">
            <a class="button-link" href="survey.php">Take the Survey Again</a>
        </p>
    </main>
</div>
</body>
</html>
