<?php
session_start();

$validAges = ['Under 18', '18–29', '30–49', '50–65', 'Over 65'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: survey.php');
    exit;
}

$age = $_POST['age'] ?? '';

if (!in_array($age, $validAges, true)) {
    header('Location: survey.php?error=1');
    exit;
}

$_SESSION['age'] = $age;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey: Education</title>
    <link rel="stylesheet" href="survey.css">
</head>
<body>
    <header>
        <h1>Anonymous Survey</h1>
        <p>Question 2 of 3</p>
    </header>

    <main>
        <form action="survey3.php" method="post">
            <fieldset>
                <legend>What is your highest level of education?</legend>

                <div class="option">
                    <input type="radio" id="high-school" name="education" value="High School" required>
                    <label for="high-school">High School</label>
                </div>

                <div class="option">
                    <input type="radio" id="associate" name="education" value="Associate Degree">
                    <label for="associate">Associate Degree</label>
                </div>

                <div class="option">
                    <input type="radio" id="bachelors" name="education" value="Bachelor's Degree">
                    <label for="bachelors">Bachelor's Degree</label>
                </div>

                <div class="option">
                    <input type="radio" id="masters" name="education" value="Master's Degree">
                    <label for="masters">Master's Degree</label>
                </div>

                <div class="option">
                    <input type="radio" id="doctoral" name="education" value="Doctoral Degree">
                    <label for="doctoral">Doctoral Degree</label>
                </div>
            </fieldset>

            <button type="submit">Next</button>
        </form>
    </main>
</body>
</html>
