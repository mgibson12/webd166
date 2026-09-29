<?php
session_start();

$allowedEducation = [
    'high school',
    'associate degree',
    "bachelor's degree",
    "master's degree",
    'doctoral degree'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $education = $_POST['education'] ?? '';

    if (!in_array($education, $allowedEducation, true)) {
        exit('There was a problem with your education selection. Please go back and try again.');
    }

    $_SESSION['education'] = $education;

    // Redirect after processing the POST request.
    header('Location: survey3.php');
    exit;
}

if (empty($_SESSION['age']) || empty($_SESSION['education'])) {
    header('Location: survey.php');
    exit;
}
?>
<!doctype html>
<!-- Name: Your Name -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey - Page 3</title>
    <link rel="stylesheet" href="survey.css">
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Anonymous Survey - Page 3</h1>
        <img class="survey-image" src="images/survey.png"
             alt="Clipboard with survey checkboxes">
    </header>

    <main>
        <form action="survey_result.php" method="post">
            <fieldset>
                <legend>What is your income bracket?</legend>

                <div class="choice">
                    <input type="radio" id="under20" name="income" value="under 20,000" required>
                    <label for="under20">Under 20,000</label>
                </div>

                <div class="choice">
                    <input type="radio" id="income20-39" name="income" value="20,000 to 39,000">
                    <label for="income20-39">20,000 to 39,000</label>
                </div>

                <div class="choice">
                    <input type="radio" id="income40-59" name="income" value="40,000 to 59,000">
                    <label for="income40-59">40,000 to 59,000</label>
                </div>

                <div class="choice">
                    <input type="radio" id="income60-80" name="income" value="60,000 to 80,000">
                    <label for="income60-80">60,000 to 80,000</label>
                </div>

                <div class="choice">
                    <input type="radio" id="over80" name="income" value="over 80,000">
                    <label for="over80">Over 80,000</label>
                </div>
            </fieldset>

            <button type="submit">Next &gt;&gt;</button>
        </form>
    </main>
</div>
</body>
</html>
