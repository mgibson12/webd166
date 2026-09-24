<?php
session_start();

$validEducation = [
    'High School',
    'Associate Degree',
    "Bachelor's Degree",
    "Master's Degree",
    'Doctoral Degree'
];

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['age'])) {
    header('Location: survey.php');
    exit;
}

$education = $_POST['education'] ?? '';

if (!in_array($education, $validEducation, true)) {
    header('Location: survey.php?error=1');
    exit;
}

$_SESSION['education'] = $education;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey: Income</title>
    <link rel="stylesheet" href="survey.css">
</head>
<body>
    <header>
        <h1>Anonymous Survey</h1>
        <p>Question 3 of 3</p>
    </header>

    <main>
        <form action="survey_result.php" method="post">
            <fieldset>
                <legend>What is your annual income bracket?</legend>

                <div class="option">
                    <input type="radio" id="under20" name="income" value="Under $20,000" required>
                    <label for="under20">Under $20,000</label>
                </div>

                <div class="option">
                    <input type="radio" id="income20-39" name="income" value="$20,000–$39,999">
                    <label for="income20-39">$20,000–$39,999</label>
                </div>

                <div class="option">
                    <input type="radio" id="income40-59" name="income" value="$40,000–$59,999">
                    <label for="income40-59">$40,000–$59,999</label>
                </div>

                <div class="option">
                    <input type="radio" id="income60-79" name="income" value="$60,000–$79,999">
                    <label for="income60-79">$60,000–$79,999</label>
                </div>

                <div class="option">
                    <input type="radio" id="income80plus" name="income" value="$80,000 or more">
                    <label for="income80plus">$80,000 or more</label>
                </div>
            </fieldset>

            <button type="submit">View Results</button>
        </form>
    </main>
</body>
</html>
